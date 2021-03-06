<div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          <a href="{{ route('login')}}" class="user"> <i class="fa fa-user-circle"> Login</i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>PUSHSMS</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Acceuil</a></li>
          <li><a href="#whatispush">C'est Quoi ?</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#why-us">Why us?</a></li>
          <!--li><a href="#portfolio">Portfolio</a></li-->
          <li><a href="#pricing">Tarif</a></li>
          <!--li><a href="#team">Equipe</a></li-->
          <li class="drop-down"><a href="">Documentation</a>
            <ul>
              <li><a href="#">API</a></li>
              <!--li class="drop-down"><a href="#">API</a>
                <ul>
                  <li><a href="#">API</a></li>
                  <li><a href="#">Manuel</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li-->
              <li><a href="#">Guide utilisateur</a></li>
              <!--li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li-->
            </ul>
          </li>
          <li><a href="#footer">Nous Contacter</a></li>
          <li><a href="{{ route('login')}}" ><i class="fa fa-user-circle"> Login</i></a></li>
          
        </ul>
      </nav><!-- .main-nav -->
      
    </div>