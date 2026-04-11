<div class="col-12">
  
    <style>
        :root {
            --primary-color: #7367f0;
            --secondary-color: #f8f8f8;
            --text-color: #444;
            --light-gray: #f1f1f1;
            --dark-gray: #6c757d;
            --white: #ffffff;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            background-color: #f5f5f5;
            height: 100vh;
        }
        
        .chat-container {
            height: 100vh;
            background-color: var(--white);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Contacts list */
        .contacts-list {
            border-right: 1px solid #eee;
            height: 100%;
            overflow-y: auto;
        }
        
        .contacts-header {
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .contact-search {
            padding: 10px 15px;
            background-color: var(--light-gray);
        }
        
        .contact-item {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .contact-item:hover {
            background-color: var(--secondary-color);
        }
        
        .contact-item.active {
            background-color: #e6e3ff;
        }
        
        .contact-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .contact-name {
            font-weight: 500;
            margin-bottom: 2px;
        }
        
        .contact-last-message {
            font-size: 0.8rem;
            color: var(--dark-gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .contact-time {
            font-size: 0.7rem;
            color: var(--dark-gray);
        }
        
        .unread-count {
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Chat area */
        .chat-area {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .chat-header {
            padding: 15px;
            border-bottom: 1px solid #eee;
            background-color: var(--white);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }
        
        .message {
            margin-bottom: 15px;
            max-width: 70%;
        }
        
        .received {
            align-self: flex-start;
        }
        
        .sent {
            align-self: flex-end;
        }
        
        .message-content {
            padding: 10px 15px;
            border-radius: 18px;
            position: relative;
        }
        
        .received .message-content {
            background-color: var(--white);
            border: 1px solid #eee;
        }
        
        .sent .message-content {
            background-color: var(--primary-color);
            color: white;
        }
        
        .message-time {
            font-size: 0.7rem;
            margin-top: 5px;
            text-align: right;
            color: var(--dark-gray);
        }
        
        
        .chat-input {
            padding: 15px;
            border-top: 1px solid #eee;
            background-color: var(--white);
            position: sticky;
            bottom: 0;
        }
        
        .message-input {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            resize: none;
        }
        
        .send-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }
        
        .attachment-btn {
            background: none;
            border: none;
            color: var(--dark-gray);
            margin-right: 10px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .contacts-list {
                position: fixed;
                width: 100%;
                z-index: 1000;
                height: auto;
                max-height: 80vh;
                bottom: 0;
                display: none;
            }
            
            .contacts-list.show {
                display: block;
            }
            
            .chat-area {
                width: 100%;
            }
            
            .toggle-contacts {
                display: block !important;
            }
        }
        
        .toggle-contacts {
            display: none;
        }
    </style>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Contacts list column -->
            <div class="col-md-3 col-12 contacts-list p-0">
                <div class="contacts-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Chats</h5>
                    <button class="btn btn-sm btn-light toggle-contacts">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                
                <div class="contacts">
                    <!-- Contact item 1 -->
                    <?php
                    $qry=mysqli_query($con, "SELECT  DISTINCT(users.id), users.name FROM users JOIN chat ON users.id=chat.userId WHERE chat.sellerId='$sellerId'");
                    while($row=mysqli_fetch_array($qry)){
                    ?>
                    <div class="contact-item active d-flex" onclick="loadSingleChat('<?php echo $row['id']; ?>','<?php echo $sellerId; ?>')">
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex justify-content-between">
                                <h6 class="contact-name mb-0"><?php echo $row['name']; ?></h6>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2 d-flex align-items-center">
                            <span class="unread-count">2</span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
            <!-- Chat area column -->
            <div class="col-md-9 col-12 p-0 chat-area" id="chatArea">
                
            </div>
        </div>
    </div>

  
</div>
