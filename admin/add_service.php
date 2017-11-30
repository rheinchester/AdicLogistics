<?php 
  include_once('../header_template.php');
  //include_once 'includes/Category.php';
  include_once '../includes/services.php';
  include_once ('../includes/session.php');
  include_once ('../includes/function.php');
  if(!$session->is_logged_in()) redirect('logout.php');
  $msg = "";
  if(isset($_POST['submit'])){
    $service = Service::instantiate($_POST);
    //($service->create()) ? $msg ='successful' : $msg = 'Failed';
    $service->attach_file($_FILES['image']);
    if ($service->save_with_file()) {
      $msg = "Successful";
    }else{
      $msg = "Failed";
    }
  }
 ?>
     <div class='row'>
        <article class='col col-lg-9 col-md-8 col-sm-9'>
          <div class='row'>
            <?php echo $msg; ?>
          </div>
          <div class='row'>
            <h3>Customer Form</h3>
          </div>          
          <section class='row'>
            <form class='form-horizontal' action='add_service.php' method='post' enctype="multipart/form-data">           
              <div class='form-group'>
                <label class='control-label col col-lg-4'>Name</label>
                <div class='col col-lg-6'>
                  <input class='form-control' name='name' type='text'>
                </div>
              </div>
              <div class='form-group'>
                <label class='control-label col col-lg-4'>Price</label>
                <div class='col col-lg-6'>
                  <input required class='form-control' name='price' type='text'>
                </div>
              </div>
              <div class='form-group'>
                <label class='control-label col col-lg-4'>Description</label>
                <div class='col col-lg-6'>
                  <textarea class='form-control ' name='description'></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label class='control-label col col-lg-4'>Product Image</label>
                <div class='col col-lg-6'>
                  <input class='form-control' name='image' type='file'>
                </div>
              </div>
              <div class='col col-lg-6 col-lg-offset-4'>
                <button type='submit' name='submit' class ='btn btn-primary'>Submit Form</button>
              </div>
            </form>
          </section>       
        </article>
      </div>
            </form>
          </div>
          </section>
 <?php 
 include_once('../footer_template.php');
 ?>