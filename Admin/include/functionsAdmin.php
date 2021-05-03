<?php

  include_once "db.php";
  $theConnection = new DB("localhost","root","","SUDHANSHU_PHP_BLOG");
  ob_start();

  // Here we are Adding our New Function

  // imp code

    function ConfirmTheQuery($incoming)
    {
        global $theConnection;

        if (!$incoming)
        {
          echo "Add Admin Query for Admin Failed" . mysqli_error($theConnection);

        }
        else
        {
          echo "NEW Admin Added Successfully";
        }



    }

    // End of imp code




// Refactoring code with the help of PHP Functions

 function addPost()
 {

   global $theConnection;

 // important sql query for inserting Post data into database


     if(isset($_POST['create_post']))
     {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = 6;
        $post_category = $_POST['category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file( $post_image_temp, "../images/$post_image");

        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        $post_date = date('Y-m-d');
        $post_link = $_POST['post_link'];

        // Here we will use mysql to communicate with the database

        $theQuery = "INSERT INTO posts
                     (  post_title, post_author, post_category_id, post_category, post_status, post_image, post_tags, post_content,   post_date,
                        post_link)";

       $theQuery .= "VALUES ('$post_title', '$post_author', '$post_category_id','$post_category', '$post_status', '$post_image', '$post_tag', '$post_content', now(), '$post_link')";




       $createPostQuery = $theConnection-> executeTheQuery($theQuery);

       if(!$createPostQuery)
       {
           echo "Query Failed..." . mysqli_error($theConnection);
       }
       else
       {
           echo "Post Data Inserted Successfully in Database !!!";
       }


     }


    // End of imp sql query

 }


 // This function is for updating blog items from the Blog

   function editPost()
   {
        global $theConnection;

        if(isset($_POST['edit_post']))
        {

            $postID = $_POST['post_id'];

            $post_title = $_POST['title'];
            $post_author = $_POST['author'];
            $post_category_id = 6;
            $post_category = $_POST['category'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            if(empty($post_image))
            {
               $takeTheImage = $theConnection -> executeTheQuery("SELECT * FROM POSTS WHERE POST_ID = '$postID'");

               while ($row = mysqli_fetch_assoc($takeTheImage))
               {
                    $post_image = $row['post_image'];
               }
            }

            move_uploaded_file( $post_image_temp, "../images/$post_image");

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('Y-m-d');
            $post_link = $_POST['post_link'];

             // Here we need to write the command to the server
             // This is called Backend Programming

             $editQuery = "UPDATE POSTS SET post_title = '$post_title',
                                            post_category_id = '$post_category_id',
                                            post_category = '$post_category',
                                            post_date = '$post_date',
                                            post_author = '$post_author',
                                            post_status = '$post_status',
                                            post_tags = '$post_tags',
                                            post_content = '$post_content',
                                            post_image = '$post_image',
                                            post_link = '$post_link'";

            $editQuery .= "WHERE post_id = '$postID'";

            $editPostByID = $theConnection -> executeTheQuery($editQuery);

            if(!$editPostByID)
            {

                echo "Query Edit Failed " . mysqli_error($theConnection);

            }
            if($editPostByID)
            {

                echo "The Post was Edited Successfully...";
                header("Location: view_all_posts.php");
            }





        }


   }

   // This Function is for deleting post from our Blog


   function deletePost()
   {

     global $theConnection;

     if(isset($_GET['delete']))
     {

       $thePostID = $_GET['delete'];

       $deleteQuery = $theConnection -> executeTheQuery("DELETE FROM POSTS WHERE POST_ID = '$thePostID'");

       if(!$deleteQuery)
       {
         echo "Delete Query Failed" . mysqli_error($theConnection);
       }

       header("Location: view_all_posts.php");


     }




   }


   //


          function displayCategories()
         {
           global $theConnection;

           $selectAllCategories = $theConnection->executeTheQuery("SELECT * FROM CATEGORIES");

           while($row = mysqli_fetch_assoc($selectAllCategories))
           {

             $category_id = $row["CAT_ID"];
             $category_title = $row["CAT_TITLE"];

             echo "<tr>";

                 echo "<td>$category_id</td>";
                 echo "<td>$category_title</td>";
                 echo "<td><a href='categories.php?edit=$category_id'>EDIT</a></td>";
                 echo "<td><a href='categories.php?delete=$category_id'>DELETE</a></td>";



             echo "</tr>";

           }

      }


      function deleteCategory() {

      global $theConnection;

      if(isset($_GET['delete']))
      {

          $theCatID =  $_GET['delete'];

          $deleteTheSelectedCategory = $theConnection -> executeTheQuery("DELETE FROM CATEGORIES WHERE CAT_ID = '$theCatID'");

          header("Location: view_all_categories.php");


      }


      }


      function addAdmin()
      {
        global $theConnection;


                  if(isset($_POST['create_admin']))
                  {
                      $admin_username = $_POST['admin_username'];
                      $admin_password = $_POST['admin_password'];

                      if($admin_username == "" ||  empty($admin_username) || $admin_password == "" || empty($admin_password))
                      {
                          echo "The Admin Username and Password Field Should not be Empty !!!";
                      }
                      else
                      {
                          $insertIntoAdmin =  $theConnection->executeTheQuery("INSERT INTO ADMIN(ADMIN_USERNAME, ADMIN_PASSWORD) VALUES ('$admin_username', '$admin_password')");

                          // if(!$insertIntoAdmin)
                          // {
                          //    die('Query Insertion Admin Failed...') . mysqli_error($theConnection);
                          // }
                          // else
                          // {
                          //     echo "Admin Data Inserted Successfully...";
                          // }


                          // imp code

                          ConfirmTheQuery($insertIntoAdmin);

                          // imp code
                      }


                  }


      }


      function displayAdmins()
      {
        global $theConnection;

        $selectAllAdmins = $theConnection->executeTheQuery("SELECT * FROM ADMIN");

        while ($row = mysqli_fetch_assoc($selectAllAdmins))
        {
            $adminID = $row['ADMIN_ID'];
            $admin_username = $row['ADMIN_USERNAME'];
            $admin_password = $row['ADMIN_PASSWORD'];

            echo "<tr>";
                  echo "<td>$adminID</td>";
                  echo "<td>$admin_username</td>";
                  echo "<td>$admin_password</td>";
                  echo "<td><a href='editAdmin.php?edit=$adminID'>EDIT</a></td>";
                  echo "<td><a href='editAdmin.php?delete=$adminID'>DELETE</a></td>";
            echo "</tr>";


        }


      }

      function editAdmin()
      {
        global $theConnection;

        if(isset($_POST['edit_admin']))
        {
            $theAdminID = $_POST['edit_admin'];

            // imp code

            $adminid = $_POST['adminid'];
            $adminUsername = $_POST['admin_username'];
            $adminPassword = $_POST['admin_password'];

                $editAdminQuery = "UPDATE ADMIN SET  ADMIN_USERNAME = '$adminUsername', ADMIN_PASSWORD = '$adminPassword' WHERE ADMIN_ID = '$adminid'";

                $editTheAdmin = $theConnection->executeTheQuery($editAdminQuery);

                confirmTheQuery($editTheAdmin);
                header("Location: view_all_admins.php");
        }



      }

      function deleteAdmin()
      {
        global $theConnection;

        if(isset($_GET['delete']))
        {
            $thedeleteAdminId = $_GET['delete'];

            $deleteTheAdmin = $theConnection -> executeTheQuery("DELETE FROM ADMIN WHERE ADMIN_ID = '$thedeleteAdminId'");

            confirmTheQuery($deleteTheAdmin);
            header("Location: view_all_admins.php");
        }



      }


      function deleteTheComment()
      {
        global $theConnection;

        if(isset($_GET['DELETE']))
        {
           $theDeleteID = $_GET['DELETE'];

            $deleteQuery = "DELETE FROM COMMENTS WHERE COMMENT_ID = '$theDeleteID'";

                $deleteTheComment = $theConnection -> executeTheQuery($deleteQuery);

                  header("Location: view_all_comments.php");
        }
      }

      function deleteTheUsers()
      {
        global $theConnection;

        if(isset($_GET['DELETE']))
        {
          $deleteUserID = $_GET['DELETE'];

              $deleteUserQuery = "DELETE FROM USERS WHERE USER_ID = '$deleteUserID'";

                  $deleteTheUser = $theConnection -> executeTheQuery($deleteUserQuery);

                  confirmTheQuery($deleteTheUser);

                        header("Location: view_all_users.php");
        }


      }



?>
