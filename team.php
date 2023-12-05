<?php 
require_once('functions/function.php');
get_header();
  
 ?>

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Our Team</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Our Team</li>
        </ol>

      </div> 
    </div><!-- End Breadcrumbs -->

   
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>

        <div class="row gy-5">
          <?php 
          $sels="SELECT * FROM our_team ORDER BY our_id DESC LIMIT 0,6";
          $Qs=mysqli_query($con,$sels);
          while($data=mysqli_fetch_assoc($Qs)){
         ?>

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="admin/uploads/<?= $data['our_image']; ?>" class="img-fluid" alt="">
              <div class="social">
                <a href="<?= $data['our_twitter']; ?>"><i class="bi bi-twitter"></i></a>
                <a href="<?= $data['our_facebook']; ?>"><i class="bi bi-facebook"></i></a>
                <a href="<?= $data['our_instragram']; ?>"><i class="bi bi-instagram"></i></a>
                <a href="<?= $data['our_linkdin']; ?>"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4><?= $data['our_name']; ?></h4>
              <span><?= $data['our_designation']; ?></span>
              <p><?= $data['our_subtitle']; ?></p>
            </div>
          </div><!-- End Team Member -->

         <?php 

        } ?> 
        </div>

      </div>
    </section><!-- End Our Team Section -->

     <?php 
 get_footer();

  ?>