<?php
include "header.php";
?>
  <!-- End of Theme Mode -->
  <!-- Page -->
  <!-- Main -->
  <div class="flex grow">
   <!-- Sidebar -->
    <?php
        include "sidenav.php";
        ?>
   <!-- End of Sidebar -->
   <!-- Wrapper -->
   <div class="wrapper flex grow flex-col">
    <!-- top Header -->
    <?php
        include "topNav.php";
        ?>
    <!-- End of Header -->
    <!-- Content -->
    <main class="grow content pt-5" id="content" role="content">
     <!-- Container -->
     <div class="container-fixed" id="content_container">
     </div>
     <!-- End of Container -->
     <!-- Container -->
     <div class="container-fixed">
      <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
       <div class="flex flex-col justify-center gap-2">
        <h1 class="text-xl font-medium leading-none text-gray-900">
         Dashboard
        </h1>
        <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
         Central Hub for Personal Customization
        </div>
       </div>
       <div class="flex items-center gap-2.5">
        <a class="btn btn-sm btn-light" href="public-profile/profiles/default.html">
         View Profile
        </a>
       </div>
      </div>
     </div>
     <!-- End of Container -->
     <!-- Container -->
     <div class="container-fixed">
      <div class="row pt-3">
            <?php
            include "fileLoader.php";
            ?>
        </div>
     </div>
     <!-- End of Container -->
    </main>
    <!-- End of Content -->
    <!-- Footer -->
    <?php
        include "customFooter.php";
        ?>
    <!-- End of Footer -->
   </div>
   <!-- End of Wrapper -->
  </div>
  <!-- End of Main -->
  <?php
include "footer.php";
?>