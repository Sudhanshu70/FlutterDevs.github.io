<?php

  include "include/header.php";
  include "include/functionsAdmin.php";
  ob_start();


?>

  <!-- Delete it after use -->

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

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

          <small>View All Categories</small>

        </h1>




         <!-- Here we Add Table to view all Posts in Admin Panel -->

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

            </tbody>

        </table>

        <!-- Here we display how many posts we have in our Blog -->

        <?php



            // echo "<h3 class= 'info'>No of Posts are : </h3>" . $countPosts;

        ?>

        <!-- Here we write code for deleteing Blogs existings blogs -->



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
