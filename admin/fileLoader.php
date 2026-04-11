<?php
if(isset($_GET['stores'])){
    include "viewFiles/stores.php";
}else
if(isset($_GET['offerProducts'])){
    include "viewFiles/offerProducts.php";
}else
if(isset($_GET['storeDetails'])){
    $storeId=$_GET['storeDetails'];
    include "viewFiles/storeDetails.php";
}else
if(isset($_GET['sellers'])){
    include "viewFiles/sellers.php";
}else
if(isset($_GET['products'])){
    include "viewFiles/products.php";
}else
if(isset($_GET['addProduct'])){
    include "addFiles/addProduct.php";
}else
if(isset($_GET['addCat'])){
    include "addFiles/addCat.php";
}else
if(isset($_GET['editCat'])){
    $catId=$_GET['catId'];
    include "editFiles/editCat.php";
}else

if(isset($_GET['productDetails'])){
    $proId=$_GET['pId'];
    include "viewFiles/productDetails.php";
}else
if(isset($_GET['categories'])){
    include "viewFiles/viewCategories.php";
}else{
    include "includes/home.php";
}
?>