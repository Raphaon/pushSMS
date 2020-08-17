<?php
// adding headers links 
include('./Pages/Partials/__head.php');
?>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

  <?php
        // adding headers links 
        include('./Pages/Partials/__header.php');?>    
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2>Rapid Solution<br>to inform your <span>Customers!</span></h2>
          <div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
  
        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/intro-img.svg" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <?php // adding headers links 
            include('./Pages/about.php');
        ?>
    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
        <?php // adding headers links 
            include('./Pages/service.php');
        ?>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
        <?php // adding headers links 
                include('./Pages/why-us.php');
        ?>
    </section>

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Features Section
    ============================-->
    <section id="features">
        <?php // adding headers links 
                include('./Pages/features.php');
        ?>
    </section><!-- #about -->

    <!--==========================
      Portfolio Section
    ============================-->
    <!--section id="portfolio" class="section-bg">
        <?php // adding headers links 
                include('./Pages/portofolio.php');
        ?>
    </section--><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials">
        <?php // adding testimony section
            include('./Pages/testimony.php');
        ?>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team" class="section-bg">
        <?php // adding headers links 
                include('./Pages/ourTeam.php');
        ?>
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
    <?php // adding headers links 
            include('./Pages/ourClient.php');
    ?>
    </section><!-- #clients -->


    <!--==========================
      Pricing Section
    ============================-->
    <section id="pricing" class="wow fadeInUp section-bg">

    <?php // adding headers links 
            include('./Pages/pricing.php');
    ?>
    </section><!-- #pricing -->

    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
    <?php // adding faq section 
            include('./Pages/faq.php');
    ?>
    </section><!-- #faq -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <?php // adding the footer  
            include('./Pages/footer.php');
    ?>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <?php
// adding footers links 
    include('./Pages/Partials/__foot.php');
?>
</body>
</html>
