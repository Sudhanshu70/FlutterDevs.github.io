

<!-- Header -->

<?php

  require_once "include/db.php";

  $theConnection = new DB("localhost","root","","SUDHANSHU_PHP_BLOG");



include "include/header.php";

?>

<!-- Navigation -->

<?php

include "include/navigation.php";


?>

  <div class="container">


          <section>

            <?php

            include "include/sidebar.php";

            ?>


          </section>

          <div class="col-md-8">



            <!-- We write our PHP code here -->


            <?php

            // The First If is for the POST for Search Page Pagination

            // here will be our PHP Pagination functionality for Search Page

            if(isset($_GET['page']))
            {
              $page = $_GET['page'];

              // for GET Search
            }
            else
            {
              $page = "";
            }

            // Here our Algorithm for Search Page Pagination

            if($page=="" || $page==1 )
            {
              $page_1 = 0;
            }
            else
            {
              $page_1 = ($page * 3) - 3;
            }



            if(isset($_POST["submitSearch"]))
            {

              $searchWord  = $_POST["search"];

              $searchQuery = $theConnection -> executeTheQuery("SELECT * FROM posts WHERE post_tags LIKE '%$searchWord%' LIMIT $page_1,3");

              // the Count row for Search Page Pagination

              $countPostTagsQuery = "SELECT * FROM posts WHERE post_tags LIKE '%$searchWord%'";

              $countPostTags = $theConnection -> executeTheQuery($countPostTagsQuery);

              $count = mysqli_num_rows($countPostTags);

              $count = ceil($count / 6);

              if(!$searchQuery)
              {
                echo "Search Failed ..." . mysqli_error($theConnection);
                die();
              }

              $count2 = mysqli_num_rows($searchQuery);

              if($count2 == 0)
              {
                echo "<h1>No Result Found For Search Query...</h1>";
                die();
              }
              else
              {
                while($row = mysqli_fetch_assoc($searchQuery))
                {
                  $postid = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];


                  // echo "<div clas='col-md-8'>";


                  ?>


                  <h2><a href="post.php?p_id=<?php echo $postid; ?>"><?php echo $post_title; ?></a></h2>
                  <p class="lead">
                    By <a href="post.php?p_id=<?php echo $postid; ?>"><?php echo $post_author; ?></a>
                  </p>
                  <p>
                    <span class="glyphicon glyphicon-time" style="margin-right:8px"></span><?php echo $post_date; ?>
                  </p>
                  <img class="img-responsive" alt = "Blog Image" src="Admin/Blog_img/<?php echo $post_image; ?>">
                  <a href="post.php?p_id=<?php echo $postid; ?>" class="btn btn-primary" style="margin-top:15px">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

                  <?php

                }
              }


        }
              // echo "</div>";

              ?>




       <?php

       // The Second If is for the GET for Search Page Pagination for fetching the Categories and we are placing our url link in this GET Method

       if(isset($_GET["search"]))
       {

         $searchWord  = $_GET["search"];

         $searchQuery = $theConnection -> executeTheQuery("SELECT * FROM posts WHERE POST_TAGS LIKE '%$searchWord%' LIMIT $page_1,3");

         // the Count row for Search Page Pagination

         $countPostTagsQuery = "SELECT * FROM POSTS WHERE POST_TAGS LIKE '%$searchWord%'";

         $countPostTags = $theConnection -> executeTheQuery($countPostTagsQuery);

         $count = mysqli_num_rows($countPostTags);

         // This count is for the Pagination

         $count = ceil($count/6);

         if(!$searchQuery)
         {
           echo "Search Failed ..." . mysqli_error($theConnection);
           die();
         }

         // This count is for the results we are searching for in our Search page

         $count2 = mysqli_num_rows($searchQuery);

         if($count2 == 0)
         {
           echo "<h1>No Result Found For Search Query...</h1>";
           die();
         }
         else
         {
           while($row = mysqli_fetch_assoc($searchQuery))
           {
             $postid = $row['post_id'];
             $post_title = $row['post_title'];
             $post_author = $row['post_author'];
             $post_date = $row['post_date'];
             $post_image = $row['post_image'];


             // echo "<div clas='col-md-8'>";


             ?>


             <h2><a href="#"><?php echo $post_title; ?></a></h2>
             <p class="lead">
               By <a href="#"><?php echo $post_author; ?></a>
             </p>
             <p>
               <span class="glyphicon glyphicon-time" style="margin-right:8px"></span><?php echo $post_date; ?>
             </p>
             <img class="img-responsive" alt = "Blog Image" src="Admin/Blog_img/<?php echo $post_image; ?>">
             <a href="#" class="btn btn-primary" style="margin-top:15px">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

             <?php

           }
         }

    }

      ?>


    </div>


  </div>



  <ul class="pager">

      <?php

        for($i=1;$i<= $count;$i++)
        {
          echo "<li><a href='search.php?page=$i&search=$searchWord'>$i</a></li>";
        }

        // Check for the last Page

        if($i == $page)
        {
          echo "<li><a href='search.php?page=$i&search=$searchWord' class='active_link'>$i</a></li>";

        }
        else
        {
          echo "<li><a href='search.php?page=$i&search=$searchWord'>$i</a></li>";

        }



      ?>

  </ul>





<?php


include "include/footer.php";

?>
