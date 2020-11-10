let client_id;
let isFirst = true;
let array_chat = [];
const map_chat = new Map();

$(function () {
    var FADE_TIME = 150; // ms
    var TYPING_TIMER_LENGTH = 400; // ms
    var COLORS = [
        '#e21400', '#91580f', '#f8a700', '#f78b00',
        '#58dc00', '#287b00', '#a8f07a', '#4ae8c4',
        '#3b88eb', '#3824aa', '#a700ff', '#d300e7'
    ];

    // Initialize variables
    var $window = $(window);
    var $usernameInput = $('.usernameInput'); // Input for username
    var $messages = $('.messages'); // Messages area
    var $inputMessage = $('.inputMessage'); // Input message input box

    var $loginPage = $('.login.page'); // The login page
    var $chatPage = $('.chat.page'); // The chatroom page

    // Prompt for setting a username
    var username;
    var connected = false;
    var typing = false;
    var lastTypingTime;
    var $currentInput = $usernameInput.focus();

    var socket = io();

    const addParticipantsMessage = (data) => { //로그인이랑 user joined 할 때 쓴
        // 관리자입장에서 조인ㄴ아ㅣ런ㅇ리ㅏ
        var message = '';

        count_usr = data.numUsers;
        count_usr = Number(count_usr);
        real_user = count_usr - 1;

        if (count_usr === 1) {
            message += "진행하는 상담이 없습니다.";
        } else {
            message += "현재 진행중인 상담인원은 " + real_user + "명입니다";
        }
        log(message);
    };

    // 유저 처음 입장시 유저네임 주고. 처음!!!... ^^
    $currentInput = $inputMessage.focus();
    username = 'username';
    socket.emit('add user', username);


    socket.on('waiting_msg_to_user', (data) => {
        log("상담량이 많아 대기해야합니다. 잠시만 기다려주세요 ^^")
    });


    // Sends a chat message
    const sendMessage = () => {
        console.log('sendMessage()');
        var message = $inputMessage.val();
        // Prevent markup from being injected into the message
        message = cleanInput(message);
        // if there is a non-empty message and a socket connection
        if (message && connected) {
            $inputMessage.val('');
            addChatMessage({ //아마도 내 화면..
                username: username,
                message: message,
            });


            if (username === "admin") {
                //자신이 관리자면 서버로 client_id로 발송
                socket.emit('new message', {
                    message: message,
                    to_id: client_id,
                    from_id: socket.id
                });

                push_Chat("admin", message, client_id)

            } else {
                //자신이 고객이면 서버로 admin_id로 발송
                socket.emit('new message', {
                    message: message,
                    to_id: admin_id,
                    from_id: socket.id
                });
            }


        }
    };

    // Log a message
    const log = (message, options) => {
        var $el = $('<li>').addClass('log').text(message);
        addMessageElement($el, options);
    };

    // Adds the visual chat message to the message list
    const addChatMessage = (data, options) => {
        // Don't fade the message in if there is an 'X was typing'
        var $typingMessages = getTypingMessages(data);
        options = options || {};
        if ($typingMessages.length !== 0) {
            options.fade = false;
            $typingMessages.remove();
        }
        var typingClass = data.typing ? 'typing' : '';

        var $usernameDiv = $('<span class="username"/>')
            .text(data.username)
            .css('color', getUsernameColor(data.username));
        var $messageBodyDiv = $('<span class="messageBody">')
            .text(data.message);

        var $messageDiv = $('<li class="message"/>')
            .data('username', data.username)
            .addClass(typingClass)
            .append($usernameDiv, $messageBodyDiv);

        addMessageElement($messageDiv, options);
    };

    // Adds the visual chat typing message
    const addChatTyping = (data) => {
        data.typing = true;
        // data.message = 'is typing';
        addChatMessage(data);
    };

    // Removes the visual chat typing message
    const removeChatTyping = (data) => {
        getTypingMessages(data).fadeOut(function () {
            $(this).remove();
        });
    };

    // Adds a message element to the messages and scrolls to the bottom
    // el - The element to add as a message
    // options.fade - If the element should fade-in (default = true)
    // options.prepend - If the element should prepend
    //   all other messages (default = false)
    const addMessageElement = (el, options) => {
        var $el = $(el);

        // Setup default options
        if (!options) {
            options = {};
        }
        if (typeof options.fade === 'undefined') {
            options.fade = true;
        }
        if (typeof options.prepend === 'undefined') {
            options.prepend = false;
        }

        // Apply options
        if (options.fade) {
            $el.hide().fadeIn(FADE_TIME);
        }
        if (options.prepend) {
            $messages.prepend($el);
        } else {
            $messages.append($el);
        }
        $messages[0].scrollTop = $messages[0].scrollHeight;
    };

    // Prevents input from having injected markup
    const cleanInput = (input) => {
        return $('<div/>').text(input).html();
    };

    // Updates the typing event
    const updateTyping = () => {
        if (connected) {
            if (!typing) {
                typing = true;
                socket.emit('typing');
            }
            lastTypingTime = (new Date()).getTime();

            setTimeout(() => {
                var typingTimer = (new Date()).getTime();
                var timeDiff = typingTimer - lastTypingTime;
                if (timeDiff >= TYPING_TIMER_LENGTH && typing) {
                    socket.emit('stop typing');
                    typing = false;
                }
            }, TYPING_TIMER_LENGTH);
        }
    };

    // Gets the 'X is typing' messages of a user
    const getTypingMessages = (data) => {
        return $('.typing.message').filter(function (i) {
            return $(this).data('username') === data.username;
        });
    };

    // Gets the color of a username through our hash function
    const getUsernameColor = (username) => {
        // Compute hash code
        var hash = 7;
        for (var i = 0; i < username.length; i++) {
            hash = username.charCodeAt(i) + (hash << 5) - hash;
        }
        // Calculate color
        var index = Math.abs(hash % COLORS.length);
        return COLORS[index];
    };

    // Keyboard events

    //엔터키 누르면..
    $window.keydown(event => {
        // Auto-focus the current input when a key is typed
        if (!(event.ctrlKey || event.metaKey || event.altKey)) {
            $currentInput.focus();
        }
        // When the client hits ENTER on their keyboard
        if (event.which === 13) {//13이 엔터!
            if (username) {
                sendMessage();
                socket.emit('stop typing');
                typing = false;
            } else {
            }
        }
    });

    $inputMessage.on('input', () => {
        updateTyping();
    });

    // Click events

    // Focus input when clicking anywhere on login page
    // $loginPage.click(() => {
    //     $currentInput.focus();
    // });

    // Focus input when clicking on the message input's border
    $inputMessage.click(() => {
        $inputMessage.focus();
    });

    // Socket events

    // Whenever the server emits 'login', log the login message
    socket.on('login', (data) => { //나!
        username = data.i;
        connected = true;
        // Display the welcome message
        // var message = "입장.. ";
        // log(message, {
        //     prepend: true
        // });
        // addParticipantsMessage(data);
    });


    //서버에서 뉴 메세지 받음
    socket.on('new message', (data) => {

        //자신이 고객이면 admin_id에 대입
        admin_id = data.from_id;
        // console.log(admin_id);
        addChatMessage(data);

        //배열안에 객체
        push_Chat(data.username, data.message, data.from_id);


    });

    let admin_id = '';
    //고객이 받은 rhk
    socket.on('sever_admin_id_send', (data) => {
        admin_id = data.admin_id; // admin socket 아이디를 구해서 전역변수에 넣는다 ..
        // log('admin id is' + data.admin_id)
    });

    // Whenever the server emits 'user left', log it in the chat body
    socket.on('user left', (data) => {
        if (socket.id === data.fin_id) {
            log(' 상담이 종료되었습니다');
            $inputMessage.remove();


        }

    });

    // Whenever the server emits 'typing', show the typing message
    // socket.on('typing', (data) => {
    //     addChatTyping(data);
    // });

    // Whenever the server emits 'stop typing', kill the typing message
    socket.on('stop typing', (data) => {
        removeChatTyping(data);
    });

    socket.on('disconnect', () => {
        log('you have been disconnected');

    });

    socket.on('reconnect', () => {
        log('you have been reconnected');
        if (username) {
            socket.emit('add user', username);
        }
    });

    socket.on('reconnect_error', () => {
        log('attempt to reconnect has failed');
    });


    $(document).on('click', '.choose_user', function () {

        //닉네임 버튼을 클릭하면 전역변수 값이 버튼 닉네임의 소켓아이디로 바뀐다..
        client_id = $(this).find('input').val();

        let chatbody = $('#chat_body');
        chatbody.empty();

        for (var i = 0; i < map_chat.get(client_id).length; i++) { //배열 출력

            let userName = map_chat.get(client_id)[i].username;
            let message = map_chat.get(client_id)[i].message;

            var $usernameDiv = $('<span class="username"/>')
                .text(userName)
                .css('color', getUsernameColor(userName));
            var $messageBodyDiv = $('<span class="messageBody">')
                .text(message);

            var $messageDiv = $('<li class="message"/>')
                .data('username', userName)
                .append($usernameDiv, $messageBodyDiv);

            chatbody.append($messageDiv);
            chatbody[0].scrollTop = chatbody[0].scrollHeight;
        }
    });


    function push_Chat(username, message, array_key_socket_id) {

        let chat_msg = {
            username: username,
            message: message
        };

        //만들어진 배열이 있다면 .. 거기다 넣고
        //없으면 새로 만듦.
        if (map_chat.has(array_key_socket_id)) {
            map_chat.get(array_key_socket_id).push(chat_msg);
        } else {
            let array = [];
            array.push(chat_msg);
            map_chat.set(array_key_socket_id, array);
        }

        console.log(map_chat);
    }

});

const getUsernameColor = (username) => {
    // Compute hash code
    var hash = 7;
    for (var i = 0; i < username.length; i++) {
        hash = username.charCodeAt(i) + (hash << 5) - hash;
    }
    // Calculate color
    var index = Math.abs(hash % COLORS.length);
    return COLORS[index];
};