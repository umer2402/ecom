@isset($store)
<style>
    .chat-btn {
        position: fixed;
        right: 30px;
        bottom: 30px;
        width: 60px;
        height: 60px;
        background: #25d366;
        color: #fff;
        border-radius: 50%;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        z-index: 1000;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chat-btn:hover {
        background: #128c7e;
        transform: scale(1.05);
    }

    .chat-btn i {
        font-size: 24px;
        line-height: 60px;
    }

    .chat-popup {
        position: fixed;
        right: 30px;
        bottom: 100px;
        width: 350px;
        height: 450px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        overflow: hidden;
        display: none;
        flex-direction: column;
    }

    .chat-header {
        background: #25d366;
        color: #fff;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chat-header h4 {
        margin: 0;
        font-weight: 600;
    }

    .close-btn {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
    }

    .chat-body {
        flex: 1;
        height: 300px;
        padding: 10px;
        overflow-y: auto;
        background: #f5f5f5;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    .message {
        margin-bottom: 10px;
        padding: 8px 12px;
        border-radius: 18px;
        max-width: 70%;
        word-wrap: break-word;
    }

    .received {
        background-color: #f1f1f1;
        margin-right: auto;
        color: #000;
    }

    .sent {
        background-color: #0084ff;
        color: #fff;
        margin-left: auto;
    }

    .chat-footer {
        padding: 10px;
        background: #fff;
        display: flex;
    }

    .chat-input {
        flex: 1;
        border: 1px solid #ddd;
        border-radius: 30px;
        padding: 10px 15px;
        outline: none;
    }

    .send-btn {
        background: #25d366;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-left: 10px;
        cursor: pointer;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    .bounce {
        animation: bounce 2s infinite;
    }
</style>

<div class="chat-btn bounce" id="chatButton">
    <i class="fa fa-wechat"></i>
</div>

<div class="chat-popup" id="chatPopup">
    <div class="chat-header">
        <h4>Chat with Seller</h4>
        <button class="close-btn" id="closeChat">&times;</button>
    </div>
    <div class="chat-body" id="chatBody">
        <div class="message received">
            Start a conversation with this seller.
        </div>
    </div>
    <div class="chat-footer">
        <input type="text" class="chat-input" id="chatInput" placeholder="Type your message...">
        <button class="send-btn" id="sendBtn">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</div>

<script>
    $(document).ready(function () {
        var sellerId = @json($store->sellerId);
        var pollHandle = null;

        function formatDate(dateString) {
            const date = new Date(dateString);
            return isNaN(date.getTime()) ? '' : date.toLocaleString();
        }

        function renderMessages(messages) {
            const $chatBody = $('#chatBody');
            $chatBody.empty();

            if (!messages || messages.length === 0) {
                $chatBody.append('<div class="message received">No messages yet. Say hello to this seller.</div>');
                return;
            }

            messages.forEach(function (msg) {
                const messageClass = Number(msg.is_seller) === 0 ? 'sent' : 'received';
                const messageTime = formatDate(msg.created_at);

                $chatBody.append(
                    '<div class="message ' + messageClass + '">' +
                        '<div class="message-content">' + $('<div>').text(msg.message).html() + '</div>' +
                        (messageTime ? '<div class="message-time">' + messageTime + '</div>' : '') +
                    '</div>'
                );
            });

            $chatBody.scrollTop($chatBody[0].scrollHeight);
        }

        function getMessages() {
            return $.ajax({
                url: '/chat/with/' + sellerId,
                method: 'POST',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            }).done(function (response) {
                renderMessages(response);
            });
        }

        function startPolling() {
            if (pollHandle) {
                return;
            }

            pollHandle = setInterval(function () {
                if ($('#chatPopup').is(':visible')) {
                    getMessages();
                }
            }, 10000);
        }

        function stopPolling() {
            if (pollHandle) {
                clearInterval(pollHandle);
                pollHandle = null;
            }
        }

        function sendMessage() {
            var message = $('#chatInput').val().trim();

            if (!message) {
                return;
            }

            $.ajax({
                url: '/chat/send',
                method: 'POST',
                dataType: 'json',
                data: {
                    sellerId: sellerId,
                    message: message,
                    _token: '{{ csrf_token() }}'
                }
            }).done(function (response) {
                if (response.success) {
                    $('#chatInput').val('');
                    getMessages();
                }
            }).fail(function () {
                alert('Unable to send message right now.');
            });
        }

        $('#chatButton').on('click', function () {
            $('#chatPopup').fadeToggle();
            $(this).removeClass('bounce');

            if ($('#chatPopup').is(':visible')) {
                getMessages();
                startPolling();
            } else {
                stopPolling();
            }
        });

        $('#closeChat').on('click', function () {
            $('#chatPopup').fadeOut();
            stopPolling();
        });

        $('#sendBtn').on('click', sendMessage);

        $('#chatInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                sendMessage();
            }
        });
    });
</script>
@endisset
