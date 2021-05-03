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

          <small>View All Comments</small>

        </h1>




         <!-- Here we Add Table to view all Posts in Admin Panel -->

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>COMMENT ID</th>
                    <th>COMMENT CONTENT</th>
                    <th>COMMENT ON</th>
                    <th>COMMENT POST TITLE</th>
                    <th>COMMENT TAG</th>
                    <th>DELETE</th>

                </tr>

            </thead>

            <tbody>

            <?php

                // Here We count the no of rows in the Database

                // *******************************

                // Here this code is especially for counting the no of Posts

                $sqlCountAllComments = "SELECT * FROM COMMENTS";

                $executeCount = $theConnection-> executeTheQuery($sqlCountAllComments);


                $countComments = mysqli_num_rows($executeCount);

                // *******************************

                // Here this code is especially for fetching the no of rows
                // from the database

                $sqlViewAllComments = "SELECT * FROM COMMENTS";

                $executeSqlComments = $theConnection-> executeTheQuery($sqlViewAllComments);

                while ($row = mysqli_fetch_assoc($executeSqlComments))
                {
                  $comment_id = $row['COMMENT_ID'];
                  $comment_content = $row['COMMENT_CONTENT'];
                  $comment_date = $row['COMMENT_DATE'];
                  $comment_post_title = $row['COMMENT_POST_TITLE'];
                  $comment_tag = $row['COMMENT_TAG'];

                  echo "<tr>";

                      echo "<td>$comment_id</td>";
                      echo "<td>$comment_content</td>";
                      echo "<td>$comment_date</td>";
                      echo "<td>$comment_post_title</td>";
                      echo "<td>$comment_tag</td>";
                      echo "<td><a href='view_all_comments.php?DELETE=$comment_id'>DELETE</a></td>";


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

                </tr>
            </tbody>

        </table>

        <!-- Here we display how many posts we have in our Blog -->

        <?php

            echo "<h3 class= 'info'>No of Comments are : </h3>" . $countComments;

        ?>

        <!-- Here we write code for deleteing Blogs existings blogs -->

        <?php

        // Calling the function for Delete Comments

          deleteTheComment();


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
