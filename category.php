<?php

  require_once "include/db.php";

  $theConnection = new Db("localhost","root","","sudhanshu_php_blog");

?>

  <!-- Header -->

<?php

  include "include/header.php";

?>

<!-- Navigation -->

<?php

  include "include/navigation.php";


?>

<!-- Search Side Bar -->

<section>

  <?php

     include "include/sidebar.php";

  ?>


</section>

  <!-- Page Content -->

  <!-- Here we will write our PHP Blog code for displaying Post in our index Page -->

  <?php

       // Here we perform Pagination

      //  Here will Write PHP Pagination code for and here we are creating the variable Page  for Pagination for Categories Page

      if(isset($_GET['page']))
      {
          $page = $_GET['page'];

      }
      else
      {
        $page = "";
      }

      if($page == "" || $page == 1)
      {
        $page_1 = 0;
      }
      else
      {
        $page_1 = ($page * 3) - 3;
      }




        if(isset($_GET['theCategoryTitle']))
        {
            $theCateTitle = $_GET['theCategoryTitle'];

            $selectSpecificPosts = $theConnection -> executeTheQuery("SELECT * FROM POSTS WHERE POST_CATEGORY LIKE  '%$theCateTitle%' LIMIT $page_1, 3");

            // Here we are writing the PHP code for counting the rows in DB

            $countCategoryTitle = "SELECT * FROM POSTS WHERE POST_CATEGORY LIKE '%%$theCateTitle%%'";

             $countCategoriesTitle = $theConnection -> executeTheQuery($countCategoryTitle);

             $count = mysqli_num_rows($countCategoriesTitle);

             $count = ceil($count / 6);

            if(!$selectSpecificPosts)
            {
              echo "Select Category Failed" . mysqli_error($theConnection);
            }


            while($row = mysqli_fetch_assoc($selectSpecificPosts))
            {
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];


  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- Here we place First Blog Post -->
        <h2>
          <!-- This is our Post Title -->
          <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
        </h2>
        <!-- This is our Post Author -->

        <p class="lead">
          By <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
        </p>
        <!-- Here after user will select Post,we will display rest of information of Post -->

        <!-- This is our Post Date -->

        <p><span class="glyphicon glyphicon-time" style="margin-right:5px"></span><?php echo $post_date; ?></p>
        <!-- Here we will Put our Blog Dynamic Image -->

          <img class="img-responsive" alt="Blog Title" src="Admin/Blog_Img/<?php echo $post_image; ?>"/>
          <!-- Here we will Put our Blog Content -->
          <p></p>
          <!-- Here we will post our Buton for user so that he can read more, write comments -->
          <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>


       <!-- imp php code -->

        <?php


          }

        }


        ?>

        <!-- end of imp php code -->


         </div>

    </div>

  </div>


<!-- Pagination for Categories -->

    <ul class="pager">
       <?php

          for ($i = 1 ; $i <= $count ; $i++ )
          {
              echo "<li><a href='category.php?page=$i&theCategoryTitle=$theCateTitle'>$i</a></li>";
          }

              // Here we are checking if are in the last Page and we have the last item in our db

              if($i == $page)
              {

                // very imp code for double string in PHP

                // Url with two Parameters

                echo "<li><a href='category.php?page=$i&theCategoryTitle=$theCateTitle' class='active_link'>$i</a></li>";
              }
              else
              {

                // very imp code for double string in PHP


                // Url with two Parameters

                 echo "<li><a href='category.php?page=$i&theCategoryTitle=$theCateTitle'>$i</a></li>";
              }
       ?>
    </ul>

  <!-- Footer -->

<?php

  include "include/footer.php";

?>
