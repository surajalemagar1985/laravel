<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flattern - v3.0.0
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex justify-content-between">
      <div class="contact-info">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        @guest('myweb')
        <a href="#staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</a>
        <a href="#staticBackdropData" data-bs-toggle="modal" data-bs-target="#staticBackdropData">Signup</a>
        @endguest
        @auth('myweb')
        <a href="{{route('userprofile',Auth::guard('myweb')->user()->id)}}">{{Auth::guard('myweb')->user()->user_name}}</a>
       <a href="{{route('userlogout')}}">Logout</a>
        @endauth
      </div>
    </div>

<!-- Modal signin-->
<div class="modal  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       @if(Session::has('error'))
        <div class="alert alert-danger">
          {{Session::get('error')}}
        </div>
        @endif
      <div class="modal-body">
        <form action="{{route('userlogincheck')}}" method="post">
          @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" name="remember" value="remember" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <!-- <button type="button" class="btn btn-success">login</button> -->
  <input type="submit" name="login" value="login" class="btn btn-success">
</form>
      
      </div>
    </div>
  </div>
</div>
 <!-- modal signup -->
<div class="modal fade" id="staticBackdropData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">SignUp Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
       @if(Session::has('msg'))
        <div class="alert alert-success">
          {{Session::get('msg')}}
        </div>
        @endif
      <div class="modal-body">
        <form action="{{route('userstore')}}" method="post">
          @csrf
          <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     @if($errors->has('fname'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('fname')}}</strong>
                        </div>
                        @endif
    <!-- <div id="emailHelp" class="form-text">We'll never share your details with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
     @if($errors->has('email'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('email')}}</strong>
                        </div>
                        @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Gender</label> &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="male">Male &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="Female">Female &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="Others">Others
     @if($errors->has('gender'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('gender')}}</strong>
                        </div>
                        @endif

    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
     @if($errors->has('pass'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('pass')}}</strong>
                        </div>
                        @endif
  </div>
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name="pass_confirmation" class="form-control" id="exampleInputPassword1">

  </div>
  <!-- <button type="button" class="btn btn-primary">Register</button> -->
  <input type="submit" name="submit" value="save" class="btn btn-primary" id="submitdata">
    
</form>
      
      </div>
    </div>
  </div>
</div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{route('index')}}">Ecommerce</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{Request::is('/','index')?'active':''}}"><a href="{{route('index')}}">Home</a></li>
          <li class="{{Request::is('/about','about')?'active':''}}"><a href="{{route('about')}}">About</a></li>
          <li class="{{Request::is('/services','services')?'active':''}}"><a href="{{route('services')}}">Services</a></li>
          <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
          <li class="{{Request::is('/testimonial','testimonial')?'active':''}} drop-down"><a>Category</a>
          <!-- <li><a href="pricing.html">Pricing</a></li> -->
          <!-- <li><a href="blog.html">Blog</a></li> -->
        
            <ul>
              @foreach($showcategory as $c)
              <li><a href="{{route('productbycategory',$c->id)}}">{{$c->category_name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="{{Request::is('/contact','contact')?'active':''}}"><a href="{{route('contact')}}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

 @yield('content-section')


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Flattern</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Flattern</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('user/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('user/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('user/assets/js/main.js')}}"></script>
  @if(Session::has('msg'))
  <script type="text/javascript">
    $(function(){
      $('#staticBackdropData').modal("show");
    })

  </script>
  @endif

 @if(Session::has('errors'))
  <script type="text/javascript">
    $(function(){
      $('#staticBackdropData').modal("show");
    })

  </script>
  @endif

   @if(Session::has('error'))
  <script type="text/javascript">
    $(function(){
      $('#staticBackdrop').modal("show");
    })

  </script>
  @endif


   @if(Session::has('message'))
  <script type="text/javascript">
    $(function(){
      $('#staticBackdropProfile').modal("show");
    })

  </script>
  @endif
  @if(Session::has('errors'))
  <script type="text/javascript">
    $(function(){
      $('#staticBackdropProfile').modal("show");
    })

  </script>
  @endif
</body>

</html>