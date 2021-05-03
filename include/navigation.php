<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />

<?php

  require_once "db.php";

  ob_start();


?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header"> <!-- Here we place the logo of our Blog -->

   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>

   </button>

   <!-- Here we are building index -->

   <a href="#" class="navbar-brand">HORIZON</a>

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav" >
        <li><a href="index.php">HOME</a></li>


        <!-- Display all Categories -->

        <?php

        $queryDisplaycategories = "SELECT * FROM CATEGORIES";
        $selectCategories = $theConnection -> executeTheQuery($queryDisplaycategories);

            $theConnection -> displayCategories($selectCategories);


            // Perform validation if the user is logged or not

            if($_SESSION['user'])
            {
              $theUser = $_SESSION['user'];

              echo "<li><a href='logout.php' style='color: lightblue;'>LOGOUT</a></li>";

              // echo "<li><a href='logout.php' style='color: crimson;'>LOGOUT</a></li>";
              echo "<li><a href='#' style='text-align:right;margin-left:100px;color: lightpink;font-size:16px;'>Welcome $theUser</a></li>";

            }
            else
            {

                  if(!$_SESSION['admin'])
                  {

                    echo "<li><a href='loginUser.php'>USER LOGIN</a></li>";
                    echo "<li><a href='registeration.php'>USER REGISTER</a></li>";

                  }


              // Not Registered Yet !!! Click Here to Register with Us !!!

            }


            // Validation for the Admin

            if($_SESSION['admin'])
            {
              $theAdmin = $_SESSION['admin'];

                  echo "<li><a href='Admin/index.php'>ADMIN PANEL</a></li>";
                  echo "<li><a href='logout.php'>ADMIN LOGOUT</a></li>";
                  echo "<li><a href='#' style='text-align:right;margin-left:100px;color:Aqua'>Welcome $theAdmin</a></li>";

            }
            else
            {

                if(!$_SESSION['user'] )
                {

                  echo "<li><a href='loginAdmin.php'>ADMIN LOGIN</a></li></a></h2>";

                }
            }




        ?>


        <!-- <li><a href="admin/index.php">ADMIN PANEL</a></li> -->





      </ul>

    </div>


  </div>

</nav>
