
    <style>
        /* Floating Chat Button Styles */
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
        
        /* Chat Popup Styles */
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
            padding: 15px;
            overflow-y: auto;
            background: #f5f5f5;
        }
        
        .message {
            margin-bottom: 15px;
            max-width: 80%;
            padding: 10px 15px;
            border-radius: 20px;
            position: relative;
            word-wrap: break-word;
        }
        
        .received {
            background: #e5e5ea;
            color: #000;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
        }
        
        .sent {
            background: #25d366;
            color: #fff;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
            margin-left: auto;
        }
        
        .chat-footer {
            padding: 10px;
            background: #fff;
            border-top: 1px solid #eee;
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
            transition: background 0.3s;
        }
        
        .send-btn:hover {
            background: #128c7e;
        }
        
        /* Animation */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-10px);}
            60% {transform: translateY(-5px);}
        }
        
        .bounce {
            animation: bounce 2s infinite;
        }
    </style>
<style>
        .chat-body {
            height: 300px; /* Set your desired height */
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 10px;
            border: 1px solid #ccc; /* Optional: for better visibility */
            border-radius: 5px; /* Optional: for better appearance */
        }
        
        .message {
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 18px;
            max-width: 70%;
        }
        
        .received {
            background-color: #f1f1f1;
            margin-right: auto;
        }
        
        .sent {
            background-color: #0084ff;
            color: white;
            margin-left: auto;
        }
        </style>

    
    <!-- Floating Chat Button -->
    <div class="chat-btn bounce" id="chatButton">
        <i class="fa fa-wechat"></i>
    </div>
    
    <!-- Chat Popup -->
    <div class="chat-popup" id="chatPopup">
        <div class="chat-header">
            <h4>Chat with Us</h4>
            <button class="close-btn" id="closeChat">&times;</button>
        </div>
        <div class="chat-body" id="chatBody">
            <div class="message received">
                Hello! How can we help you today?
            </div>
            <div class="message sent">
                Hi there! I have a question about your services.
            </div>
            <div class="message received">
                We'd be happy to help! What would you like to know?
            </div>
        </div>
        
        
        <div class="chat-footer">
            <input type="text" class="chat-input" id="chatInput" placeholder="Type your message...">
            <button class="send-btn" id="sendBtn">
                <i class="fa fa-paper-plane"></i>
            </button>
        </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Toggle chat popup
            $('#chatButton').click(function() {
                $('#chatPopup').fadeToggle();
                $(this).removeClass('bounce');
                getMessages();
            });
            
            // Close chat popup
            $('#closeChat').click(function() {
                $('#chatPopup').fadeOut();
            });
            
            // Send message
            $('#sendBtn').click(sendMessage);
            $('#chatInput').keypress(function(e) {
                if (e.which == 13) {
                    sendMessage();
                }
            });
       function getMessages() {
           $.post('/store/chat/with/{{ $store->sellerId }}', {
                    sellerId: 'in url',
                    _token: '{{ csrf_token() }}'
                }, function(response) {
                    messages = JSON.parse(response);
                    function formatDate(dateString) {
                        const date = new Date(dateString);
                        return date.toLocaleString(); // Adjust format as needed
                    }
                    
                    // Clear previous messages
                    $('#chatBody').empty();
                    
                    // Loop through messages and append them
                    messages.forEach(msg => {
                        const messageClass = msg.is_seller === 0 ? 'sent' : 'received';
                        const messageTime = formatDate(msg.created_at); // Format the timestamp
                        
                        const messageHtml = `
                            <div class="message ${messageClass}">
                                <div class="message-content">${msg.message}</div>
                                <div class="message-time">${messageTime}</div>
                            </div>
                        `;
                        
                        $('#chatBody').append(messageHtml);
                    });
                    
                    // Scroll to the bottom after loading messages
                    $('#chatBody').scrollTop($('#chatBody')[0].scrollHeight);
                }).fail(function() {
                    alert('Error sending message');
                });
       }
       setInterval(getMessages, 10000);
        function sendMessage() {
            var message = $('#chatInput').val();
            if (message.trim() !== '') {
                // Get sellerId from your context (you might need to store it in a data attribute)
                var sellerId = '{{ $store->sellerId }}';
                
                if (!sellerId) {
                    alert('No seller selected');
                    return;
                }

                // Add message to UI immediately
                $('#chatBody').append('<div class="message sent">' + message + '</div>');
                $('#chatInput').val(''); 
                $('#chatBody').scrollTop($('#chatBody')[0].scrollHeight);
                
                // Send to server. 
                $.post('/store/chat/send', {
                    sellerId: sellerId,
                    message: message,
                    _token: '{{ csrf_token() }}'
                }, function(response) {
                    if (!response.success) {
                        alert('Error sending message');
                    }
                }).fail(function() {
                    alert('Error sending message');
                });
            }
        }

        });
    </script>
