const socket = require('socket.io');
const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = socket.listen(server);
const port = process.env.PORT || 3000;

server.listen(port, () => {
	console.log('Server listening at port %d', port);
});
io.on('connection', socket => {
	socket.on('new_message', data => {
		io.socket.emit('new_message', {
			message: data.message,
			date: data.date,
			msgcount: data.msgcount
		});
	});
});