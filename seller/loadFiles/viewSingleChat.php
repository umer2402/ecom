<?php
session_start();
include "../db.php";

$userId = (int) ($_POST['userId'] ?? 0);
$sellerId = (int) ($_SESSION['sellerId'] ?? 0);
$postedSellerId = (int) ($_POST['sellerId'] ?? 0);

if ($userId <= 0 || $sellerId <= 0 || $postedSellerId !== $sellerId) {
    exit;
}

?>
<input type="hidden" id="userId" value="<?php echo $userId; ?>">
<input type="hidden" id="sellerId" value="<?php echo $sellerId; ?>">
<div class="chat-messages" id="msgArea" style="max-height:420px;">
    <?php

$stmt = $con->prepare("SELECT message, is_seller, created_at FROM chat WHERE sellerId = ? AND userId = ? ORDER BY created_at ASC");
$stmt->bind_param("ii", $sellerId, $userId);
$stmt->execute();
$result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        
    ?>
    <!-- Received message -->
    <div class="message <?php if($row['is_seller'] == true){ echo "sent"; }else{ echo "received"; } ?> d-flex">
        <div>
            <div class="message-content">
                <?php echo htmlspecialchars($row['message']); ?>
            </div>
            <div class="message-time"><?php echo date("d M, y h:i:s a", strtotime($row['created_at'])); ?></div>
        </div>
    </div>
    <?php 
    }
    ?>

</div>

<div class="chat-input">
    <div class="d-flex align-items-center">
        
        <input type="text" id="message" class="form-control message-input" placeholder="Type a message..." onkeypress="handleKeyPress(event, '<?php echo $userId; ?>','<?php echo $sellerId; ?>')">
        <button class="send-btn" onclick="sendMessage('<?php echo $userId; ?>','<?php echo $sellerId; ?>')">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</div>


  
