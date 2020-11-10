// Setup basic express server
var express = require('express');
var app = express();
var path = require('path');
var server = require('http').createServer(app);
var io = require('../..')(server);
var port = process.env.PORT || 3000;


server.listen(port, () => {
    console.log('Server listening at port %d', port);
});

// Routingf
app.use(express.static(path.join(__dirname, 'public')));

// Chatroom

var numUsers = 0;
let i = 0;


io.on('connection', (socket) => {
    var addedUser = false;

    // socket.id = admin;

    // when the client emits 'new message', this listens and executes
    socket.on('new message', (data) => { //이벤트명 과 콜백

        io.sockets.in(data.to_id).emit('new message', {
            username: socket.username,
            message: data.message,
            from_id: data.from_id
        });

    });

    let client_id = '';
    //admin 소켓 아이디 받기.
    //관리자용..
    socket.on('admin_id_send', (data) => {
        client_id = data.client_id;
        io.sockets.in(client_id).emit('sever_admin_id_send', {
            admin_id: data.admin_id
        })
    });

    // when the client emits 'add user', this listens and executes
    socket.on('add user', (username) => {
        if (addedUser) return;
        if (username =="admin"){
            socket.username = username;
        }else{
            ++i;
            socket.username = i;
        }

        // we store the username in the socket session for this client
        ++numUsers;
        addedUser = true;
        socket.emit('login', { //현재 연결되어 있는 클라이언트 소켓에 “login”으로 “{}” 데이터로 이벤트를 보낸다.
            numUsers: numUsers,
            i:i
        });
        // echo globally (all clients) that a person has connected
        socket.broadcast.emit('user joined', {//나를 제외한 다른 소켓 클라이언트들에게 이벤트를 보낼 수 있
            username: socket.username,
            numUsers: numUsers,
            id: socket.id //나의 소켓 아이디 보내기..
        });
    });

    // when the client emits 'typing', we broadcast it to others
    socket.on('typing', () => {
        socket.broadcast.emit('typing', {
            username: socket.username
        });
    });

    // when the client emits 'stop typing', we broadcast it to others
    socket.on('stop typing', () => {
        socket.broadcast.emit('stop typing', {
            username: socket.username
        });
    });

    // when the user disconnects.. perform this
    socket.on('disconnect', () => {
        if (addedUser) {
            --numUsers;
            // echo globally that this client has left
            socket.broadcast.emit('user left', {
                username: socket.username,
                numUsers: numUsers
            });
        }
    });
    socket.on('finish', (data) => {
            io.sockets.in(data.fin_id).emit('user left', {
                fin_id: data.fin_id
            });

    });
    socket.on('waiting_msg', (data) => {
        io.sockets.in(data.client_id).emit('waiting_msg_to_user', {
        });

    });


});
