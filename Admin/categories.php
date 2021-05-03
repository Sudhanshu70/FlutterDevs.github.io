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

          <small>Categories Page</small>

        </h1>

      <?php



      ?>


            <div class="col-xs-6">


      <!-- Here we Add our Form for Categories Page in Admin Panel -->

               <form action="" method="POST">

                 <div class="form-group">

                      <label>Edit Categories</label>

                      <?php

                          if(isset($_GET['edit']))
                          {
                              $cat_id = $_GET['edit'];

                              $editCategory = $theConnection ->  executeTheQuery("SELECT * FROM CATEGORIES WHERE cat_id = '$cat_id'");

                              while($row = mysqli_fetch_assoc($editCategory))
                              {
                                  $category_id = $row['CAT_ID'];
                                  $category_title = $row['CAT_TITLE'];



                      ?>


                  <input type="text" class="form-group"  name="cat_title" value="<?php if(isset($category_title)){ echo $category_title; } ?>"></input>




                  <?php

                }
              }


              ?>



              <?php

                  // Edit Process POST
                  // Here we write code for our Submit Button

                  if(isset($_POST['edit']))
                  {
                    $theCatTitle = $_POST['cat_title']; // This cat_title value is from the form
                                                      // where the user is new Category value


                    $editQuery = "UPDATE CATEGORIES SET CAT_TITLE = '$theCatTitle' WHERE CAT_ID = '$cat_id'";

                    $editTheSelectedCategory = $theConnection -> executeTheQuery($editQuery);

                    if(!$editTheSelectedCategory)
                  {
                        die("Edit Query Failed") . mysqli_error($theConnection);
                  }
                  else
                  {
                     header("Location: categories.php ");
                  }

              }



              ?>

                 </div>

                 <div class="form-group">

                      <input type="submit" class="btn btn-primary" name="edit" value="Edit Category"></input>

                 </div>

               </form>


           </div>




           <!-- Display All Categories in a Table -->

           <table class="table table-bordered table-hover">

             <thead>
                  <tr>

                      <th>CATEGORY ID</th>
                      <th>CATEGORY TITLE</th>
                      <th>EDIT</th>
                      <th>DELETE</th>

                  </tr>
             </thead>

             <tbody>

                <tr>
                    <?php

                        displayCategories();

                    ?>
                </tr>


                <?php

                  deleteCategory();


                ?>



             </tbody>

          </table>



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
