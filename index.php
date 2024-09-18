<?php
//echo "Service Not Available, Please Contact Admin";
//die();
/*ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); */

session_start();

require_once 'functions.php';

// Define variables and initialize with empty values

// Processing form data when form is submitted
$status = null;

if (isset($_GET['username'])) {
    
    $db = login();
    $myusername = mysqli_real_escape_string($db, $_GET['username']);
    $mypassword = mysqli_real_escape_string($db, $_GET['password']);
    $mypassword = SHA1($mypassword);
    
    $sql = "SELECT * FROM 	tbl_credentials WHERE 	`username` = '$myusername' and `password` = '$mypassword' and `status`='1'";
    //echo $sql;
    //die();
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user_id = $row['user_id'];
    $userrole = $row['userrole'];
    $full_name = $row['full_name'];
    $off_role = $row['off_role'];

    //echo $addrole;
    //die();

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {

        //session_start();
        //session_register("myusername");
        $_SESSION['user_id'] = $user_id;
        $_SESSION['userrole'] = $userrole;
        $_SESSION['full_name'] = $full_name;
        $_SESSION['off_role'] = $off_role;


        if ($userrole == "crsadmin") {
            header("location: adminhome.php");
        }
        else
        {
            header("location: useradminhome.php");
        }
    } else {

        $status = "Invalid email and password combination!";
    }
}
?>


<!DOCTYPE html>

<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" data-style="light">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Catholic Relief Services</title>

    
    <meta name="description" content="Catholic Relief Services" />
    <meta name="keywords" content="Catholic Relief Services">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://mbeyalishe.or.tz/callcenter/">
    
    
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    
    <link rel="stylesheet" href="assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" /> 
    <!-- Vendor -->
<link rel="stylesheet" href="assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
  </head>

  <body>

    
    <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>-->
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <!-- /Logo -->
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-8 p-0">
      <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center" style="width: 100%;height: 100vh;background-image: url('assets/img/call1.jpg');background-size: cover;background-position: center;background-repeat: no-repeat;background-attachment: fixed;">
        
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
      <div class="w-px-400 mx-auto mt-12 pt-5">
        <h4 class="mb-1 text-center"><img src="assets/img/logo.png" alt="Logo" class="logo-image" style="width:350px;margin-bottom:10px;"></h4>
        <p class="mb-6">Please sign-in to your account</p>

        <form id="formAuthentication" class="mb-6" action="index.php" method="GET">
          <div class="mb-6">
            <label for="email" class="form-label">Email or Username</label>
            <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus>
          </div>
          <div class="mb-6 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
          <div class="my-8">
            <!--<div class="d-flex justify-content-between">
              <div class="form-check mb-0 ms-2">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
              <a href="auth-forgot-password-cover.html">
                <p class="mb-0">Forgot Password?</p>
              </a>
            </div>-->
          </div>
          <button class="btn btn-primary d-grid w-100">
            Sign in
          </button>
        </form>

        <!--<p class="text-center">
          <span>New on our platform?</span>
          <a href="auth-register-cover.html">
            <span>Create an account</span>
          </a>
        </p>-->

        <div class="divider my-6">
          <div class="divider-text"></div>
        </div>

        <!--<div class="d-flex justify-content-center">
          <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5">
            <i class="tf-icons ti ti-brand-facebook-filled"></i>
          </a>

          <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5">
            <i class="tf-icons ti ti-brand-twitter-filled"></i>
          </a>

          <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5">
            <i class="tf-icons ti ti-brand-github-filled"></i>
          </a>

          <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus">
            <i class="tf-icons ti ti-brand-google-filled"></i>
          </a>
        </div>-->
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->

    
    <!--<div class="buy-now">
      <a href="https://1.envato.market/vuexy_admin" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
    </div>-->
    

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
      <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/@form-validation/popular.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script src="assets/js/pages-auth.js"></script>
    
  </body>

</html>

<!-- beautify ignore:end -->