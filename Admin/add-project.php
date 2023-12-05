<?php 


require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){

  $title=$_POST['title'];
  $icon=$_POST['icon'];
  $cetagory=$_POST['cetagory'];
  $image=$_FILES['pik'];
  $imageName='';

   if($image['name']!=''){
   $imageName='project'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

  }
$insert="INSERT INTO projects(project_title,project_link,project_cetagory,project_image)
VALUES('$title','$icon','$cetagory','$imageName')";

  if(!empty($title)){
    if(mysqli_query($con,$insert)){
       move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
         echo "Our Project upload success.";

       }else{
      echo "Project upload failed.";
    }

   }else{
    echo "Please enter project title";
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
                            <i class="fab fa-gg-circle"></i>Add Project information
                        </div>  
                        <div class="col-md-4 card_button_part">
                            <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All project</a>
                        </div>  
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Project Title<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="title">
                        </div>
                      </div> 
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Icon link:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="icon">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Project Category<span class="req_star">*</span>:</label>
                        <div class="col-sm-4">
                          <select class="form-control form_control" id="" name="cetagory">
                            <option>Select Category</option>
                            <?php 
                              $selr="SELECT * FROM category ORDER BY category_id ASC";
                              $Qr=mysqli_query($con,$selr);
                              while($urole=mysqli_fetch_assoc($Qr)){
                             ?>
                            <option value="<?= $urole['category_id']; ?>"><?= $urole['category_name']; ?></option>
                             <?php } ?> 
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">project Image:</label>
                        <div class="col-sm-4">
                          <input type="file" class="form-control form_control" id="" name="pik">
                        </div>
                      </div>
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-dark">UPLOAD</button>
                  </div>  
                </div>
            </form>
        </div>
    </div>


<?php 
get_footer();

   }else{

  header('location: index.php');

}

 ?> 