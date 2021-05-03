<?php

  include "include/header.php";
  include "include/functionsAdmin.php";
  ob_start();

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

          <small>Edit Admin</small>

        </h1>

      <?php

          editAdmin();
      ?>

      <?php

          if(isset($_GET['edit']))
          {
            $theAdmin_ID = $_GET['edit'];

            $theEditAdmin = $theConnection->executeTheQuery("SELECT * FROM ADMIN WHERE ADMIN_ID = '$theAdmin_ID'");

            while($row = mysqli_fetch_assoc($theEditAdmin))
            {
              $theadminid = $row['ADMIN_ID'];
              $theAdmin_username = $row['ADMIN_USERNAME'];
              $theAdmin_password = $row['ADMIN_PASSWORD'];

      ?>



         <!-- Here we Add our Form in Admin Panel -->

         <form action="" method="post">  <!-- Post when we insert data into the server
                                                                           or database  -->

        <div class="form-group">
          <label for="title">Admin ID</label>
          <input type="text" class="form-control" value="<?php echo $theadminid; ?>" name="adminid" readonly></input>
        </div>


         <div class="form-group">
           <label for="title">Admin Username</label>
           <input type="text" class="form-control" value="<?php echo $theAdmin_username; ?>" name="admin_username"></input>
         </div>

         <div class="form-group">
           <label for="title">Admin Password</label>
           <input type="password" class="form-control" value="<?php echo $theAdmin_password; ?>" name="admin_password"></input>
         </div>



         <div class="form-group">
           <input class="btn btn-primary" type="submit" name="edit_admin" value="Edit Selected Admin"></input>
         </div>


         </form>


         <?php

               }

             }


         ?>

      </div>


      <?php

          deleteAdmin();
      ?>



    </div>

      <!-- End of row -->



  </div>

  <!-- End of Container Fluid -->

</div>

<!-- Here we don't include footer in our Add Admins Page -->

<?php

include 'include/footer.php';


?>
