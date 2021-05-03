<?php

  include "include/header.php";
  include "include/functionsAdmin.php";


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

          <small>Create a New Post</small>

        </h1>

      <?php

          addPost();

      ?>





         <!-- Here we Add our Form in Admin Panel -->

         <form action="addPost.php" method="post" enctype="multipart/form-data">  <!-- Post when we insert data into the server
                                                                           or database  -->

         <div class="form-group">
           <label for="title">Post Title</label>
           <input type="text" class="form-control" placeholder="" name="title"></input>
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
           <input type="text" class="form-control" placeholder="" name="author"></input>
         </div>

         <div class="form-group">
           <label for="post_status">Post Status</label>
           <input type="text" class="form-control" placeholder="" name="post_status"></input>
         </div>

         <div class="form-group">
           <label for="post_image">Post Image</label>
           <input type="file" class="form-control" name="image"></input>
         </div>

         <div class="form-group">
           <label for="post_tag">Post Tag</label>
           <input type="text" class="form-control" placeholder="" name="post_tag"></input>
         </div>

         <div class="form-group">
           <label for="post_content">Post Content</label>
           <textarea type="text" class="form-control" placeholder="" name="post_content" cols="30" rows="10"></textarea>
         </div>

         <div class="form-group">
           <label for="post_date">Post Date</label>
           <input type="date" class="form-control" placeholder="" name="post_date"></input>
         </div>

         <div class="form-group">
           <label for="post_link">Post Link</label>
           <input type="text" class="form-control" placeholder="" name="post_link"></input>
         </div>

         <div class="form-group">
           <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post"></input>
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
