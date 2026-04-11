<?php
session_start();
include '../db.php'; // Assuming this file contains your DB connection setup

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $storeId = $_SESSION['storeId'];
        $productName = $_POST['productName'];
        $productDesc = $_POST['productDesc'];
        $categoryId = $_POST['categoryId'];
        $subCategoryId = $_POST['subCategoryId'];
        $SKU = $_POST['SKU'];
        $price = $_POST['price'];
        $discount = $_POST['discount'] ?? 0;
        $stockQuantity = $_POST['stockQuantity'];
        $minOrderQuantity = $_POST['minOrderQuantity'];
        $isAvailable = $_POST['isAvailable'];

        // Insert the product data
        $stmt = $con->prepare("INSERT INTO products 
            (storeId, productName, productDesc, categoryId, subCategoryId, SKU, price, discount, stockQuantity, minOrderQuantity, isAvailable) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiiidiiis", $storeId, $productName, $productDesc, $categoryId, $subCategoryId, $SKU, $price, $discount, $stockQuantity, $minOrderQuantity, $isAvailable);
        $stmt->execute();

        $productId = $con->insert_id; // Use insert_id instead of lastInsertId

        // Handle product images
        if (isset($_FILES['productImage']) && count($_FILES['productImage']['name']) > 0) {
            

            foreach ($_FILES['productImage']['name'] as $key => $imageName) {
                if ($_FILES['productImage']['error'][$key] === UPLOAD_ERR_OK) {
                    $tempName = $_FILES['productImage']['tmp_name'][$key];
                    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imagePath = $storeId . "-" . $productId . "-" . $key . "." . $extension;

                    if (move_uploaded_file($tempName, "../../store/assets/productImages/".$imagePath)) {
                        // Save image data to the productImages table
                        $stmt = $con->prepare("INSERT INTO productImages (productId, imageName) VALUES (?, ?)");
                        $stmt->bind_param("is", $productId, $imagePath);
                        $stmt->execute();
                    } else {
                        throw new Exception("Failed to upload image: $imageName");
                    }
                }
            }
        }

        echo "Product added successfully!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
