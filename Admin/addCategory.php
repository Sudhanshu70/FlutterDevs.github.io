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

          <small>Create a New Category</small>

        </h1>

      <?php

          if(isset($_POST['create_category']))
          {
              $cat_title = $_POST['cat_title'];

              if($cat_title == "" || empty($cat_title))
              {
                  echo "The Category Field Should not be Empty !!!";
              }
              else
              {
                  $insertIntoCategory =  $theConnection->executeTheQuery("INSERT INTO CATEGORIES(CAT_TITLE) VALUES ('$cat_title')");

                  if(!$insertIntoCategory)
                  {
                     die('Query Insertion Failed...') . mysqli_error($theConnection);
                  }
                  else
                  {
                      echo "Category Data Inserted...";
                  }
              }


          }




      ?>



         <!-- Here we Add our Form in Admin Panel -->

         <form action="" method="post" enctype="multipart/form-data">  <!-- Post when we insert data into the server
                                                                           or database  -->

         <div class="form-group">
           <label for="title">Create a Category</label>
           <input type="text" class="form-control" placeholder="" name="cat_title"></input>
         </div>


         <div class="form-group">
           <input class="btn btn-primary" type="submit" name="create_category" value="Create a Category"></input>
         </div>


         </form>

      </div>



    </div>

      <!-- End of row -->



  </div>

  <!-- End of Container Fluid -->

</div>

<!-- Here we place our footer at the End of the Create Post Page -->

<?php


  include "include/footer.php"

?>
