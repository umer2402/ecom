<?php
include '../db.php';

$sql = "
    SELECT 
        p.productId,
        p.productName,
        p.SKU,
        p.price,
        GROUP_CONCAT(ps.status) AS statuses
    FROM products p
    LEFT JOIN productStatus ps ON p.productId = ps.productId
    GROUP BY p.productId
";

$result = $con->query($sql);
$products = [];

while ($row = $result->fetch_assoc()) {
    $row['statuses'] = $row['statuses'] ? explode(',', $row['statuses']) : [];
    $products[] = $row;
}

header('Content-Type: application/json');
echo json_encode($products);
$con->close();
?>