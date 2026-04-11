<div class="col-12">
    <a href="index.php?addCat"><button class="btn btn-success float-end">Add New Category</button></a>
    <div class="scrollable-x-auto">
      <table class="table table-border" data-datatable-table="true">
       <thead>
        <tr>
         <th class="min-w-[280px]">
          <span class="sort asc">
           <span class="sort-label">
            Category Name
           </span>
           <span class="sort-icon">
           </span>
          </span>
         </th>
         <th class="min-w-[135px]">
          <span class="sort">
           <span class="sort-label">
            Image
           </span>
           <span class="sort-icon">
           </span>
          </span>
         </th>
         <th class="min-w-[135px]">
          <span class="sort">
           <span class="sort-label">
            Action
           </span>
           <span class="sort-icon">
           </span>
          </span>
         </th>
        </tr>
       </thead>
       <tbody>
    <?php
    $qry=mysqli_query($con, "SELECT * FROM categories");
    while($row=mysqli_fetch_array($qry)){
    ?>
        <tr>
         <td>
          <div class="flex flex-col gap-2">
           <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">
            <?php echo $row['categoryName']; ?>
           </a>
           <span class="text-2sm text-gray-700 font-normal leading-3">
            <?php echo $row['categoryDesc']; ?>
           </span>
          </div>
         </td>
         <td>
          <img src="<?php echo $baseUrl."/".$row['categoryImg']; ?>" style="width:50px; height:50px;">
         </td>
         <td>
             <div style="display:flex;">
                 <button class="btn btn-warning btn-sm" onclick="document.getElementById('catImg').click()">Change Image</button>
                 <form method="post" action="scripts/updateCatImage.php" id="catImgForm" enctype="multipart/form-data">
                     <input type="hidden" name="catId" value="<?php echo $row['categoryId']; ?>">
                     <input type="file" name="catImage" id="catImg" style="display:none;" onchange="document.getElementById('catImgForm').submit()">
                 </form>
                 <a href="index.php?editCat&catId=<?php echo $row['categoryId']; ?>">
                 <button class="btn btn-success btn-sm">Edit</button>
                 </a>
             </div>
         </td>
        </tr>
    <?php } ?>
       </tbody>
      </table>
     </div>
</div>