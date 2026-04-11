<div class="col-12">
    <form action="scripts/addProduct.php" method="POST" enctype="multipart/form-data" class="mt-4">
        <!-- Store ID and Product Name -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" id="productName" name="productName" class="form-control" required>
            </div>
        </div>
    
        <!-- Category and Subcategory -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="categoryId" class="form-label">Category</label>
                <select id="categoryId" onchange="getSubCats(this.value)" name="categoryId" class="form-select" required>
                    <option value="" disabled selected>Select a category</option>
                    <?php
                    $qry=mysqli_query($con, "SELECT * FROM categories");
                    while($row=mysqli_fetch_array($qry)){
                    ?>
                    <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?> - <?php echo $row['categoryDesc']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="subCategoryId" class="form-label">Subcategory</label>
                <select id="subCategoryId" name="subCategoryId" class="form-select">
                    <option value="" disabled selected>Select a subcategory</option>
                    <!-- Subcategories will populate dynamically based on selected category -->
                </select>
            </div>
        </div>
    
        <!-- SKU, Price, and Discount -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="SKU" class="form-label">SKU</label>
                <input type="text" id="SKU" name="SKU" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="discount" class="form-label">Discount (%)</label>
                <input type="number" id="discount" name="discount" step="0.01" class="form-control">
            </div>
        </div>
    
        <!-- Stock and Minimum Order Quantity -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="stockQuantity" class="form-label">Stock Quantity</label>
                <input type="number" id="stockQuantity" name="stockQuantity" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="minOrderQuantity" class="form-label">Minimum Order Quantity</label>
                <input type="number" id="minOrderQuantity" name="minOrderQuantity" value="1" class="form-control" required>
            </div>
        </div>
    
        <!-- Availability and Product Image -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="isAvailable" class="form-label">Availability</label>
                <select id="isAvailable" name="isAvailable" class="form-select">
                    <option value="1" selected>Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="productImage" class="form-label">Product Images</label>
                <input type="file" id="productImage" name="productImage[]" class="form-control" multiple accept="image/*">
            </div>
        </div>
    
        <!-- Product Description -->
        <div class="mb-3">
            <label for="productDesc" class="form-label">Product Description</label>
            <textarea id="productDesc" name="productDesc" rows="3" class="form-control"></textarea>
        </div>
    
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
</div>