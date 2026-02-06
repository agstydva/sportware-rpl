<?php
session_start(); // Start session first, before any output
include 'partials/_dbconnect.php'; // Database connection
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Home</title>
    <link rel = "icon" href ="img/sportware-logo.jpeg" type = "image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
    <!-- Custom CSS untuk mengubah warna kuning menjadi merah -->
    <style>
      /* About Us Section - mengubah progress bar menjadi merah */
      #about .progress-bar {
        background-color: #dc3545 !important; /* Merah Bootstrap */
      }
      
      #about .val {
        color: #dc3545 !important; /* Angka persentase merah */
      }
      
      #about .progress-bar-wrap .progress-bar {
        background: linear-gradient(90deg, #dc3545 0%, #c82333 100%) !important;
      }
      
      /* Counts Section - mengubah icon menjadi merah, angka tetap hitam */
      .counts .count-box i {
        color: #dc3545 !important; /* Icon merah */
      }
      
      .counts .count-box span {
        color: #000000 !important; /* Angka statistik tetap hitam */
      }
      
      /* Hover effects untuk consistency */
      .counts .count-box:hover i {
        color: #c82333 !important; /* Icon merah lebih gelap saat hover */
      }
      
      .counts .count-box:hover span {
        color: #000000 !important; /* Angka tetap hitam saat hover */
      }
      
      /* Additional styling untuk memastikan semua elemen kuning berubah */
      .progress .progress-bar {
        background-color: #dc3545 !important;
      }

      /* Categories Section - Modern Design */
      .categories {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      }

      .categories .section-title {
        text-align: center;
        margin-bottom: 60px;
      }

      .categories .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
        position: relative;
      }

      .categories .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #dc3545, #ff6b6b);
        border-radius: 2px;
      }

      .categories .section-title p {
        font-size: 1.1rem;
        color: #666;
        margin-top: 20px;
      }

      .category-card {
        position: relative;
        height: 300px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        transition: all 0.4s ease;
        cursor: pointer;
      }

      .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.25);
      }

      .category-image {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
      }

      .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
      }

      .category-card:hover .category-image img {
        transform: scale(1.1);
      }

      .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
          135deg,
          rgba(220, 53, 69, 0.9) 0%,
          rgba(108, 117, 125, 0.9) 100%
        );
        opacity: 0;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .category-card:hover .category-overlay {
        opacity: 1;
      }

      .category-content {
        text-align: center;
        color: white;
        padding: 20px;
        transform: translateY(20px);
        transition: transform 0.4s ease;
      }

      .category-card:hover .category-content {
        transform: translateY(0);
      }

      .category-content h4 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
      }

      .category-content p {
        font-size: 0.95rem;
        margin-bottom: 20px;
        opacity: 0.9;
        line-height: 1.5;
      }

      .btn-explore {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 25px;
        background: white;
        color: #dc3545;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255,255,255,0.3);
      }

      .btn-explore:hover {
        background: #dc3545;
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
      }

      .btn-explore i {
        transition: transform 0.3s ease;
      }

      .btn-explore:hover i {
        transform: translateX(5px);
      }

      /* Responsive adjustments */
      @media (max-width: 768px) {
        .categories {
          padding: 60px 0;
        }
        
        .categories .section-title h2 {
          font-size: 2rem;
        }
        
        .category-card {
          height: 250px;
          margin-bottom: 20px;
        }
        
        .category-content h4 {
          font-size: 1.3rem;
        }
        
        .category-content p {
          font-size: 0.9rem;
        }
      }

      @media (max-width: 576px) {
        .category-card {
          height: 220px;
        }
        
        .category-content {
          padding: 15px;
        }
        
        .btn-explore {
          padding: 10px 20px;
          font-size: 0.85rem;
        }
      }
    </style>

  </head>
  <body>
  <?php include 'partials/_nav.php';?>
  
      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-background"><img src="assets/img/slide/slide-olhar1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Sportware</span></h2>
                <p class="animate__animated animate__fadeInUp">Feel the Motion, Live the Action.</p>
                <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/slide-olhar2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown mb-0">Our Mission</h2>
                <p class="animate__animated animate__fadeInUp">Breaking Your Limits. That's Our Purpose.</p>
                <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>
          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/slide-olhar3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown mb-0">Sportware</h2><p>Instagram : <a href="https://github.com/agstydva" target="_blank">@sportware</a></p>
                <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->



  <!-- ======= Categories Section ======= -->
  <section id="categories" class="categories">
    <div class="container">
      <div class="section-title">
        <h2>Shop by Category</h2>
        <p>Discover our premium collection of sports equipment and apparel</p>
      </div>
      
      <div class="row">
        <!-- Fetch all the categories and use a loop to iterate through categories -->
        <?php 
          $sql = "SELECT * FROM `categories`"; 
          $result = mysqli_query($conn, $sql);
          $counter = 0;
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['categorieId'];
            $cat = $row['categorieName'];
            $desc = $row['categorieDesc'];

            echo '<div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="category-card">
                      <div class="category-image">
                        <img src="img/card-'.$id. '.jpg" alt="'.$cat.'" />
                        <div class="category-overlay">
                          <div class="category-content">
                            <h4>'.$cat.'</h4>
                            <p>'.substr($desc, 0, 50).'...</p>
                            <a href="viewProductList.php?catid=' . $id . '" class="btn-explore">
                              <span>Explore Now</span>
                              <i class="fas fa-arrow-right"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
            $counter++;
          }
        ?>
      </div>
    </div>
  </section><!-- End Categories Section -->









  
    




  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3>Welcome to <strong>Sportware</strong></h3>
            <p><strong>Where every piece of gear tells a story of innovation, performance, and a relentless passion for victory.</strong></p>
            <p class="font-italic">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <div class="skills-content">
              <p><b>Rating: </b></p>
              <div class="progress">
                <span class="skill">5 star <i class="val">93%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">4 star <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">3 star <i class="val">30%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">2 star <i class="val">5%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">1 star <i class="val">0%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">232</span>
              <p><strong>Happy Customers</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
              <span data-toggle="counter-up">121</span>
              <p><strong>Items</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-live-support"></i>
              <span data-toggle="counter-up">1,463</span>
              <p><strong>Hours Of Support</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-users-alt-5"></i>
              <span data-toggle="counter-up">15</span>
              <p><strong>Hard Workers</strong></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

  <?php include 'partials/_footer.php';?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <!-- Cart management script -->
    <script src="assets/js/cart.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 


  </body>
</html>














