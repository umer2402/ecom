<div class="col-12">
    <h3>Store Setting</h3>
    <hr>
    <h5 id="res" class="text-primary text-center">
        <?php
        if(isset($_GET['res'])){
            echo $_GET['res'];
        }
        ?>
    </h5>
    <form action="scripts/storeSettings.php" method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="brandName" class="form-label">Brand Name</label>
                <input type="text" id="brandName" name="brandName" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="storeName" class="form-label">Store Name</label>
                <input type="text" id="storeName" name="storeName" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="storeDesc" class="form-label">Store Description</label>
            <textarea id="storeDesc" name="storeDesc" rows="3" class="form-control" required></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="storeLogo" class="form-label">Store Logo</label>
                <input type="file" id="storeLogo" name="storeLogo" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="storeBanner" class="form-label">Store Banner</label>
                <input type="file" id="storeBanner" name="storeBanner" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="noEmp" class="form-label">Number of Employees</label>
                <input type="number" id="noEmp" name="noEmp" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="storeEmail" class="form-label">Store Email</label>
                <input type="email" id="storeEmail" name="storeEmail" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="storeContact" class="form-label">Store Contact</label>
                <input type="tel" id="storeContact" name="storeContact" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>
</div>