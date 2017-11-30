<?php 
  include_once ('../includes/Admin.php');
  include_once ('../includes/session.php');
  include_once ('../includes/function.php');

  if(!$session->is_logged_in()) redirect('logout.php');

?>
<!-- Template for creating additional pages -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adic | dashboard </title>
  
  <!-- icomoon.com -->
  <link rel="stylesheet" href="css/icomoon/demo-files/demo.css">
  <link rel="stylesheet" href="css/icomoon/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../css/Adic.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src ="../js/respond.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.php">ADIC</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">LOG OUT</a></li>
        
      </ul>
    </div>
  </div>
</nav>
  <section>
  
  <div id="services" class="container-fluid text-center">
    <h1 class="text-center jumbo-text">Welcome to the dashboard</h1>
    <br>
    <div class="row ">
       <div class="col-sm-4">
        <a href="Add_customer.php">
        <span class="glyphicon glyphicon-plus logo-admin"></span>
        <h2>Add customer</h2>
        </a>
      </div>
      <!-- <div class="col-sm-3">
        <a href="Edit_customer.php">
        <span class="glyphicon glyphicon-pencil logo-admin"></span>
        <h2>Edit customer</h2>
        </a>
      </div> -->
      <div class="col-sm-4">
        <a href="All_customers.php">
        <span class="glyphicon glyphicon-user logo-admin"></span>
        <h2>View customers</h2>
        </a>
      </div>

      <div class="col-sm-4">
        <a href="InnerAdmin">
        <span class="glyphicon glyphicon-globe logo-admin"></span>
        <h2>Admin</h2>
        </a>
      </div>


    </div>
  </div>
  </section>
<div id="wrapper">
    
    <div id="header">
    </div><!-- #header -->
    
    <div id="content">
    </div><!-- #content -->
    
    <div id="footer">
    </div><!-- #footer -->
    
  </div><!-- #wrapper -->

          
<aside class="row">
      <div class="col  ">
        <ol class="text-center">
          <a><i class=" fa-3x fa fa-facebook"></i></a>
          <a><i class=" fa-3x fa fa-twitter"></i></a>
          <a><i class=" fa-3x fa fa-youtube"></i></a>
          <a><i class=" fa-3x fa fa-instagram"></i></a>
        </ol>
      </div>
      
      <div class="col col-lg-2"></div>
      <div class="col col-lg-2"></div>
</aside>
<footer class="container-fluid text-center footer-small jumbo-text">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> &copy;2017 Adic logistics </p>
</footer>
<!-- Fot free API key from Google.-->
<script type="text/javascript" src="js/GoogleMaps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
   <script type="text/javascript" src="../js/smoothScroll.js"></script>
  <script type="text/javascript" src = "../js/jquery.js"></script>
  <script type="text/javascript" src = "../js/bootstrap.min.js"></script>
  <!-- <script src="advanced/js/demo.js"></script> -->
  <script src="../css/icomoon/demo-files/demo.js"></script><!-- for glyphicon -->
</body>
</html>
