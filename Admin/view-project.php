<?php 
require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

  $id=$_GET['vp'];
  $sel="SELECT * FROM projects WHERE project_id='$id'";
  $Q=mysqli_query($con,$sel);
  $data=mysqli_fetch_assoc($Q);

 ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>View Project Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Project</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered table-striped table-hover custom_view_table">
                                          <tr>
                                            <td>Title</td>  
                                            <td>:</td>  
                                            <td><?= $data['project_title']; ?></td>  
                                          </tr>
                                          <tr>
                                            <td>Icon Link</td>  
                                            <td>:</td>  
                                            <td><?= $data['project_link']; ?></td>  
                                          </tr> 
                                          <tr>
                                            <td>Cetagory</td>  
                                            <td>:</td>  
                                            <td><?= $data['project_cetagory']; ?></td>  
                                          </tr>
                                          <tr>
                                            <td>Image</td>  
                                            <td>:</td>  
                                            <td>
                                               <?php if($data['project_image']!=''){ ?>
                                             <img height="200" class="img200"src="uploads/<?= $data['project_image']; ?>" alt="Project"/>
                                            <?php }else{ ?>
                                             <img height="200" src="images/carosel-3.jpg" alt="Project"/>
                                            <?php } ?> 
                                            </td>  
                                          </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
                            </div>
                        </div>
                    </div>

        
   <?php 
   get_footer();

   }else{

  header('location: index.php');

}
    ?>