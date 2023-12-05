<?php 

require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$id=$_GET['eo'];
$sel="SELECT * FROM our_team WHERE our_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){

 $name=$_POST['name'];
 $desig=$_POST['desig'];
 $subtitle=$_POST['subtitle'];
 $fb=$_POST['fb'];
  $tw=$_POST['tw'];
  $ingram=$_POST['ingram'];
  $linkdin=$_POST['linkdin'];
  $image=$_FILES['pik'];


$update="UPDATE our_team SET our_name='$name',our_designation='$desig',our_subtitle='$subtitle', our_facebook='$fb',our_twitter='$tw',our_instragram='$ingram',our_linkdin='$linkdin' WHERE our_id='$id'";

if(!empty($name)){
  if(!empty($desig)){
     if(!empty($subtitle)){
       if(mysqli_query($con,$update)){ 
        
        if($image['name']!=''){
           $imageName='team_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
          $updimg="UPDATE our_team SET our_image='$imageName' WHERE our_id='$id'";
          if(mysqli_query($con,$updimg)){
          move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
          header('location: view-team.php?vo='.$id);
          }else{
            echo"User team imge update failed.";
          }

        }
          header('location: view-team.php?vo='.$id);
        
       }else{
      echo "Opps! User team information update failed.";
       }

      }else{
        echo "please select user facebook-link.";
      }
            
      }else{
        echo "please enter your designation.";
      }
      
    }else{
      echo "please enter your name.";
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
                      <i class="fab fa-gg-circle"></i>Update Team Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-team.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Name<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="name" value="<?=$data['our_name'];?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Designation:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="desig" value="<?=$data['our_designation']; ?>">
                  </div>
                </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Subtitle:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="subtitle" value="<?=$data['our_subtitle']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Facebook-link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="fb" value="<?=$data['our_facebook']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Fwitter-link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="tw" value="<?=$data['our_twitter']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Instragram-link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="ingram" value="<?=$data['our_instragram']; ?>">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Team Instragram-link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control form_control" id="" name="linkdin" value="<?=$data['our_linkdin']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control form_control" id="" name="pik">
                  </div>
                   <div class="col-md-2">
                     <?php if($data['our_image']!=''){ ?>
                  <img height="150" class="img200"src="uploads/<?= $data['our_image']; ?>" alt="Team"/>
                  <?php }else{ ?>
                    <img height="150" src="images/avatar.jpg" alt="Team"/>
                  <?php } ?> 
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