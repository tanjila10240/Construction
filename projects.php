

<?php 
require_once('functions/function.php');
get_header();
 ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Projects</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Projects</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-remodeling">Remodeling</li>
            <li data-filter=".filter-construction">Construction</li>
            <li data-filter=".filter-repairs">Repairs</li>
            <li data-filter=".filter-design">Design</li>
          </ul><!-- End Projects Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
         <?php 
          $sels="SELECT * FROM projects ORDER BY project_id DESC";
          $Qs=mysqli_query($con,$sels);
          while($data=mysqli_fetch_assoc($Qs)){
         ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="admin/uploads/<?= $data['project_image']; ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $data['project_cetagory'];?></h4>
                  <p><?= $data['project_title'];?></p>
                  <a href="admin/uploads/<?= $data['project_image']; ?>" title="<?= $data['project_cetagory'];?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

         <?php 

        } ?>
        
          </div>

        </div>

      </div>
    </section>

  </main>

<?php 
  get_footer();
 ?>

  