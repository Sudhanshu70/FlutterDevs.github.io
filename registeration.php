<?php

  require_once "include/functions.php";
  require_once "include/db.php";
  // $theConnection = new Db("localhost","root","","sudhanshu_php_blog");

?>

  <!-- Header -->



<?php

  include "include/header.php";

?>

<!-- Navigation -->

<?php

  include "include/navigation.php";


?>

  <!-- User Form Content -->

    <div class="container">
      <div class="row">
        <!-- Register User -->
            <div class="col-lg-12">
              <h1 class="page-header">
                Welcome to Flutter Lovers Blog
                  <small>New User</small>
              </h1>

              <?php

                  createAnUser();

              ?>


                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="userName">User Name</label>
                      <input type="text" class="form-control" name="user_Name" placeholder="Please Enter Your User Name..."></input>
                    </div>

                    <div class="form-group">
                      <label for="userPass">User Password</label>
                      <input type="password" class="form-control" name="password_User" placeholder="Please Enter Your User Password..."></input>
                    </div>

                    <div class="form-group">
                      <label for="firstName">User First Name</label>
                      <input type="text" class="form-control" name="user_First_Name" placeholder="Please Enter Your First Name..."></input>
                    </div>

                    <div class="form-group">
                      <label for="lastName">User Last Name</label>
                      <input type="text" class="form-control" name="user_Last_Name" placeholder="Please Enter Your Last Name..."></input>
                    </div>

                    <div class="form-group">
                      <label for="userEmail">User E-mail</label>
                      <input type="email" class="form-control" name="user_Email" placeholder="Please Enter Your Email..."></input>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="create_User" value="Register"></input>
                    </div>





                </form>
            </div>
      </div>
    </div>

  <!-- User Form End -->




  <!-- Footer -->



<?php

  include "include/footer.php";

?>
