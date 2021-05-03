<div class="col-md-4 pull-right">

  <!-- Blog Search Panel well -->

    <div class="well">

        <h4><strong>Blog Search</strong></h4>

            <form action="search.php" method="post">

                <div class="input-group">
                    <input type="text" placeholder="You can Search Your Blog By Tag..." name="search" class="form-control">
                          <!-- <BR> -->
                          <span class="input-group-btn">
                          <button class="btn btn-primary" name="submitSearch" type="submit">
                            <span class="glyphicon glyphicon-search"></span>

                          </button>
                      </span>
                </div>

            </form>

    </div>

    <div class="well">

      <h4><strong>Blog Categories</strong></h4>

          <div class="row">
                <div class="col-lg-12">
                    <h4><ul style="list-style-type: square;">
                        <!-- PHP code  -->

                        <?php

                            $selectAllCategories  = $theConnection-> executeTheQuery("SELECT * FROM CATEGORIES");

                            $theConnection -> displayCategories($selectAllCategories);

                            // echo "<li><a href='#' style='text-decoration:none'>PHOTO ALBUM</a></li>";
                        ?>




                    </ul></h4>
                </div>
          </div>

    </div>

    <!-- Advertisement Banner -->

    <div class="well" style="border: 2px solid grey">
        <h4>Ads By Google</h4>
          <section>
              <div class="banner">
                  <div class="animated">
                    <a href="https://www.mercedes-benz.com/en/vehicles/passenger-cars/mercedes-benz-concept-cars/vision-avtr/" target="_blank">
                      <div class="text1">
                          <p>New Launch of Mercedes Vision</p>
                      </div>
                      <div class="text2">
                          <p>Mercedes-Benz AVTR</p>
                      </div>
                    </a>
                  </div>
             </div>
          </section>

    </div>

</div>
