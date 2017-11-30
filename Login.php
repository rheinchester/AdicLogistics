<?php
      include_once "includes/Admin.php";//may be customer
      include_once "includes/session.php";//adjust session
      include_once "includes/function.php";
      $msg = '';
      if(isset($_POST['init'])){
        $password = $_POST['password'];
        $admin_id = $_POST['admin_id'];

        $admin = Admin::authenticate($password,$admin_id);

        if($admin){
          $session->login($admin);
          // $msg = "Login Successful";
          redirect('admin/AdminMain.php');
        } else {
          displayMessage('Login Failed','invalid admin_id or password','warning');
        }
      }
?>  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adic | Login</title>
  <link rel="stylesheet" href="advanced/css/base.css">
  <link rel="stylesheet" href="advanced/css/style.css">
  <script src="advanced/js/modernizr.js"></script>
  <!-- icomoon.com -->
  <link rel="stylesheet" href="css/icomoon/demo-files/demo.css">
  <link rel="stylesheet" href="css/icomoon/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/Adic.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src ="js/respond.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Adic</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>
 -->
  <section class="container" id="formsect">
  <div>
     <h3><?php 
         echo $msg;
     ?></h3>
   </div>
    <article class='col col-lg-offset-2 col-lg-8 col-md-8 col-sm-9'>
      <section class='row'>
    	  <form class="form-horizontal " action="Login.php" method="post">
    	  	<h3 class="text-center">Sign In</h3>
    	  	<div class="text-center">
    	  		<h2>Log Into your Account</h2>
    	  	</div>
          <div class="form-group">
      	  	<div class="col col-lg-5 col-lg-offset-2">
      	  		<input type="mail" name="admin_id" placeholder="Admin ID" required="" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col col-lg-5 col-lg-offset-2">
    	  		 <input type="password" name="password" placeholder="Password" required="" class="form-control">
            </div>
          </div>

    	  	<div class="col col-lg-6 col-lg-offset-5">
    	 	 <button type="submit" class="btn  btn-primary " name="init">SIGN IN</button>
    	 	 </div>
    	 	 
    	 	</form>
         </section>
    </article>
  </section>

<div id="wrapper">
    
    <div id="header">
    </div><!-- #header -->
    
    <div id="content">
    </div><!-- #content -->
    
    <div id="footer">
    </div><!-- #footer -->
    
  </div><!-- #wrapper -->


 <<?php 
 include_once 'footer_template.php';
  ?>