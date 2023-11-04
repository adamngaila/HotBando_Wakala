<!DOCTYPE html>
<html lang="en">
<!--?php require '/PHPMailer/src/';?-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Black Science Technologies Ltd</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">Black Science Technologies</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Get Started</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>         
          <li><a class="nav-link scrollto" href="#connect">Connect</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>BST</span></h2>
          <p class="animate__animated fanimate__adeInUp">The company was first discovered 2014 as the name suggests Black this simply states the black colour of Africans SCIENCE is the study of Existence and ENTREPRENEURS.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">HotBando</h2>
          <p class="animate__animated animate__fadeInUp">HotBando is a service from blacksciece technologies that relies on providing unlimited internet service in markets, buildings, businesses and hostels.</p>
          <a href="{{ route('login') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Connect</a>
        </div>
      </div>

      <!-- Slide 3 
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div-->

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>About</h2>
          <p>Who we are</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
              Welcome to Black Science Technologies
              We are a tech company based in Mbezi-Dar es Salaam, Tanzania, founded in 2016 by Augustino Chami, Mussa Mabari, and Dustan Mbaga. Our mission is to provide reliable unlimited internet service to underserved populations.
              Introducing the Hot Bando Project              
              Our flagship initiative, the Hot Bando Project, aims to bring unlimited WiFi internet, called Hot Bando, to underserved communities in Tanzania and Africa. We focus on areas such as hostels, marketplaces, homes, and recreational places where internet access is limited. By bridging the digital divide, we believe in empowering these communities for education, economic growth, and social development.
              Innovative Technologies for Everyone              
              At Black Science Technologies, we believe in bringing innovative technologies close to people. While we started as a software company, we have recently expanded into the solar energy sector. This expansion complements the Hot Bando Project by utilizing solar power to ensure a reliable and sustainable internet infrastructure in remote areas.
            </p>

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Our Commitment and Achievements              
              Since our establishment, we have made significant strides in the tech industry. We have formed valuable partnerships and received recognition for our efforts in bridging the digital divide. Our commitment is to continue innovating and expanding our reach to connect more underserved communities.
              Building a Bright Future              
              Looking ahead, we envision expanding our services and reaching even more underserved communities in Tanzania and beyond. We have exciting projects in the pipeline and are dedicated to making a lasting impact through technology and connectivity.
              Get in Touch
              To learn more about our services, partnerships, or to collaborate with us, please feel free to contact us at [contact details]. Stay updated with our latest news and initiatives by following us on [social media platforms].
            </p>
            <a href="#features" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3" data-aos="zoom-in">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <i class="ri-fire-line"></i>
              <h4 class="d-none d-lg-block">HotBando</h4>
            </a>
          </li>
          <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <i class="ri-newspaper-line"></i>
              <h4 class="d-none d-lg-block">Mauzosheet</h4>
            </a>
          </li>
          <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
              <i class="ri-sun-line"></i>
              <h4 class="d-none d-lg-block">Etricia</h4>
            </a>
          </li>
          <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
              <i class="ri-book-line"></i>
              <h4 class="d-none d-lg-block">Loanpage</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content" data-aos="fade-up">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Black science technologies   </h3>
                <p class="fst-italic">
                  is a tech company we primarily started dealing with software 
                  and we built.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> <a href="https://www.mauzosheet.com/">MauzoSheet an online point of sale software for businesses</a></li>
                  <li><i class="ri-check-double-line"></i><a href="https://www.loanpage.co.tz/">Loanpage a loan management software for microfinances</a></li>
                  <li><i class="ri-check-double-line"></i><a href="https://www.etriciatz.com/">Ectricia a smart solar generator.</a></li>
                </ul>
                <p>
                  Recently been involved with building smart hardware’s but in energy 
                  sector we developed a smart solar generator! www.etriciatz.com  which will power 
                  all our Wi-Fi centers named (HOTBANDO).
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-1.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Features Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-out">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>HotBando</h3>
            <p>Is an extraordinary service from Black Science Technologies Ltd that passionately and relentlessly delivers unlimited,
               blazing-fast internet connectivity to markets, buildings, businesses, and hostels.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#contact">Call Us Now</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Our internet</h2>
          <p>What you can do.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>          
          <li data-filter=".filter-web">Web</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>       

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Pricing</h2>
          <p>Our Competing Prices</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box" data-aos="zoom-in">
              <h3>Bundle 1</h3>
              <h4><sup>Tsh</sup>500/=<span> / 6 Hrs</span></h4>
              <ul>
                <li>Unlimited</li>
                <li>Shared</li>
                <li>Prepaid</li>
                <li>2 mbps</li>
              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Pay Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
              <h3>Bundle 2</h3>
              <h4><sup>Tsh</sup>1,000/=<span> / 24 Hrs</span></h4>
              <ul>
                <li>Unlimited</li>
                <li>Shared</li>
                <li>Prepaid</li>
                <li>2 mbps</li>                
              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Pay Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <h3>Bundle 3</h3>
              <h4><sup>Tsh</sup>45,000/=<span> /  1 month</span></h4>
              <ul>
                <li>Unlimited</li>
                <li>Dedicated</li>
                <li>Post Paid</li>
                <li>5 mbps</li>

              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Pay Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span class="advanced">Advanced</span>
              <h3>Bundle 4</h3>
              <h4><sup>Tsh</sup>60,000/=<span> /  1 month</span></h4>
              <ul>
                <li>Unlimited</li>
                <li>Dedicated</li>
                <li>Post Paid</li>
                <li>10 mbps</li>
              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Pay Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->


    <!-- ======= Contact Section ======= -->
    <section id="connect" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Contact</h2>
          <p>Connect</p>
        </div>

        <div class="row mt-5">
          <h2>Contact Us</h2>

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Mbezi, Kimara.</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>tino.chami@gmail.com</p></br>
                <p>adamngaila@gmail.com</p></br>
                <p>ambary_06@live.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+255 676 169 114</p></br>
                <p>+255 686 036 401</p>
                <p>+255 765 598 824</p>
              </div>

            </div>

          </div>
 
          <div class="section-title col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
            
              
  

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Black Science</h3>
      <p>Technologies Ltd</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/100065021530217/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Black Science Technologies Ltd</span></strong>. All Rights Reserved
      </div>
      <div class="credits">       
        Designed by <a href="https://mauzosheet.com/">Black Science Technologies Ltd</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="PHPMailer/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>