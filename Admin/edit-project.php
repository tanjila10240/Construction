<?php 

require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$id=$_GET['ep'];
$sel="SELECT * FROM projects WHERE project_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){

 $title=$_POST['title'];
 $link=$_POST['link'];
 $cetagory=$_POST['cetagory'];
  $image=$_FILES['pik'];


$update="UPDATE projects SET project_title='$title',project_link='$link',project_cetagory='$cetagory' WHERE project_id='$id'";

if(!empty($title)){
  if(!empty($link)){
       if(mysqli_query($con,$update)){ 
        
        if($image['name']!=''){
           $imageName='team_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
          $updimg="UPDATE projects SET project_image='$imageName' WHERE project_id='$id'";
          if(mysqli_query($con,$updimg)){
          move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
          header('location: view-project.php?vp='.$id);
          }else{
            echo"User project imge update failed.";
          }

        }
         header('location: view-project.php?vp='.$id);
        
       }else{
      echo "Opps! User project information update failed.";
       }
            
      }else{
        echo "please enter your icon link.";
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
                          <i class="fab fa-gg-circle"></i>Update Team Information
                      </div>  
                      <div class="col-md-4 card_button_part">
                          <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
                      </div>  
                  </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Project Title<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="title" value="<?=$data['project_title'];?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Project Icon link:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="link" value="<?=$data['project_link']; ?>">
                      </div>
                    </div>
                       <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Catagory:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="cetagory" value="<?=$data['project_cetagory']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                      <div class="col-sm-4">
                        <input type="file" class="form-control form_control" id="" name="pik">
                      </div>
                       <div class="col-md-2">
                         <?php if($data['project_image']!=''){ ?>
                      <img height="150" class="img200"src="uploads/<?= $data['project_image']; ?>" alt="Project"/>
                      <?php }else{ ?>
                        <img height="150" src="images/avatar.jpg" alt="Project"/>
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