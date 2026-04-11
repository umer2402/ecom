<div class="col-12">
    <div id="res">
        <h1 class="text-success text-center">
            <?php
            if(isset($_GET['addProduct'])){
                echo $_GET['addProduct'];
            }
            ?>
        </h1>
    </div>
    <form action="scripts/addProduct.php" method="POST" enctype="multipart/form-data" class="mt-4">
        <!-- Store ID and Product Name -->
        <input type="hidden" name="storeId" value="<?php echo $storeId; ?>">
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
            <div class="col-md-4">
                <label for="stockQuantity" class="form-label">Stock Quantity</label>
                <input type="number" id="stockQuantity" name="stockQuantity" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="minOrderQuantity" class="form-label">Minimum Order Quantity</label>
                <input type="number" id="minOrderQuantity" name="minOrderQuantity" value="1" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Available Sizes</label>
                <div class="d-flex">
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="XS" id="sizeXS">
                    <label class="form-check-label" for="sizeXS">XS</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="S" id="sizeS">
                    <label class="form-check-label" for="sizeS">S</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="M" id="sizeM">
                    <label class="form-check-label" for="sizeM">M</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="L" id="sizeL">
                    <label class="form-check-label" for="sizeL">L</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="XL" id="sizeXL">
                    <label class="form-check-label" for="sizeXL">XL</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="XXL" id="sizeXXL">
                    <label class="form-check-label" for="sizeXXL">XXL</label>
                </div>
                </div>
            </div>

        </div>
        <div class="row mb-3">
            
            <div class="col-md-6">
                <label class="form-label">Available Colors</label>
                <div class="d-flex">
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Black" id="colorBlack">
                    <label class="form-check-label" for="colorBlack">Black</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="White" id="colorWhite">
                    <label class="form-check-label" for="colorWhite">White</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Red" id="colorRed">
                    <label class="form-check-label" for="colorRed">Red</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Blue" id="colorBlue">
                    <label class="form-check-label" for="colorBlue">Blue</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Green" id="colorGreen">
                    <label class="form-check-label" for="colorGreen">Green</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Yellow" id="colorYellow">
                    <label class="form-check-label" for="colorYellow">Yellow</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Pink" id="colorPink">
                    <label class="form-check-label" for="colorPink">Pink</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Purple" id="colorPurple">
                    <label class="form-check-label" for="colorPurple">Purple</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Orange" id="colorOrange">
                    <label class="form-check-label" for="colorOrange">Orange</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Brown" id="colorBrown">
                    <label class="form-check-label" for="colorBrown">Brown</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Gray" id="colorGray">
                    <label class="form-check-label" for="colorGray">Gray</label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="colors[]" value="Maroon" id="colorMaroon">
                    <label class="form-check-label" for="colorMaroon">Maroon</label>
                </div>
                </div>
            </div>
        </div>
        <!-- Availability and Product Image -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="isAvailable" class="form-label">Availability</label>
                <select id="isAvailable" name="isAvailable" class="form-select">
                    <option value="1" selected>Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="productImage" class="form-label">Product Images</label>
                <input type="file" id="productImage" name="productImage[]" class="form-control" multiple accept="image/*">
            </div>
            <div class="col-md-4">
                <label for="productVideo" class="form-label">Product Video</label>
                <input type="file" id="productVideo" name="productVideo" class="form-control" accept="video/*">
            </div>
        </div>
    
        <!-- Product Description -->
        <div class="mb-3">
            <label for="productDesc" class="form-label">Product Description & Specifications</label>
            <textarea id="productDesc" name="productDesc" rows="3" class="form-control"></textarea>
        </div>
    
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
</div>