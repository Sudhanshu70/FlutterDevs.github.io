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
                Login User
              </h1>

              <?php

                  if(isset($_POST['login_User']))
                  {
                    $username = $_POST['user_Name'];
                    $userpassword = $_POST['password_User'];

                      $queryUser  = "SELECT * FROM USERS";

                      $logUser = $theConnection -> executeTheQuery($queryUser);


                          // imp code

                          $theConnection -> confirmTheQuery($logUser);

                          // end of imp

                          while($row = mysqli_fetch_assoc($logUser))
                          {
                            $theUserName = $row['USER_NAME'];
                            $thePassword = $row['USER_PASSWORD'];

                            // Now here we are checking if the username and Password entered in the Login Form match with the Username and Password stored in the Database.

                                  if($theUserName == $username && $thePassword == $userpassword)
                                  {
                                      //  Now we will work with session in this Login Form
                                      // We can use the session only one time so we must place the session code in the file which is most commonly accessed.
                                      // So here we are including our session code inside our header file.


                                      $_SESSION['user'] = $theUserName;

                                      header("Location: index.php");

                                  }
                                  else
                                  {

                                      echo "<h2>You are not Registered !!! Please Register First...</h2>";

                                  }

                          }

                  }

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
                      <input type="submit" class="btn btn-primary" name="login_User" value="Login"></input>
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
