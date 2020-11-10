let client_id;
let isFirst = true;
let array_chat = [];
const map_chat = new Map();
const map_ing_user = new Map();


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
    var $chatPage = $('.chat.page'); // The chatroom page

    // Prompt for setting a username
    var username;
    var connected = false;
    var typing = false;
    var lastTypingTime;
    var $currentInput = $usernameInput.focus();

    var socket = io();

    //유저 채팅 진행 맵 체크 함수..
    time_check();
    //admin의 username 지정..
    username = "admin";
    socket.emit('add user', "admin");


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

    // Sends a chat message
    const sendMessage = () => {
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

            //자신이 관리자면 서버로 client_id로 발송
            socket.emit('new message', {
                message: message,
                to_id: client_id,
                from_id: socket.id
            });

            let current_time = new Date();
            //상담중 유저맵에 set
            map_ing_user.set(client_id, {
                time: current_time.getTime(),
                isAdmin: true,
                waiting: false
            });

            //채팅맵에 set
            push_Chat("admin", message, client_id);

            //클릭하면 새로운 상담에서 상담중으로 바꿈
            let btn3 = $('.choose_user').filter(function () {
                return $(this).find('input').val() === client_id;
            });
            if (btn3.find('div').text() == '상담 시작') {
                btn3.removeClass('new');
                btn3.find('div').text('상담 중');
                btn3.addClass('btn_group');
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
            sendMessage();
            socket.emit('stop typing');
            typing = false;

        }
    });

    $inputMessage.on('input', () => {
        updateTyping();
    });

    // Focus input when clicking on the message input's border
    $inputMessage.click(() => {
        $inputMessage.focus();
    });

    socket.on('login', (data) => {
        connected = true;
        // var message = "입장!";
        // log(message, {
        //     prepend: true
        // });
        // addParticipantsMessage(data);
    });


    //서버에서 뉴 메세지 받음
    socket.on('new message', (data) => {

        let waiting = false;

        //대기 상태인 유저들이 계속해서 메세지를 보내면 여기서
        //waiting이 false가 되가지고 아래 조건을 줌 ^^!

        let btn3 = $('.choose_user').filter(function () {
            return $(this).find('input').val() === data.from_id;
        });
        if (btn3.find('div').text() == '상담 대기') {
            waiting = true;
        }


        if (isFirst) {
            client_id = data.from_id;
            isFirst = false;
        }

        let new_client = true;
        // 유저네임 버튼  생성할 때 중복 검사..
        $('#userlist').find('input').each(function (index, item) {

            // 유저 버튼 소켓 아이디 값이 중복되면 append  xxxx
            // 중복된게 없으면 append
            if ($(item).val() === data.from_id) {
                new_client = false;
                return false;
            } else {
                new_client = true;
            }
        });


        if (new_client) {
            $('#userlist').append('<button id="' + data.username + '" class="choose_user new"><input  type="hidden" value="' + data.from_id + '"><div>상담 시작</div>' + data.username + '</button>');
            var btn = $('#' + data.username);
            if (map_ing_user.size > 1) {
                btn.find('div').text('상담 대기');
                waiting = true;
                btn.removeClass('new');

                //대기 메세지 보냄..
                socket.emit('waiting_msg', {
                    client_id: data.from_id
                });

            }
        }
        if (client_id === data.from_id) {
            //채팅 추가
            addChatMessage(data);
        }

        //배열안에 객체 인자..
        push_Chat(data.username, data.message, data.from_id);


        // 상담중 유저 맵에 {유저 소켓아이디: {현재 시간:time,waiting:t}} 형태로 저장
        let current_time = new Date();
        //상담중 유저맵에 set
        map_ing_user.set(data.from_id, {
            time: current_time.getTime(),
            isAdmin: false,
            waiting: waiting
        });
        console.log(map_ing_user);

        //상담 연기되었는데 클라이언트가 메세지 보내면 상담 시작으로 바뀐당
        let btn2 = $('#' + data.username);
        if (btn2.find('div').text() == '상담 연기') {
            btn2.removeClass('no_user');
            btn2.find('div').text('상담 시작');
            map_ing_user.waiting = false;
            btn2.addClass('new')
        }


    });

    // Whenever the server emits 'user joined', log it in the chat body
    socket.on('user joined', (data) => {
        // log(data.username + '님이 입장했습니다');

        //고객의 소켓 아이디 받고 관리자(본인)의 소켓 아이디 보내주기!
        socket.emit('admin_id_send', {
            admin_id: socket.id, // 이건 관리자의 소켓 아이디...
            client_id: data.id
        });
    });

    socket.on('user left', (data) => {

        //상담나가면 해당 버튼 없어짐.. ㅎㅎㅎㅎㅎ
        $('button').remove('#' + data.username);
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
            socket.emit('add user', 'admin');
        }
    });

    socket.on('reconnect_error', () => {
        log('attempt to reconnect has failed');
    });

