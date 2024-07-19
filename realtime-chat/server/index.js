/**
 * Import package
 */
const express = require("express");
const { createServer } = require("node:http");

/**
 * Init server
 */
const app = express();
const server = createServer(app);

/**
 * Register dependency
 */
app.use('/client', express.static("client"));       // <- Enabling express to render static asset like html, css, etc.

/**
 * Init socket
 */
const { Server } = require('socket.io');
const io = new Server(server);
io.on('connection', (socket) => {                   // <- Do something when a new client connects to the server
    socket.on('join', (roomId) => {
        socket.join(roomId);
    })
    socket.on('send chat', (msg) => {               // <- Do something when client emit event 'send chat' 
        socket.to(1).emit('get chat', msg);     // <- Publishing the new message to all client
    });
});

/**
 * Start server
 */
server.listen(3000, () => {
    console.log(`server started 3000`);
});