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

  <!-- Page Content -->

  <!-- Here we will write our PHP Blog code for displaying Post in our index Page -->



  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <?php

          if(isset($_GET['page']))
          {
              $page = $_GET['page']; // Here we getting dynammic Page no values

          }
          else
          {
              $page = "";
          }

          if($page == "" || $page == 1)
          {
            $page_1 = 0; // Algorithms use in PHP
                         //  Without algorithms we  can create Pages i.e Pager
          }
          else
          {
            $page_1 = ($page * 3) - 3;

          }


          // PHP Page Pagination

          $postQueryCountSelect = "SELECT * FROM POSTS";

          $findCountPosts = $theConnection -> executeTheQuery("$postQueryCountSelect");

            // mysqli_num_rows is basically a inbuilt function in PHP which we can use for Pagination

            $count = mysqli_num_rows($findCountPosts);

            // with 6 value we display the exact no of pages

            $count = ceil($count / 6); // Here ceil is basicaally inbuilt function in PHP which is used in Pagination
                                      // for rounding the Pages value


          // PHP Page Pagination


           // Here we perform Pagination

            $sqlSelectAllPosts = "SELECT * FROM POSTS LIMIT  $page_1, 3 ";

            $selectAllPosts = $theConnection -> executeTheQuery($sqlSelectAllPosts);

            // Here by using while loop we retrieve all the information from the database

            // imp php code

            while ($row = mysqli_fetch_assoc($selectAllPosts))
            {

             // Here we place First Blog Post
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];

              //  end of imp php code

        ?>


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


        ?>

        <!-- end of imp php code -->

        <!-- col-md-8 -->


         </div>

         <!-- Site Bar Search, Blog Categories, Animated Advertisements -->

         <section>

           <?php

              include "include/sidebar.php";

           ?>


         </section>

    </div>

    <!-- Row End -->

  </div>

  <!-- This is our End of Container -->



  <!-- Site Bar -->

  <!-- Footer -->

  <!-- Here we will create a Page nos for our Pages -->

  <ul class="pager">

    <?php

        for($i = 1; $i <= $count; $i++)
        {

          echo "<li><a href='index.php?page=$i'>$i</a></li>";

        }

        // last page of the blog is making it active in the Bootstrap class 'active_link'

        if($i == $page)
        {
            echo "<li><a href='index.php?page=$i' class='active_link'>$i</a></li>";
        }
        else
        {
          echo "<li><a href='index.php?page=$i'>$i</a></li>";

        }


      ?>


  </ul>

<?php

  include "include/footer.php";

?>
