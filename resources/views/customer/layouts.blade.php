<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bachelors Kitchen">
    <meta name="author" content="LRB INFO TECH">
    <title>Bachelors Kitchen</title>

    <!-- Favicons-->
    <!-- <link rel="shortcut icon" href="/web_assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/web_assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/web_assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/web_assets/img/apple-touch-icon-144x144-precomposed.png"> -->

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/web_assets/css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="/web_assets/css/style.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/web_assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">
    @yield('extra-css')
</head>

<body>
        
<header class="header_in clearfix">
      <div class="container">
          <div id="logo">
              <a href="/">
                  <img src="/web_assets/img/bk_logo.png" width="90" height="90" alt="">
              </a>
          </div>
          <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
          <ul id="top_menu">
              <!-- <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
              <li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li> -->
          </ul>
          @if(!empty(Auth::user()->email))
          <ul id="top_menu" class="drop_user">
                <li>
                    <div class="dropdown user clearfix">
                        <a href="#" data-toggle="dropdown">
                            <figure>
                                <img src="/web_assets/img/avatar1.jpg" alt="">
                            </figure>
                            <span>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-content">
                                <ul>
                                    <li><a href="/customer/dashboard"><i class="icon_cog"></i>Dashboard</a></li>

                                    <li><a href="/customer/booking"><i class="icon_document"></i>My Orders</a></li>

                                    <li><a href="/customer/available-coupon"><i class="icon_document"></i>Available Coupon</a></li>

                                    <li><a href="/customer/view-profile"><i class="icon_document"></i>View Profile</a></li>

                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="icon_key"></i>Log out</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                  </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @endif
            <!-- /top_menu -->
          <!-- /top_menu -->
          <a href="#0" class="open_close">
              <i class="icon_menu"></i><span>Menu</span>
          </a>
          <nav class="main-menu">
                <div id="header_menu">
                    <a href="#0" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="/"><img src="/web_assets/img/bk_logo.png" width="100" height="100" alt=""></a>
                </div>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <!-- <li class="submenu">
                        <a href="#0" class="show-submenu">Services</a>
                        <ul>
                            <li><a href="index.html">Meals Plan</a></li>
                            <li><a href="index-2.html">Corporate Plan</a></li>
                            <li><a href="index-3.html">Bulk Orders</a></li>
                           
                        </ul>
                    </li> -->

                    <li class="submenu">
                        <a href="#0" class="show-submenu">Menus</a>
                        <ul>
                            <li><a href="/item-list/16">Basic Meals Plan</a></li>
                            <li><a href="/item-list/17">Diet Plan</a></li>
                            <li><a href="/item-list/18">Weight Gain Meals Plan</a></li>
                            <li><a href="/item-list/19">Pro Meals Plan</a></li>
                        </ul>
                    </li>
              
                  <li><a href="/contact">Contact Us</a></li>
                  @if(empty(Auth::user()->email))
                  <li><a href="/login">Login</a></li>
                  <li><a href="/customer-register">Register</a></li>
                  @endif
                </ul>
            </nav>
      </div>
  </header>
  <!-- /header -->

    @yield('content')

  <footer>
    <div class="wave footer"></div>
    <div class="container margin_60_40 fix_mobile">

      <div class="row">
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_1">Quick Links</h3>
          <div class="collapse dont-collapse-sm links" id="collapse_1">
            <ul>
              <li><a href="/home">Home</a></li>
              <li><a href="/about">About Us</a></li>
              <li><a href="/contact">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_2">Categories</h3>
          <div class="collapse dont-collapse-sm links" id="collapse_2">
            <ul>
              <li><a href="/item-list/16">Basic Meals Plan</a></li>
              <li><a href="/item-list/17">Diet Plan</a></li>
              <li><a href="/item-list/18">Weight Gain Meals Plan</a></li>
              <li><a href="/item-list/19">Pro Meals Plan</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <h3 data-target="#collapse_3">Contact Us</h3>
          <div class="collapse dont-collapse-sm contacts" id="collapse_3">
            <ul>
              <li><i class="icon_house_alt"></i>97845 Baker st. 567<br>Los Angeles - US</li>
              <li><i class="icon_mobile"></i>+94 423-23-221</li>
              <li><i class="icon_mail_alt"></i><a href="#0">info@domain.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <h3 data-target="#collapse_4">Keep in touch</h3>
          <div class="collapse dont-collapse-sm" id="collapse_4">
            <div id="newsletter">
              <div id="message-newsletter"></div>
              <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                <div class="form-group">
                  <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                  <button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
                </div>
              </form>
            </div>
            <div class="follow_us">
              <h5>Follow Us</h5>
              <ul>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/web_assets/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/web_assets/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/web_assets/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/web_assets/img/youtube_icon.svg" alt="" class="lazy"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /row-->
      <hr>
      <div class="row add_bottom_25">
        <div class="col-lg-6">
          <ul class="footer-selector clearfix">
            <li>
              <div class="styled-select lang-selector">
                <select>
                  <option value="English" selected>English</option>
                </select>
              </div>
            </li>
            <li>
              <div class="styled-select currency-selector">
                <select>
                  <option value="AED" selected>AED</option>
                </select>
              </div>
            </li>
            <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/web_assets/img/cards_all.svg" alt="" width="230" height="35" class="lazy"></li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="additional_links">
            <li><a href="#0">Terms and conditions</a></li>
            <li><a href="#0">Privacy</a></li>
            <li><span>© Bachelor Kitchen</span></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!--/footer-->

  <div id="toTop"></div><!-- Back to top button -->
  
<!-- Sign In Modal -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="modal_header">
        <h3>Sign In</h3>
    </div>
    <form>
        <div class="sign-in-wrapper">
            <a href="#0" class="social_bt facebook">Login with Facebook</a>
            <a href="#0" class="social_bt google">Login with Google</a>
            <div class="divider"><span>Or</span></div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <label class="container_check">Remember me
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <div class="text-center">
                <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                Don’t have an account? <a href="account.html">Sign up</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>Please confirm login email below</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
            </div>
        </div>
    </form>
    <!--form -->
</div>
<!-- /Sign In Modal -->

<!-- COMMON SCRIPTS -->
<script src="/web_assets/js/common_scripts.min.js"></script>
<script src="/web_assets/js/common_func.js"></script>
<script src="{{ asset('toastr/toastr.min.js')}}" type="text/javascript"></script>
<!-- <script src="/web_assets/assets/validate.js"></script> -->
@yield('extra-js')
</body>
</html>