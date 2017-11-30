<?php 
  // include_once('header_template.php');
  //include_once 'includes/Category.php';
  include_once '../includes/customer.php';
  include_once '../includes/Services.php';
  $msg = "";
  if(isset($_POST['submit'])){
    $customer = Customer::instantiate($_POST);
    // var_dump($customer);
    ($customer->create()) ? $msg ='successful' : $msg = 'Failed';
    // $email = $customer->email;
    // $Customer_msg = 'email:'.$customer->email.' phone:'.$customer->phone.' service:'.$customer->service;
    // $easysms_user = 'jacob';
    // $easysms_password = 'palmline';
    // $phone = '07013795190';
    // $from = 'ADIC';
// http://www.easysms.com.ng/api/send/?user=$easysms_user&pass=$easysms_password&to=$phone&from=ADIC&msg=$Customer_msg


    $YourUsername = 'jaycob4592';
    $YourPassword = 'palmline';
    $SenderID = '100-132-4020';
    $recipient = '2347013795190';
    $YourMessage = 'Hello';

    $url = "location:http://api.smartsmssolutions.com/smsapi.php?username=".$YourUsername."&password=".$YourPassword."&sender=".$SenderID."&recipient=$recipient&message=".$YourMessage."";
    $url = urldecode($url);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $url);

$result = curl_exec($ch);
if ($result =='ok') {
    echo "message sent";
  }
  else{
    echo "";
  }

    print($result);
curl_close($ch);
  
  }
 ?>

<!-- Template for creating additional pages -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adic | Create Customer </title>
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
      <a class="navbar-brand" href="AdicFinal.php">ADIC</a>
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
            <h1 class="col-lg-offset-4 col-md-offset-6 col-sm-offset-4 text-center">Enter details</h1>
          </div> 
          <br>
            <form  class='form-horizontal' action='Add_customer.php' method='post'>          
          <div class='row text-center'>
            <?php echo $msg; ?>
           <div class="col-lg-offset-4 col-md-offset-5 col-sm-offset-3 ">
            <div>
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>First Name</label> -->
                  <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='firstname' type='text' placeholder="Last name" required>
                </div>                
              </div>

              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='lastname' type='text' placeholder="First name" required>
                </div>
              </div>
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>email</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='email' type='email' placeholder="Email" required>
                </div>
              </div>

       
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Password</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='password' type='password' placeholder="Password" required>
                </div>
              </div>

              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Confirm Password</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='password' type='password' placeholder="Confirm password" required>
                </div>
              </div>

              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Service</label> -->
               <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                   <?php echo Service::getDropDown(); ?>
                </div>
              </div>

             <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Phone</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='phone' type='text' placeholder="Phone" required>
                </div>
              </div>

              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Address</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <textarea class='form-control ' name='address' placeholder="Your address"></textarea>
                </div>
              </div>
              </div>
              <br>
               <div class='col col-lg-6 col-lg-offset-3'>
                <button type='submit' name='submit' class ='btn panel-footer-btn'>Submit Form</button>
              </div>
            </form>
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