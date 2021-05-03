<?php

  include "include/header.php";


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

        <h1 class="page-header">Welcome Admin

          <small>SubHeading</small>

        </h1>

         <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i><a href="index.php" style="margin-left:6px">Admin Home</a>
          </li>
          <li class="active"> <!-- Here if user doesn't select anything then
                                  it remains selected   -->

          <i class="fa fa-file"></i><a style="margin-left:6px" href="#">Blank Page</a>
        </ol>

      </div>



    </div>

      <!-- End of row -->



  </div>

  <!-- End of Container Fluid -->

</div>

    <!-- End of Page Wrapper -->

</div>

    <!-- Wrapper -->

    <!-- Footer -->



    <?php

      include "include/footer.php";

    ?>
