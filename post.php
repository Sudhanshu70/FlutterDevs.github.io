<?php

  require_once "include/db.php";

  $theConnection = new Db("localhost","root","","sudhanshu_php_blog");

  ob_start();



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


      <?php

      // To do Refactoring

          if(isset($_POST['subComment']))
          {
            $theComment = $_POST['leaveComment'];
            $theCommentTag = $_POST['commentTag'];
            $comment_post_title = $_POST['comment_post_title'];

            // $theDate = date('Y-m-d');

            // Here the browser need to know that only the user can comment so we are assigning the $comment_author to User SESSION

            $comment_author = $_SESSION['user'];


                $commentQuery = "INSERT INTO COMMENTS ";

                $commentQuery .= " (COMMENT_CONTENT ,COMMENT_TAG, COMMENT_POST_TITLE, COMMENT_DATE, COMMENT_AUTHOR) ";

                $commentQuery .= "VALUES ('$theComment','$theCommentTag','$comment_post_title', now(),'$comment_author') ";

                // date('l jS F Y h:i:s A')

                    $uploadTheComment = $theConnection -> executeTheQuery($commentQuery);

                        $theConnection -> confirmTheQuery($uploadTheComment);

              echo "User Comment saved Successfully !!!";

          }
          else
          {
            echo "User Comment was unable to save !!!";
          }


      ?>



      <div class="col-md-8">

        <?php

                    if(isset($_GET['p_id']))
                    {
                      $p_id  = $_GET['p_id'];



          // PHP Page Pagination

          $postQueryCount = "SELECT * FROM POSTS";

          $findCountPosts = $theConnection -> executeTheQuery("$postQueryCount");

            // mysqli_num_rows is basically a inbuilt function in PHP which we can use for Pagination

            $count = mysqli_num_rows($findCountPosts);

            // with 6 value we display the exact no of pages

            $count = ceil($count / 6); // Here ceil is basicaally inbuilt function in PHP which is used in Pagination
                                      // for rounding the Pages value


          // PHP Page Pagination


           // Here we perform Pagination

            $sqlSelectThePosts = "SELECT * FROM POSTS WHERE POST_ID = '$p_id'";

            $selectThePost = $theConnection -> executeTheQuery($sqlSelectThePosts);

            // Here by using while loop we retrieve all the information from the database

            // imp php code

            while ($row = mysqli_fetch_assoc($selectThePost))
            {

             // Here we place First Blog Post
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
              $post_video = $row['post_link'];

              //  end of imp php code

        ?>


        <h2>
          <!-- This is our Post Title -->
          <a href="#"><?php echo $post_title; ?></a>
        </h2>
        <!-- This is our Post Author -->

        <p class="lead">
          By <a href="#"><?php echo $post_author; ?></a>
        </p>
        <!-- Here after user will select Post,we will display rest of information of Post -->

        <!-- This is our Post Date -->

        <p><span class="glyphicon glyphicon-time" style="margin-right:5px"></span><?php echo $post_date; ?></p>
        <!-- Here we will Put our Blog Dynamic Image -->

          <img class="img-responsive" alt="Blog Title" src="Admin/Blog_Img/<?php echo $post_image; ?>"/>
          <!-- Here we will Put our Blog Content -->
          <p style="margin-top:20px">
            <?php echo $post_content; ?>
          </p>
          <a href="<?php echo $post_video; ?>" target="_blank">

             <img src = "images/cars_gifs/avtar.gif" style="margin-bottom:25px;margin-top:10px;border:5px dashed purple;"></img>

          </a>

          <!-- PHP code to display All Comments in Blog -->

              <?php

                  $showAllComments = $theConnection -> executeTheQuery("SELECT * FROM COMMENTS WHERE COMMENT_POST_TITLE LIKE '%$post_title%' ORDER BY COMMENT_DATE DESC");

                      $theConnection -> ConfirmTheQuery($showAllComments);

                      while($row = mysqli_fetch_assoc($showAllComments))
                      {

                          $comment_content = $row['COMMENT_CONTENT'];
                          $comment_date = $row['COMMENT_DATE'];
                          $comment_tag = $row['COMMENT_TAG'];
                          $commentAuthor = $row['COMMENT_AUTHOR'];

                          echo "<div class='well' style='border:3px solid grey'>";



              ?>


              <h3>Previous Comments: </h3>
                <p class="info">

                    <?php echo $comment_content ?>

                </p>

              <h4>Tags : <?php echo $comment_tag ?></h4>

              <h4>By: <?php echo $commentAuthor ?></h4>

              <h4 style="margin-top:15px;">Commented on: </h4><p><span class="glyphicon glyphicon-time" style="margin-top:5px;margin-right:10px"></span><?php echo $comment_date ?></p>


          <?php

                  echo "</div>";

                }

         ?>

          <br>

          <!-- Comment Form for our Blog -->

           <div class="well" style="border:3px solid grey">

              <form role="form" method="post" action="" enctype="multipart/form-data">

                <h4>You can Leave Your Comment Here...</h4>
                <div class="form-group">
                    <label for="title">Post Title: </label>
                    <input type="text" class="form-control" name="comment_post_title" value="<?php echo $post_title; ?>" readonly></input>
                </div>
                <div class="form-group">
                  <label for="tag">Comment Tag: </label>
                  <input type="text" class="form-control" name="commentTag" placeholder="Please write your Comment Tag Here..."></input>
                </div>
                <div class="form-group">
                  <label for="the comment">Comment Content: </label>
                  <textarea type="" class="form-control" rows="3" name="leaveComment" placeholder="Please write your Comment Content Here..."></textarea>
                </div>

                <!-- Validation for the User -->


                <?php

                    if($_SESSION['user'])
                    {

                      echo "<button type='submit' class='btn btn-primary' name='subComment'>Submit</button>";
                    }
                    else
                    {
                      echo "<button type='submit' class='btn btn-primary' name='go_To_Login'>LOGIN TO COMMENT</button>";
                    }

                        if(isset($_POST['go_To_Login']))
                        {
                          header("Location: loginUser.php");
                        }



                ?>


              </form>

           </div>


       <!-- imp php code -->

        <?php

         }

    // if statement closing for displaying our whole Blog Post in Post page

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


<?php

  include "include/footer.php";

?>
