<?php

  require_once "db.php";
  $theConnection = new DB("localhost","root","","SUDHANSHU_PHP_BLOG");

  function ConfirmTheQuery($incoming)
  {
      global $theConnection;

      if (!$incoming)
      {
        echo "Add Admin Query for Admin Failed" . mysqli_error($theConnection);

      }
      // else
      // {
      //   echo "NEW Admin Added Successfully";
      // }



  }

  function createAnUser()
  {

    global $theConnection;

    if(isset($_POST['create_User']))
    {
        $userName = $_POST['user_Name'];
        $userPassword = $_POST['password_User'];
        $userFirstName = $_POST['user_First_Name'];
        $userlastName = $_POST['user_Last_Name'];
        $userEmail = $_POST['user_Email'];

        $userDate = date('Y-m-d');
        $userRole = "an user";

            $userQuery = "INSERT INTO USERS(USER_NAME,USER_PASSWORD,USER_FIRST_NAME,USER_LAST_NAME,EMAIL,ROLE,USER_REGISTERED_DATE) ";

            $userQuery .="VALUES('$userName','$userPassword','$userFirstName','$userlastName','$userEmail','$userRole', now())";

                $createTheUser = $theConnection -> executeTheQuery($userQuery);

                        header("Location: loginUser.php");



                      // ConfirmTheQuery($createTheUser);


    }
  }




?>
