<div class="col-12">
    <h2 class="text-center text-danger" id="res">
        <?php
        if(isset($_GET['addCat'])){
            echo $_GET['addCat'];
        }
        ?>
    </h2>
    <h3>Add Category</h3>
    <hr>
    <form action="scripts/addCat.php" method="post" enctype="multipart/form-data">
    <div class="input-group my-2">
        <label>Category Name</label>
        <input type="text" class="form-control" name="catName" placeholder="Enter Category Name">
    </div>
    <div class="input-group my-2">
        <label>Category Image</label>
        <input type="file" class="form-control" name="catImg">
    </div>
    <div class="input-group my-2">
        <label>Category Description</label>
        <input type="text" class="form-control" name="catDesc" placeholder="Enter Category Description">
    </div>
    <button class="btn btn-primary float-end btn-sm" type="submit">Save</button>
    </form>
</div>