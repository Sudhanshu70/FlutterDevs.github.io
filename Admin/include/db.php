<?php

    Class DB{

      private $localhost;
      private $user;
      private $password;
      private $dbname;
      private $myConnection;
      private $sql;

        public function __construct($localhost,$user,$password,$dbname){

          $this->myConnection = mysqli_connect($localhost,$user,$password,$dbname);

          if($this->myConnection)
          {
            echo "We are Connected !!!";
          }
          else
          {
            echo "Connection Failed!!!" . mysqli_error($this->myConnection);
          }

        }

        // imp part

        public function executeTheQuery($sql){

          $executeQuery = mysqli_query($this->myConnection,$sql);

              if(!$executeQuery)
              {
                echo "Query Failed!!!" . mysqli_error($this->myConnection);
              }

              return $executeQuery;

        }

        public function displayCategories($processedData){

          $category_title = $row['CAT_TITLE'];
          $display = "<li><a href='#'>{$category_title}</a></li>";

          echo $display;


        }

    }


?>
