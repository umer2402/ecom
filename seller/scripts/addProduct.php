<?php
session_start();
include '../db.php'; // Assuming this file contains your DB connection setup

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (!isset($_SESSION['sellerId'])) {
            throw new Exception("Unauthorized access.");
        }

        $sellerId = (int) $_SESSION['sellerId'];
        $storeId = (int) ($_POST['storeId'] ?? 0);
        $productName = trim($_POST['productName'] ?? '');
        $productDesc = trim($_POST['productDesc'] ?? '');
        $categoryId = (int) ($_POST['categoryId'] ?? 0);
        $subCategoryId = (int) ($_POST['subCategoryId'] ?? 0);
        $SKU = trim($_POST['SKU'] ?? '');
        $price = (float) ($_POST['price'] ?? 0);
        $discount = (float) ($_POST['discount'] ?? 0);
        $stockQuantity = (int) ($_POST['stockQuantity'] ?? 0);
        $minOrderQuantity = (int) ($_POST['minOrderQuantity'] ?? 1);
        $isAvailable = isset($_POST['isAvailable']) ? (int) $_POST['isAvailable'] : 0;

        if ($storeId <= 0 || $productName === '' || $categoryId <= 0 || $price < 0 || $stockQuantity < 0 || $minOrderQuantity <= 0) {
            throw new Exception("Invalid product details.");
        }

        $storeCheck = $con->prepare("SELECT storeId FROM stores WHERE storeId = ? AND sellerId = ?");
        $storeCheck->bind_param("ii", $storeId, $sellerId);
        $storeCheck->execute();
        $storeCheck->store_result();

        if ($storeCheck->num_rows === 0) {
            $storeCheck->close();
            throw new Exception("Unauthorized store access.");
        }

        $storeCheck->close();
        
        $selectedColors = '';
        $selectedSizes = '';
        $score = 0;
        
        $videoPath = ''; // default empty string
        // Colors
        if (isset($_POST['colors']) && is_array($_POST['colors'])) {
            $Colors = array_map('trim', $_POST['colors']);
            $Colors = array_map('htmlspecialchars', $Colors, array_fill(0, count($Colors), ENT_QUOTES));
            $selectedColors = implode(', ', $Colors);
        }
        
        // Sizes
        if (isset($_POST['sizes']) && is_array($_POST['sizes'])) {
            $Sizes = array_map('trim', $_POST['sizes']);
            $Sizes = array_map('htmlspecialchars', $Sizes, array_fill(0, count($Sizes), ENT_QUOTES));
            $selectedSizes = implode(', ', $Sizes);
        }
        
        // Score calculation
        if (!empty(trim($productDesc))) {
            $score += 2;
        }
        
        if (isset($_FILES['productImage']) && isset($_FILES['productImage']['name']) && is_array($_FILES['productImage']['name'])) {
            $validImageCount = 0;
        
            foreach ($_FILES['productImage']['name'] as $index => $name) {
                if (!empty($name) && $_FILES['productImage']['error'][$index] === 0) {
                    $validImageCount++;
                }
            }
        
            if ($validImageCount > 2) {
                $imgScore = $validImageCount - 2;
                if($imgScore > 5) $imgScore = 5;
                $score += $imgScore;
            }
        }

        if (isset($_FILES['productVideo']) && $_FILES['productVideo']['error'] === UPLOAD_ERR_OK) {
            $videoTmp = $_FILES['productVideo']['tmp_name'];
            $videoName = basename($_FILES['productVideo']['name']);
            $extension = pathinfo($videoName, PATHINFO_EXTENSION);
        
            // Optional: validate extension
            $allowedVideoExtensions = ['mp4', 'webm', 'ogg'];
            if (in_array(strtolower($extension), $allowedVideoExtensions)) {
                $videoPath = $storeId . "-" . time() . "-" . uniqid() . "." . $extension;
                $destinationPath = "../../assets/productVideos/" . $videoPath;
        
                if (!file_exists("../../assets/productVideos/")) {
                    mkdir("../../assets/productVideos/", 0777, true);
                }
        
                if (!move_uploaded_file($videoTmp, $destinationPath)) {
                    throw new Exception("Failed to upload product video.");
                }
                $score += 2;
            } else {
                throw new Exception("Unsupported video format. Only mp4, webm, ogg allowed.");
            }
        }

        if (!empty(trim($SKU))) {
            $score += 1;
        }
        
        
        $stmt = $con->prepare("INSERT INTO products 
    (storeId, productName, productDesc, categoryId, subCategoryId, SKU, price, discount, stockQuantity, minOrderQuantity, isAvailable, colors, sizes, score, proVideo) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param(
            "issiisddiiissis",
            $storeId,
            $productName,
            $productDesc,
            $categoryId,
            $subCategoryId,
            $SKU,
            $price,
            $discount,
            $stockQuantity,
            $minOrderQuantity,
            $isAvailable,
            $selectedColors,
            $selectedSizes,
            $score,
            $videoPath
        );
        
        $stmt->execute();

        $productId = $con->insert_id; // Use insert_id instead of lastInsertId

        // Handle product images
        if (isset($_FILES['productImage']) && count($_FILES['productImage']['name']) > 0) {
            

            foreach ($_FILES['productImage']['name'] as $key => $imageName) {
                if ($_FILES['productImage']['error'][$key] === UPLOAD_ERR_OK) {
                    $tempName = $_FILES['productImage']['tmp_name'][$key];
                    $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                    if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                        throw new Exception("Invalid image format: $imageName");
                    }
                    $imagePath = $storeId . "-" . $productId . "-" . $key . "." . $extension;

                    if (processAndResizeImage($tempName, $imagePath)) {
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

        header("location: ../index.php?addProduct=Product added successfully!");
    } catch (Exception $e) {
        header("location: ../index.php?addProduct=Error: " . $e->getMessage());
    }
}

function processAndResizeImage($tempName, $imagePath) {
    // Helper function to resize image
    


    // Get image type
    $imageInfo = getimagesize($tempName);
    if (!$imageInfo) {
        return false; // Not a valid image
    }

    $imageType = $imageInfo[2]; // IMAGETYPE_JPEG, etc.

    $sizeMap = [
        'xs' => [60, 80],
        'sm' => [260, 350],
        'md' => [256, 340],
        'md2' => [265, 340],
        'lg' => [465, 640]
    ];

    foreach ($sizeMap as $folder => $dimensions) {
        $directory = "../../assets/productImages/$folder";
        if (!file_exists($directory)) {
            if (!mkdir($directory, 0777, true)) {
                return false; 
            }
        }

        $destination = "$directory/$imagePath";
        list($width, $height) = $dimensions;

        if (!resizeImage($tempName, $destination, $width, $height, $imageType)) {
            return false; 
        }
    }

    return true; 
}
function resizeImage($sourcePath, $destPath, $targetWidth, $targetHeight, $imageType) 
{
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($sourcePath);
            break;
        default:
            return false; // Unsupported type
    }

    list($origWidth, $origHeight) = getimagesize($sourcePath);

    // Calculate aspect ratio
    $srcRatio = $origWidth / $origHeight;
    $targetRatio = $targetWidth / $targetHeight;

    if ($srcRatio > $targetRatio) {
        // Source is wider
        $newWidth = $targetWidth;
        $newHeight = intval($targetWidth / $srcRatio);
    } else {
        // Source is taller or equal
        $newHeight = $targetHeight;
        $newWidth = intval($targetHeight * $srcRatio);
    }

    // Create destination canvas
    $resizedImage = imagecreatetruecolor($targetWidth, $targetHeight);

    // Optional: Fill background (white for JPEG, transparent for PNG)
    if ($imageType == IMAGETYPE_PNG) {
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        $bgColor = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
    } else {
        $bgColor = imagecolorallocate($resizedImage, 255, 255, 255); // white
    }
    imagefill($resizedImage, 0, 0, $bgColor);

    // Center the resized image
    $dstX = intval(($targetWidth - $newWidth) / 2);
    $dstY = intval(($targetHeight - $newHeight) / 2);

    imagecopyresampled(
        $resizedImage, $sourceImage,
        $dstX, $dstY, // dest x, y
        0, 0,         // src x, y
        $newWidth, $newHeight,
        $origWidth, $origHeight
    );

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($resizedImage, $destPath, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($resizedImage, $destPath);
            break;
    }

    imagedestroy($sourceImage);
    imagedestroy($resizedImage);
    return true;
}
?>
