<?php 

require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$id=$_GET['es'];
$sel="SELECT * FROM services WHERE service_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
 $title=$_POST['title'];
 $details=$_POST['details'];
 $icon=$_POST['icon'];



$update="UPDATE services SET service_title='$title',service_details='$details',service_icon='$icon' WHERE service_id='$id'";

if(!empty($title)){
  if(!empty($details)){
     if(!empty($icon)){
       if(mysqli_query($con,$update)){ 
        
          if(mysqli_query($con,$update)){
          header('location: view-service.php?vs='.$id);


        }
         header('location: view-service.php?vs='.$id);
        
       }else{
      echo "Opps! Service information update failed.";
       }

      }else{
        echo "please select service icon.";
      }
            
      }else{
        echo "please enter your details.";
      }
      
    }else{
      echo "please enter your title.";
    }

 }

 ?>


  <div class="row">
      <div class="col-md-12 ">
          <form method="post" action="" enctype="multipart/form-data">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                          <i class="fab fa-gg-circle"></i>Update Service Information
                      </div>  
                      <div class="col-md-4 card_button_part">
                          <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
                      </div>  
                  </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="title" value="<?=$data['service_title'];?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Details:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="details" value="<?=$data['service_details']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Icon<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="icon" value="<?=$data['service_icon']; ?>">
                      </div>
                    </div>
                  </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-dark">Update</button>
                </div>  
              </div>
          </form>
      </div>
  </div>


<?php 
get_footer();

   }else{

  header('location: index.php');

// echo "You have no permission visit page.";
}

 ?> 