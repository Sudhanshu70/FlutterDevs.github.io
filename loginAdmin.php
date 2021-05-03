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
                Login Admin
              </h1>

              <?php

                  if(isset($_POST['login_Admin']))
                  {
                    $adminname = $_POST['admin_Name'];
                    $adminpassword = $_POST['password_Admin'];

                      $queryAdmin  = "SELECT * FROM ADMIN";

                      $logAdmin = $theConnection -> executeTheQuery($queryAdmin);


                          // imp code

                          $theConnection -> confirmTheQuery($logAdmin);

                          // end of imp

                          while($row = mysqli_fetch_assoc($logAdmin))
                          {
                            $theAdminName = $row['ADMIN_USERNAME'];
                            $theAdminPassword = $row['ADMIN_PASSWORD'];

                            // Now here we are checking if the username and Password entered in the Login Form match with the Username and Password stored in the Database.
                            //

                                  if($theAdminName == $adminname && $theAdminPassword == $adminpassword)
                                  {
                                      //  Now we will work with session in this Login Form
                                      // We can use the session only one time so we must place the session code in the file which is most commonly accessed.
                                      // So here we are including our session code inside our header file.


                                      $_SESSION['admin'] = $theAdminName;

                                      header("Location: Admin/index.php");

                                  }
                                  else
                                  {

                                      echo "<h2>You are not Registered As Admin !!! Please Register First...</h2>";

                                  }

                          }

                  }

              ?>


                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="userName">Admin Name</label>
                      <input type="text" class="form-control" name="admin_Name" placeholder="Please Enter Your Admin Name..."></input>
                    </div>

                    <div class="form-group">
                      <label for="userPass">Admin Password</label>
                      <input type="password" class="form-control" name="password_Admin" placeholder="Please Enter Your Admin Password..."></input>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="login_Admin" value="ADMIN LOGIN"></input>
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
