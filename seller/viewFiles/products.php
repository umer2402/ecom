<div class="col-12">
    <a href="index.php?addProduct"><button class="btn btn-primary float-end">Add New Product</button></a>
    <h2 class="mb-4">Product List</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Stock</th>
                <th>Min Order</th>
                <th>Available</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM products  WHERE storeId='$storeId' ORDER BY createdAt DESC";
            $result = $con->query($sql);
            $sr=1;
            if ($result->num_rows > 0):
                while($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?= htmlspecialchars($sr++) ?></td>
                    <td><?= htmlspecialchars($row['productName']) ?></td>
                    <td><?= htmlspecialchars($row['SKU']) ?></td>
                    <td>$<?= number_format($row['price'], 2) ?></td>
                    <td><?= $row['discount'] ?>%</td>
                    <td><?= $row['stockQuantity'] ?></td>
                    <td><?= $row['minOrderQuantity'] ?></td>
                    <td><?= $row['isAvailable'] ? 'Yes' : 'No' ?></td>
                    <td><?= htmlspecialchars($row['proStatus']) ?></td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr>
                    <td colspan="15" class="text-center">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>