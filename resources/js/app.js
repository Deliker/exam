require('./bootstrap');

import Echo from "laravel-echo";
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message-input');
const messageContainer = document.getElementById('message-container');

chatForm.addEventListener('submit', function(e) {
    e.preventDefault();

    axios.post('/messages', {
        message: messageInput.value,
        chat_id: 1 // Assuming a single chat room for simplicity
    }).then(response => {
        messageInput.value = '';
    });
});

window.Echo.private('chat.1')
    .listen('MessageSent', (e) => {
        const messageElement = document.createElement('div');
        messageElement.textContent = `${e.message.user.name}: ${e.message.message}`;
        messageContainer.appendChild(messageElement);
    });
