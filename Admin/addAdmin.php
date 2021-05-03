<?php

  include "include/header.php";
  include "include/functionsAdmin.php";

?>

<div id="wrapper" style="margin-top:70px;">

  <!-- Navigation -->

  <?php

    include "include/navigation.php";

  ?>

  <div id = "page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

      <div class="col-lg-12">

        <h1 class="page-header">Welcome To Admin Panel

          <small>Create a New Admin</small>

        </h1>

      <?php

          addAdmin();

      ?>



         <!-- Here we Add our Form in Admin Panel -->

         <form action="" method="post">  <!-- Post when we insert data into the server
                                                                           or database  -->

         <div class="form-group">
           <label for="title">Admin Username</label>
           <input type="text" class="form-control" placeholder="" name="admin_username"></input>
         </div>

         <div class="form-group">
           <label for="title">Admin Password</label>
           <input type="password" class="form-control" placeholder="" name="admin_password"></input>
         </div>



         <div class="form-group">
           <input class="btn btn-primary" type="submit" name="create_admin" value="Create New Admin"></input>
         </div>


         </form>

      </div>



    </div>

      <!-- End of row -->



  </div>

  <!-- End of Container Fluid -->

</div>

<!-- Here we don't include footer in our Add Admins Page -->

<?php

include 'include/footer.php';


?>
