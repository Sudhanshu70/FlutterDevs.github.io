<?php

  include "include/header.php";
  include "include/functionsAdmin.php";
  ob_start();


?>

  <!-- Delete it after use -->

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

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

          <small>View All Post</small>

        </h1>

      <?php



      ?>





         <!-- Here we Add Table to view all Posts in Admin Panel -->

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
                    <th>CATEGORY ID</th>
                    <th>CATEGORY</th>
                    <th>STATUS</th>
                    <th>IMAGE</th>
                    <th>TAGS</th>
                    <th>COMMENTS</th>
                    <th>CONTENT</th>
                    <th>DATE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>


                </tr>

            </thead>

            <tbody>

            <?php

                // *******************************

                // Here this code is especially for counting the no of Posts

                $sqlCountAllPosts = "SELECT * FROM POSTS";

                $executeCount = $theConnection-> executeTheQuery($sqlCountAllPosts);


                $countPosts = mysqli_num_rows($executeCount);

                // *******************************

                // Here this code is especially for fetching the no of rows
                // from the database

                $sqlViewAllPosts = "SELECT * FROM POSTS";

                $executeSqlPosts = $theConnection-> executeTheQuery($sqlViewAllPosts);

                while ($row = mysqli_fetch_assoc($executeSqlPosts))
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

                  echo "<tr>";

                      echo "<td>$post_id</td>";
                      echo "<td>$post_title</td>";
                      echo "<td>$post_author</td>";
                      echo "<td>$post_category_id</td>";
                      echo "<td>$post_category</td>";
                      echo "<td>$post_status</td>";
                      echo "<td><img src='Blog_img/$post_image' alt='Blog_Image'  width='230px' height='250px'/></td>";
                      echo "<td>$post_tags</td>";
                      echo "<td>$post_comment_count</td>";
                      echo "<td>$post_content</td>";
                      echo "<td>$post_date</td>";
                      echo "<td><a href = 'editPost.php?edit=$post_id'>Edit Post</a></td>";
                      echo "<td><a href = 'view_all_posts.php?delete=$post_id'>Delete Post </a></td>";


                  echo "</tr>";

                }

            ?>



                <tr>
                    	<td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>

                </tr>
            </tbody>

        </table>

        <!-- Here we display how many posts we have in our Blog -->

        <?php

            echo "<h3 class= 'info'>No of Posts are : </h3>" . $countPosts;

        ?>

        <!-- Here we write code for deleteing Blogs existings blogs -->

        <?php

        // Here we called the function for deleting the Post from our Blogs

        deletePost();

        ?>





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
