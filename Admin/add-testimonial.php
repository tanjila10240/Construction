<?php 


require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){
  $name=$_POST['name'];
  $career=$_POST['career'];
  $subtitle=$_POST['subtitle'];
  $image=$_FILES['pik'];
  $imageName='';

   if($image['name']!=''){
   $imageName='testimonial'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

  }
$insert="INSERT INTO testimonials(tes_name,tes_career,tes_subtitle,tes_image)
VALUES('$name','$career','$subtitle','$imageName')";

  if(!empty($name)){
    if(mysqli_query($con,$insert)){
       move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
         echo "Testimonials upload success.";

       }else{
      echo "Testimonials upload failed.";
    }

   }else{
    echo "Please enter testimonials name";
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
                            <i class="fab fa-gg-circle"></i>Add Testimonial information
                        </div>  
                        <div class="col-md-4 card_button_part">
                            <a href="all-testimonial.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Testimonial</a>
                        </div>  
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Testimonial Name<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="name">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Testimonial Career:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="career">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Testimonial Subtitle<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="subtitle">
                        </div>
                      </div> 
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Testimonial Image:</label>
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