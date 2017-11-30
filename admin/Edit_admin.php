<?php 
    include_once '../header_template.php';
    include_once ('../includes/Admin.php');
    include_once ('../includes/session.php');
    include_once ('../includes/function.php'); 
    $msg = "";
    if(!$session->is_logged_in()) redirect('logout.php');
    $admin = new Admin();
  if(isset($_GET['id'])){
    $admin = Admin::find($_GET['id']);
  }
  if(isset($_POST['submit'])){
    $admin = Admin::instantiate($_POST);
    if(Admin::find($admin->admin_id)) {
      ($admin->update()) ? $msg = 'Successful': $msg = 'Failed';   
    } 
  }
 ?>
<!-- Template for creating additional pages -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adic | Edit Admin </title>
  <link rel="stylesheet" href="advanced/css/base.css">
  <link rel="stylesheet" href="advanced/css/style.css">
  <script src="advanced/js/modernizr.js"></script>
  <!-- icomoon.com -->
  <link rel="stylesheet" href="css/icomoon/demo-files/demo.css">
  <link rel="stylesheet" href="css/icomoon/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/Adic.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome/css/font-awesome.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src ="js/respond.js"></script>
</head>
<body class="bg-grey" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
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
         <!--   <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li> -->
        <li><a href="logout.php">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="wrapper">
    
    <div id="header">
    </div><!-- #header -->
    
    <div id="content">
    </div><!-- #content -->
    
    <div id="footer">
    </div><!-- #footer -->
    
  </div><!-- #wrapper -->
     <div class='row'>
        <article class='col col-lg-9 col-md-8 col-sm-9'>         
          <section class='row'>
            <div class='row'>
             <h1 class="col-lg-offset-4 col-md-offset-6 col-sm-offset-4 text-center">Edit admin</h1>
           </div> 
            <br> 
            <div class="col-lg-offset-4 col-md-offset-5 col-sm-offset-3 ">
            <form  class='form-horizontal' action='Edit_admin.php' method='post'>  
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='admin_id' type='text' placeholder="Admin ID" value='<?php echo $admin->admin_id; ?>'">
                </div>
              </div>            
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='username' type='text' placeholder="User name" value='<?php echo $admin->username; ?>'">
                </div>
              </div>
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>email</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='email' type='email' placeholder="Email" value='<?php echo $admin->email; ?>'>
                </div>
              </div>

             <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Phone</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='phone' type='text' placeholder="Phone" value='<?php echo $admin->phone; ?>'>
                </div>
              </div>

              
             
               <div class='col col-lg-7 col-md-7 col-sm-9 col-sm-offset-5 col-lg-offset-5 col-md-offset-5 col-xs-offset-5'>
                <button type='submit' name='submit' class ='btn btn-primary'>Edit Admin</button>
              </div>
            </form>
            </div>
          </section>       
        </article>
      </div>
            </form>
          </div>
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
 <?php 
 include_once('../footer_template.php');
 ?>