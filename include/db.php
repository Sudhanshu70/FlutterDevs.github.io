<?php

Class DB {

      //  DB Connection

      private $localhost;
      private $username;
      private $password;
      private $dbname;
      private $myConnection;
      private $sql;

      // global $myConnection;

      public function __construct($localhost, $username, $password, $dbname)
      {


        $this->myConnection = mysqli_connect($localhost, $username, $password, $dbname);

        if($this->myConnection)
        {
          echo "<BR><BR><BR><BR>";
          echo "Connection Established !!!";
        }
        else
        {
         echo "Connection Failed !!!" . mysqli_error($this->myConnection);
        }

    }

    function ConfirmTheQuery($incoming)
    {
        global $theConnection;

        if (!$incoming)
        {
          echo "Add Admin Query for Admin Failed" . mysqli_error($theConnection);

        }
        // else
        // {
        //   echo "NEW Admin Added Successfully";
        // }



    }



        public function executeTheQuery($sql){


          $executeTheQuery = mysqli_query($this->myConnection, $sql);

          if(!$executeTheQuery)
          {
            echo "Connection Failed !!!" . mysqli_error($this->myConnection);
          }

          return $executeTheQuery;

  }

  public function displayCategories($processData)
  {

    while( $row = mysqli_fetch_assoc($processData))
    {
       $category_id = $row['CAT_ID'];
       $category_title = $row['CAT_TITLE'];

       // TO DO

       // This ? method is called url method

       // Here with the help of ? we are able to create the url

       $display="<li><a href='category.php?theCategoryTitle=$category_title' style='text-decoration: none;'>$category_title</a></li>";

       echo $display;
    }



  }

}

?>