//클릭하면 소켓아이디가 해당 버튼의 input val 소켓 아이디로 바꾸바꾸
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

    //상담 종료하기 버튼 눌럿을 ㄸㅐ
    $(document).on('click', '#btn_fin', function () {
        socket.emit('finish', {
            fin_id: client_id
        });
        //상담나가면 해당 버튼 없어짐.
        $('.choose_user').filter(function () {
            return $(this).find('input').val() === client_id;
        }).remove();
        map_ing_user.delete(client_id);

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
let w;

function time_check() {
    //5초에 한번씩..
    if (window.Worker) {
        w = new Worker("time_check.js");
        w.onmessage = function (event) {
            for (let [key, value] of map_ing_user) {
                let current_time = new Date();
                let admin_is = value.isAdmin;
                // ************연기***************
                //맵은 마지막으로 넣은게 set된다.
                //그 마지막 데이터가 admin이고 그 어드민이 보낸 시간을 체크한다.
                if (admin_is) {
                    let admin_final_time = value.time;

                    console.log(map_ing_user);

                    if (current_time.getTime() - admin_final_time > 10000) {
                        // 마지막채팅이 어드민이고  현재 시간이 10초보다 차이나면
                        //버튼 텍스트를 상담중에서 상담 연기로 바꿈
                        //버튼 value  값과 이 함수의 key값이 같으면 버튼 텍스트를 바꾼다.
                        let btn = $('.choose_user').filter(function () {
                            return $(this).find('input').val() === key;
                        });
                        btn.removeClass('btn_group');
                        btn.find('div').text('상담 연기');
                        btn.addClass('no_user');
                        // 연기되면 대기중으로 값을 바꿔준다.
                        value.waiting = true;
                    }
                }
            }

            //웨이팅 값이 거짓이면 현재 대화중인 숫자 +1된다.
            let chat_ing_num = 0;
            for (let [key, value] of map_ing_user) {
                if (value.waiting == false) {
                    chat_ing_num++;
                }
            }
            // ************대기***************
            //현재 대화중인 숫자가 3보다 작으면 버튼이 대기인 것들은
            // 2개 이내 (기준)만큼만 순서대로 상담 시작으로 바뀐다..
            if (chat_ing_num < 2) {
                let waiting_time_array = [];
                for (let [key, value] of map_ing_user) {
                    if (value.waiting == true && value.isAdmin == false) {
                        let current_time = new Date();
                        let time = value.time - current_time.getTime();
                        let waiting_time = {
                            user_id: key,
                            time: time
                        };
                        waiting_time_array.push(waiting_time)
                    }
                }
                if (waiting_time_array.length != 0) {
                    let max_waiting = waiting_time_array.reduce(function (previous, current) {
                        return previous.time < current.time ? previous : current;
                    });
                    let btn = $('.choose_user').filter(function () {
                        return $(this).find('input').val() === max_waiting.user_id;
                    });
                    btn.find('div').text('상담 시작');
                    map_ing_user.get(max_waiting.user_id).waiting = false;
                    btn.addClass('new')
                }
            }

        };
    } else {
        alert('Web worker를 지원하지 않는 브라우저 입니다!');
    }
}


