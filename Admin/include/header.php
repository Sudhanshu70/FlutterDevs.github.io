<?php

  include_once "db.php";

  $theConnection = new DB("localhost","root","","sudhanshu_php_blog");

    session_start();

    ob_start();


?>


<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ADMIN_PANEL">
  <meta name="author" content="SUDHANSHU">
  <title>Admin Panel</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
