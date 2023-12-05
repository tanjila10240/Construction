<?php 
require_once('functions/function.php');
get_header();
  
 ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Services</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Services</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
       <?php 
          $sels="SELECT * FROM services ORDER BY service_id DESC LIMIT 0,6";
          $Qs=mysqli_query($con,$sels);
          while($data=mysqli_fetch_assoc($Qs)){
         ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="<?= $data['service_icon']; ?>"></i>
              </div>
              <h3><?= $data['service_title']; ?></h3>
              <p><?= $data['service_details']; ?></p>
              <a href="service-details.html" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <?php 

        } ?>    
        </div>

      </div>
    </section><!-- End Services Section -->

    
 <?php 
 get_footer();

  ?>