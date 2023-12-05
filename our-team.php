
<?php 
require_once('functions/function.php');
get_header();
 ?>

  <main id="main">
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Contact</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contact</li>
        </ol>
      </div>
    </div>

    <section id="constructions" class="constructions">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>
        <div class="row gy-4">
           <?php 
          $sels="SELECT * FROM teams ORDER BY team_id DESC";
          $Qs=mysqli_query($con,$sels);
          while($data=mysqli_fetch_assoc($Qs)){
         ?>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url(admin/uploads/<?= $data['team_image']; ?>);"></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title"><?= $data['team_name'];?></h4>
                    <p><?= $data['team_designation']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
                <?php 

        } ?>
        </div>
  
      </div>
    </section>

   

<?php 
  get_footer();
 ?>

