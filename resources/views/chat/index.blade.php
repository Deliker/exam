@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul id="chat-list">
                @foreach($chats as $chat)
                    <li><a href="#" data-chat-id="{{ $chat->id }}">{{ $chat->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <div id="message-container"></div>

            <form id="chat-form">
                @csrf
                <input type="hidden" id="chat-id" name="chat_id">
                <input type="text" id="message-input" placeholder="Type your message here..." required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message-input');
    const messageContainer = document.getElementById('message-container');
    const chatIdInput = document.getElementById('chat-id');

    document.getElementById('chat-list').addEventListener('click', function(e) {
        if (e.target.tagName === 'A') {
            e.preventDefault();
            const chatId = e.target.getAttribute('data-chat-id');
            chatIdInput.value = chatId;
            fetchMessages(chatId);
        }
    });

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();

        axios.post('/messages', {
            message: messageInput.value,
            chat_id: chatIdInput.value
        }).then(response => {
            messageInput.value = '';
        });
    });

    function appendMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.textContent = `${message.user.name}: ${message.message}`;
        messageContainer.appendChild(messageElement);
    }

    function fetchMessages(chatId) {
        axios.get(`/messages/${chatId}`).then(response => {
            messageContainer.innerHTML = '';
            response.data.forEach(message => {
                appendMessage(message);
            });
        });
    }

    Echo.private('chat.' + chatIdInput.value)
        .listen('MessageSent', (e) => {
            appendMessage(e.message);
        });
});
</script>

<style>
#message-container {
    border: 1px solid #ccc;
    padding: 10px;
    height: 300px;
    overflow-y: scroll;
    margin-bottom: 10px;
}

#chat-form {
    display: flex;
}

#message-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
}
</style>
