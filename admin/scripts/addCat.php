<?php
session_start();
include "../db.php";

if (!isset($_SESSION['adminId']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: ../login.php");
    exit;
}

$catName = trim($_POST['catName'] ?? '');
$catDesc = trim($_POST['catDesc'] ?? '');

if ($catName === '' || !isset($_FILES['catImg']) || $_FILES['catImg']['error'] !== UPLOAD_ERR_OK) {
    header("location: ../index.php?addCat=Category name and image are required.");
    exit;
}

$allowedExtensions = ['jpg', 'jpeg', 'png'];
$originalName = $_FILES['catImg']['name'];
$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

if (!in_array($extension, $allowedExtensions, true)) {
    header("location: ../index.php?addCat=Only JPG and PNG images are allowed.");
    exit;
}

$catImg = $_FILES['catImg']['tmp_name'];
$catImgName = bin2hex(random_bytes(8)) . "." . $extension;
$imgPath = "assets/PICTURES/ICONS/" . $catImgName;

$checkStmt = $con->prepare("SELECT categoryId FROM categories WHERE categoryName = ?");
$checkStmt->bind_param("s", $catName);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    $checkStmt->close();
    header("location: ../index.php?addCat=This category already Exist!");
    exit;
}

$checkStmt->close();

$stmt = $con->prepare("INSERT INTO categories (categoryName, categoryImg, categoryDesc) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $catName, $imgPath, $catDesc);

if ($stmt->execute()) {
    $destination = "../../" . $imgPath;

    if (move_uploaded_file($catImg, $destination)) {
        if (resizeImageTo260x420($destination, $destination)) {
            header("location: ../index.php?categories");
            exit;
        }

        @unlink($destination);
        echo "Image resizing failed.";
    } else {
        echo "Image upload failed.";
    }
}

$stmt->close();

function resizeImageTo260x420($sourcePath, $destinationPath) {
    list($origWidth, $origHeight, $imageType) = getimagesize($sourcePath);

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

    $targetWidth = 260;
    $targetHeight = 420;

    // Calculate aspect ratio
    $srcRatio = $origWidth / $origHeight;
    $targetRatio = $targetWidth / $targetHeight;

    if ($srcRatio > $targetRatio) {
        $newWidth = $targetWidth;
        $newHeight = intval($targetWidth / $srcRatio);
    } else {
        $newHeight = $targetHeight;
        $newWidth = intval($targetHeight * $srcRatio);
    }

    // Create canvas
    $resizedImage = imagecreatetruecolor($targetWidth, $targetHeight);

    // Fill background
    if ($imageType == IMAGETYPE_PNG) {
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        $bgColor = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127); // Transparent
    } else {
        $bgColor = imagecolorallocate($resizedImage, 255, 255, 255); // White
    }
    imagefill($resizedImage, 0, 0, $bgColor);

    // Center image
    $dstX = intval(($targetWidth - $newWidth) / 2);
    $dstY = intval(($targetHeight - $newHeight) / 2);

    imagecopyresampled(
        $resizedImage, $sourceImage,
        $dstX, $dstY,
        0, 0,
        $newWidth, $newHeight,
        $origWidth, $origHeight
    );

    // Save final resized image
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($resizedImage, $destinationPath, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($resizedImage, $destinationPath);
            break;
    }

    imagedestroy($sourceImage);
    imagedestroy($resizedImage);
    return true;
}

?>
