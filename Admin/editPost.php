<?php

  include "include/header.php";
  include "include/functionsAdmin.php";
  // obj_start();


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

          <small>Edit the Post</small>

        </h1>

      <?php

          // Display the edit Post Selected

          if(isset($_GET['edit']))
          {
              $editID = $_GET['edit'];

              $selectPostByID = $theConnection -> executeTheQuery("SELECT * FROM POSTS WHERE POST_ID = '$editID'");

              // Refactoring the attestation

              if(!$selectPostByID)
              {
                  echo "SELECT POST BY ID FAILED ... " . mysqli_error($theConnection);
              }
              else{

                while ($row = mysqli_fetch_assoc($selectPostByID))
                {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_category_id = $row['post_category_id'];
                  $post_category = $row['post_category'];
                  $post_status = $row['post_status'];
                  $post_image = $row['post_image'];
                  $post_tags = $row['post_tags'];
                  $post_comment_count = $row['post_comment_count'];
                  $post_content = $row['post_content'];
                  $post_date = $row['post_date'];
                  $post_link = $row['post_link'];

                }
              }

          }


      ?>



      <?php

      // Here we called function for Updating items in Post

          editPost();

      ?>





         <!-- Here we Add our Form in Admin Panel -->

         <form action="editPost.php" method="post" enctype="multipart/form-data">  <!-- Post when we insert data into the server
                                                                                 or database  -->
           <div class="form-group">
             <label for="title">Post ID</label>
             <input type="text" class="form-control" value="<?php echo $post_id; ?>" name="post_id" readonly></input>
           </div>


         <div class="form-group">
           <label for="title">Post Title</label>
           <input type="text" class="form-control" value = "<?php echo $post_title; ?>" name="title"></input>
         </div>

         <div class="form-group">
           <label for="post_categories">Available Post Categories</label>
           <select name="post_categories">



             <?php

                  $theCategory = $theConnection->executeTheQuery("SELECT * FROM CATEGORIES");

                  while($row = mysqli_fetch_assoc($theCategory))
                  {
                      $category_title = $row['CAT_TITLE'];

                      echo "<option value=''>$category_title </option>";
                  }

             ?>


           </select>

           </div>

        <div class="form-group">

          <label for="title">Write the Category</label>
          <input type="text" name="category" class="form-control" placeholder = "Please write existing Category"/>

        </div>

         <div class="form-group">
           <label for="title">Post Author</label>
           <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="author"></input>
         </div>

         <div class="form-group">
           <label for="post_status">Post Status</label>
           <input type="text" class="form-control" value = "<?php echo $post_status; ?>" name="post_status"></input>
         </div>

         <div class="form-group">
           <label for="post_image">Post Image</label>
           <img src = "Blog_img/<?php echo $post_image; ?>" alt = "Blog Image" width="200px" height="250px">
           <input type="file" class="form-control" name="image"></input>
         </div>

         <div class="form-group">
           <label for="post_tag">Post Tag</label>
           <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags"></input>
         </div>

         <div class="form-group">
           <label for="post_content">Post Content</label>
           <textarea type="text" class="form-control" name="post_content" cols="30" rows="10">

              <?php

                  echo $post_content;

              ?>

           </textarea>
         </div>

         <div class="form-group">
           <label for="post_date">Post Date</label>
           <input type="date" class="form-control" value = "<?php echo $post_date; ?>" name="post_date"></input>
         </div>

         <div class="form-group">
           <label for="post_link">Post Link</label>
           <input type="text" class="form-control" value = "<?php echo $post_link; ?>" name="post_link"></input>
         </div>

         <div class="form-group">
           <input class="btn btn-primary" type="submit" name="edit_post" value="Publish Edited Post"></input>
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
