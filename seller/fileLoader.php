<?php
if(isset($_GET['storeSettings'])){
    include "includes/storeSettings.php";
}else
if(isset($_GET['products'])){
    include "viewFiles/products.php";
}else
if(isset($_GET['chats'])){
    include "viewFiles/chats.php";
}else
if(isset($_GET['coupons'])){
    include "viewFiles/coupons.php";
}else
if(isset($_GET['addProduct'])){
    include "addFiles/addProduct.php";
}else
if(isset($_GET['generateCoupon'])){
    include "addFiles/generateCoupon.php";
}else{
    include "includes/home.php";
}
?>