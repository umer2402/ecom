<div class="col-12">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM products JOIN stores ON products.storeId=stores.storeId JOIN categories ON products.categoryId=categories.categoryId JOIN subCategories ON products.subCategoryId=subCategories.subCategoryId";
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
                    <td>
                        <a href="index.php?productDetails&pId=<?php echo $row['productId']; ?>"><button class="btn btn-success btn-sm"><span class="fa fa-eye"></span></button></a>
                    </td>
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