<!-- adding the header -->
@include('Home.Pages.Partials.__head')


<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    @include('Home.Pages.Partials.__header')
  
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
          <a href="{{ route('register') }}" class="btn-get-started scrollto">Get Started</a>
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
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      @include('Home.Pages.service')
   </section><!-- #services -->


   
    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      @include('Home.Pages.why-us')
   </section>



    <!--==========================
      Pricing Section
    ============================-->
    <section id="pricing" class="wow fadeInUp section-bg">
      @include('Home.Pages.pricing')
  </section><!-- #pricing -->





    
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        @include('Home.Pages.about')
    </section><!-- #about -->


    


    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text">For we have the best customer relation manager and we are amoung the best plateforme of bulk sms in cameroon we accompagne compagny in their dream to reach out customer and stay near of them </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Command your plan</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Features Section
    ============================-->
    <section id="features">
        @include('Home.Pages.features')
    </section><!-- #about -->

    <!--==========================
      Portfolio Section
    ============================-->
    <!--section id="portfolio" class="section-bg">
       @include('Home.Pages.portofolio')
    </section--><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials">
        @include('Home.Pages.testimony')
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team" class="section-bg">
       @include('Home.Pages.ourTeam')
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
    @include('Home.Pages.ourClient')
    </section><!-- #clients -->


   
    <!--==========================
      Frequently Asked Questions Section
    ============================>
    <section id="faq">
        //@include('Home.Pages.faq')
    </section>< #faq -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    @include('Home.Pages.footer')
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  @include('Home.Pages.Partials.__foot')
</body>
</html>
