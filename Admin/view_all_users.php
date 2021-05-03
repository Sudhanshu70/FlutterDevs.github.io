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

          <small>View All Users</small>

        </h1>




         <!-- Here we Add Table to view all Posts in Admin Panel -->

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>USER ID</th>
                    <th>USER NAME</th>
                    <th>USER FIRST_NAME</th>
                    <th>USER LAST_NAME</th>
                    <th>USER E-MAIL</th>
                    <th>REGISTERED ON</th>
                    <th>REMOVE USER</th>

                </tr>

            </thead>

            <tbody>

            <?php

                // Here We count the no of rows of Users in the Database

                // *******************************

                // Here this code is especially for counting the no of Posts

                $sqlCountAllUsers = "SELECT * FROM USERS";

                $executeCount = $theConnection-> executeTheQuery($sqlCountAllUsers);


                $countUsers = mysqli_num_rows($executeCount);

                // *******************************

                // Here this code is especially for fetching the no of rows
                // from the database

                $sqlViewAllUsers = "SELECT * FROM USERS";

                $executeSqlUsers = $theConnection-> executeTheQuery($sqlViewAllUsers);

                while ($row = mysqli_fetch_assoc($executeSqlUsers))
                {
                  $user_id = $row['USER_ID'];
                  $user_name = $row['USER_NAME'];
                  $user_firstname = $row['USER_FIRST_NAME'];
                  $user_lastname = $row['USER_LAST_NAME'];
                  $user_email = $row['EMAIL'];
                  $user_date = $row['USER_REGISTERED_DATE'];

                  echo "<tr>";

                      echo "<td>$user_id</td>";
                      echo "<td>$user_name</td>";
                      echo "<td>$user_firstname</td>";
                      echo "<td>$user_lastname</td>";
                      echo "<td>$user_email</td>";
                      echo "<td>$user_date</td>";

                      echo "<td><a href='view_all_users.php?DELETE=$user_id'>REMOVE</a></td>";


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


                </tr>
            </tbody>

        </table>

        <!-- Here we display how many posts we have in our Blog -->

        <?php

            echo "<h3 class= 'info'>No of Users are : </h3>" . $countUsers;

        ?>

        <?php

        // Calling the function for Delete Users

          deleteTheUsers();


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
