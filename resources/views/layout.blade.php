<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <!-- Owl Carousel Theme Default CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
        <!-- Box Icon CSS-->
        <link rel="stylesheet" href="{{asset('assets/css/boxicon.min.css')}}">
        <!-- Flaticon CSS-->
        <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/flaticon.css')}}">
        <!-- Magnific CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <!-- Title CSS -->
        <title>Jovie - Remote Hiring & Online Job Portal HTML Template</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">  
        <link href="{{asset('assets/bootstrap/bootstrap.min.css')}}">
        <style>
   .backend{
            box-shadow: 0 10px 30px rgb(0 0 0 / 7%);
            padding: 50px;
            padding-top: 50px;
            padding-right: 50px;
            padding-bottom: 50px;
            padding-left: 50px;
            border-radius: 30px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        </style>
    </head>

    <body>
        
        <!-- Pre-loader Start -->
		{{-- <div class="loader-content">
            <div class="d-table">
                <div class="d-table-cell">
					<div class="sk-circle">
						<div class="sk-circle1 sk-child"></div>
						<div class="sk-circle2 sk-child"></div>
						<div class="sk-circle3 sk-child"></div>
						<div class="sk-circle4 sk-child"></div>
						<div class="sk-circle5 sk-child"></div>
						<div class="sk-circle6 sk-child"></div>
						<div class="sk-circle7 sk-child"></div>
						<div class="sk-circle8 sk-child"></div>
						<div class="sk-circle9 sk-child"></div>
						<div class="sk-circle10 sk-child"></div>
						<div class="sk-circle11 sk-child"></div>
						<div class="sk-circle12 sk-child"></div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- Pre-loader End -->

        <!-- Navbar Area Start -->
        <div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                </a>
            </div>
        
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="/" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/settings" class="nav-link">Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Jobs</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="addJob" class="nav-link">Post A Job</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="job-list.html" class="nav-link">Job List</a>
                                        </li>
                                    </ul>
                                </li>     
                                <li class="nav-item">
                                    <a href="/candidacies" class="nav-link">Find Job</a>
                                </li>           
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Settings</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="candidate.html" class="nav-link">Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="candidate-details.html" class="nav-link">Candidates Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" class="nav-link">Contact Us</a>
                                </li>
                            </ul>

                            <div class="other-option">
                                @php
                                  if(!session()->get('i')){
                                    echo '<a href="sign-up.html" class="signup-btn">Sign-in</a>';
                                  }  
                                @endphp
                                
                                <a href="/disconnect" class="signin-btn">Sign out</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
         @yield('content')
             
        <footer class="footer-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                </a>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore et dolore magna. 
                                Sed eiusmod tempor incididunt ut.</p>

                            <div class="footer-social">
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                                <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget pl-60">
                            <h3>For Candidate</h3>
                            <ul>
                                <li>
                                    <a href="job-grid.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Browse Jobs
                                    </a>
                                </li>
                                <li>
                                    <a href="account.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Account
                                    </a>
                                </li>
                                <li>
                                    <a href="catagories.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Browse Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="resume.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Resume
                                    </a>
                                </li>
                                <li>
                                    <a href="job-list.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Job List
                                    </a>
                                </li>
                                <li>
                                    <a href="sign-up.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Sign Up
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget pl-60">
                            <h3>Quick Links</h3>
                            <ul>
                                <li>
                                    <a href="index.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="about.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Job
                                    </a>
                                </li>
                                <li>
                                    <a href="pricing.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Add Job
                                    </a>
                                </li>
                                <li>
                                    <a href="privacy.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class='bx bx-chevrons-right bx-tada'></i>
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget footer-info">
                            <h3>Information</h3>
                            <ul>
                                <li>
                                    <span>
                                        <i class='bx bxs-phone'></i>
                                        Phone:
                                    </span>
                                    <a href="tel:882569756">
                                        +101 984 754
                                    </a>
                                </li>

                                <li>
                                    <span>
                                        <i class='bx bxs-envelope'></i>
                                        Email:
                                    </span>
                                    <a href="mailto:info@jovie.com">
                                        info@jovie.com
                                    </a>
                                </li>

                                <li>
                                    <span>
                                        <i class='bx bx-location-plus'></i>
                                        Address:
                                    </span>
                                    123, Denver, USA
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <div class="copyright-text text-center">
            <p>Copyright @2022 Jovie. All Rights Reserved By <a href="https://hibootstrap.com/" target="_blank">HiBootstrp.com</a></p>
        </div>
        <!-- Footer Section End -->

        <!-- Back To Top Start -->
        <div class="top-btn">
            <i class='bx bx-chevrons-up bx-fade-up'></i>
        </div>
        <!-- Back To Top End -->
    
    
    
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('assets/js/jquery-3.5.0.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Nice Select JS -->
        <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
        <!-- Magnific Popup JS -->
        <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Subscriber Form JS -->
        <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- Form Velidation JS -->
        <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
        <!-- Contact Form -->
        <script src="{{asset('assets/js/contact-form-script.js')}}"></script>
        <!-- Meanmenu JS -->
        <script src="{{asset('assets/js/meanmenu.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{asset('assets/js/custom.js')}}"></script>

        <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
    
    </body>
</html>