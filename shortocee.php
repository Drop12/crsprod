<?php
//echo "Service Not Available, Please Contact Admin";
//die();
/*ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); */

session_start();

require_once 'functions.php';

$db = login();
// Define variables and initialize with empty values

// Processing form data when form is submitted
$status = null;

?>
<!DOCTYPE html>



<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" data-style="light">

  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>FCRM</title>


    <meta name="description" content="FCRM" />
    <meta name="keywords" content="FCRM">
    <!-- Canonical SEO -->
    
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet">

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
    
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>


    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>
    <!-- Page CSS -->
    

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!--<script src="assets/vendor/js/template-customizer.js"></script>-->
    
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
  </head>

  <body>

    
    <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    
    




<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <!--<a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
  <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
  <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
</svg>
</span>
      <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
    </a>-->

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
  <?php include_once 'header.php';?>
  
  

</aside>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  

  

  

      
      

      
      
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="ti ti-menu-2 ti-md"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <!-- Search -->
        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <!--<a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                                    <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                                    <span class="d-none d-md-inline-block text-muted fw-normal">Search (Ctrl+/)</span>
                                </a>-->
                            </div>
                        </div>
        <!-- /Search -->
        
        

        

        <ul class="navbar-nav flex-row align-items-center ms-auto">


                            <!-- Language -->
                            <!--<li class="nav-item dropdown-language dropdown">
                                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class='ti ti-language rounded-circle ti-md'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="en" data-text-direction="ltr">
                                            <span>English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr" data-text-direction="ltr">
                                            <span>French</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="ar" data-text-direction="rtl">
                                            <span>Arabic</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="de" data-text-direction="ltr">
                                            <span>German</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
                            <!--/ Language -->

                            <!-- Style Switcher -->
                            <!--<li class="nav-item dropdown-style-switcher dropdown">
                                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class='ti ti-md'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                            <span class="align-middle"><i class='ti ti-sun ti-md me-3'></i>Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                            <span class="align-middle"><i class="ti ti-moon-stars ti-md me-3"></i>Dark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                            <span class="align-middle"><i class="ti ti-device-desktop-analytics ti-md me-3"></i>System</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
                            <!-- / Style Switcher-->

                            <!-- Quick links  -->
                            <!--<li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
                                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class='ti ti-layout-grid-add ti-md'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">Shortcuts</h6>
                                            <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="ti ti-plus text-heading"></i></a>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-calendar ti-26px text-heading"></i>
                                                </span>
                                                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                                <small>Appointments</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-file-dollar ti-26px text-heading"></i>
                                                </span>
                                                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                                <small>Manage Accounts</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-user ti-26px text-heading"></i>
                                                </span>
                                                <a href="app-user-list.html" class="stretched-link">User App</a>
                                                <small>Manage Users</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-users ti-26px text-heading"></i>
                                                </span>
                                                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                                <small>Permission</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-device-desktop-analytics ti-26px text-heading"></i>
                                                </span>
                                                <a href="index.html" class="stretched-link">Dashboard</a>
                                                <small>User Dashboard</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-settings ti-26px text-heading"></i>
                                                </span>
                                                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                                <small>Account Settings</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-help ti-26px text-heading"></i>
                                                </span>
                                                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                                <small>FAQs & Articles</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="ti ti-square ti-26px text-heading"></i>
                                                </span>
                                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                                <small>Useful Popups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>-->
                            <!-- Quick links -->

                            <!-- Notification -->
                            <!--<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <span class="position-relative">
                                        <<i class="ti ti-bell ti-md"></i>
                                        <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">Notification</h6>
                                            <div class="d-flex align-items-center h6 mb-0">
                                                <span class="badge bg-label-primary me-2">8 New</span>
                                                <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened text-heading"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/1.png" alt class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                                                        <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Charles Franklin</h6>
                                                        <small class="mb-1 d-block text-body">Accepted your connection</small>
                                                        <small class="text-muted">12hr ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/2.png" alt class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">New Message ✉️</h6>
                                                        <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-shopping-cart"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Whoo! You have new order 🛒 </h6>
                                                        <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                                                        <small class="text-muted">1 day ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/9.png" alt class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Application has been approved 🚀 </h6>
                                                        <small class="mb-1 d-block text-body">Your ABC project application has been approved.</small>
                                                        <small class="text-muted">2 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-chart-pie"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Monthly report is generated</h6>
                                                        <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                                                        <small class="text-muted">3 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/5.png" alt class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">Send connection request</h6>
                                                        <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                                                        <small class="text-muted">4 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/6.png" alt class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">New message from Jane</h6>
                                                        <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-alert-triangle"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">CPU is running high</h6>
                                                        <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="border-top">
                                        <div class="d-grid p-4">
                                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                                <small class="align-middle">View all notifications</small>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>-->
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="assets/img/logo.png" alt class="rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <img src="assets/img/logo.png" alt class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0"><?php echo $_SESSION['full_name']; ?></h6>
                                                    <small class="text-muted"><?php echo $_SESSION['userrole']; ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1 mx-n2"></div>
                                    </li>
                                    <!--<li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="ti ti-settings me-3 ti-md"></i><span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 ti ti-file-dollar me-3 ti-md"></i><span class="flex-grow-1 align-middle">Billing</span>
                                                <span class="flex-shrink-0 badge bg-danger d-flex align-items-center justify-content-center">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1 mx-n2"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-pricing.html">
                                            <i class="ti ti-currency-dollar me-3 ti-md"></i><span class="align-middle">Pricing</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-faq.html">
                                            <i class="ti ti-question-mark me-3 ti-md"></i><span class="align-middle">FAQ</span>
                                        </a>
                                    </li>-->
                                    <li>
                                        <div class="d-grid px-2 pt-2 pb-1">
                                            <a class="btn btn-sm btn-danger d-flex" href="logout">
                                                <small class="align-middle">Logout</small>
                                                <i class="ti ti-logout ms-2 ti-14px"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->



                        </ul>
      </div>

      
      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="ti ti-x search-toggler cursor-pointer"></i>
      </div>
      
      
  
</nav>

<!-- / Navbar -->

      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
                
            
            </div>
            <br/>
<!-- DataTable with Buttons -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-t-0 header-title">Shortcode Entries</h4>
                            <div class="text-center">
                                <?php if (!empty($rstatus)) : ?>
                                <div class="alert alert-success">

                                    <?php echo $rstatus ?>

                                </div>
                                <?php endif ?>
                            </div>
                            <p class="text-muted font-14 m-b-30">
                            </p>

                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td align="center">S/N</td>
                                        <td align="center">Phone Number</td>
                                        <td align="center">Date</td>
                                        <td align="center">Region</td>
                                        <!--<td align="center">District</td>-->
                                        <td align="center">Ward</td>
                                        <td align="center">What issue would you like to report?</td>
                                        <td align="center">Project Name</td>
                                        <td align="center">Brief Description</td>
                                        <td align="center">Feedback</td>
                                        <td align="center">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $x = 1;
                                  if(isset($_GET['statusflr']))
                                    {
                                        $statusflr=$_GET['statusflr'];
                                        $startdate=$_GET['startdate'];
                                        $enddate=$_GET['enddate'];
                                        $sql_gete = "SELECT * FROM tbl_crs_input_new WHERE `is_proses`='0' and `mkoa`='$statusflr' AND `reg_date` BETWEEN '$startdate' AND '$enddate'ORDER BY reg_date DESC";
                                    }
                                    elseif(isset($_GET['projectfl']))
                                    {
                                        $projectfl=$_GET['projectfl'];
                                        $sql_gete = "SELECT * FROM  tbl_crs_input_new where `is_proses`='0' and  `mradi`='$projectfl' order by reg_date desc";
                                    }
                                    else
                                    {
                                        $sql_gete = "SELECT * FROM  tbl_crs_input_new where `is_proses`='0' and  `maelezo_mafupi`<>'' order by reg_date desc";
                                    }
                                  
                                  $result_set = mysqli_query($db, $sql_gete);
                                  while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {

                                  ?>
                                  <tr>
                                      <td align="center" style="width: 20px;"><?php echo $x; ?></td>
                                      <td align="center" style="width: 50px;"><?php echo $row['msisdn']; ?></td>
                                      <td align="center" style="width: 50px;"><?php echo $row['reg_date']; ?></td>
                                      <td align="center" style="width: 50px;"><?php echo get_region($row['mkoa']); ?></td>
                                      <!--<td align="center" style="width: 50px;"><?php echo $row['wilaya']; ?></td>-->
                                      <td align="center" style="width: 50px;"><?php echo $row['kata_mji']; ?></td>
                                      <td align="center" style="width: 50px;"><?php echo get_swali_lipi($row['swala_lipi']); ?></td>
                                      <td align="center" style="width: 50px;"><?php echo get_project_name($row['mradi']); ?></td>
                                      <td align="center" style="width: 50px;"><?php echo $row['maelezo_mafupi']; ?></td>
                                      <td align="center" style="width: 50px;"><?php echo get_if_feedback($row['mrejesho']); ?></td>
                                      <td align="center" style="width: 50px;">
                                            <div class="col">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleLargeModal<?php echo $row['id']; ?>">Escalate</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleLargeModal<?php echo $row['id']; ?>"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title text-center"
                                                                    style="color:#0D73BB">Kindly Fill The below</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="row g-3" action="insertscript.php" method="GET">
                                                                <div class="col-md-12" hidden>
                                                                        <label for="inputLastName"
                                                                            class="form-label">Text</label>
                                                                            <input type="text" class="form-control"
                                                                            id="inputLastName" name="insertcallregistry"
                                                                            value="<?php echo $row['id']; ?>" readonly>
                                                                    </div>

                                                                    <div class="col-md-12" hidden>
                                                                        <label for="inputLastName"
                                                                            class="form-label">Text</label>
                                                                            <input type="text" class="form-control"
                                                                            id="inputLastName" name="phone_number"
                                                                            value="<?php echo $row['msisdn']; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-md-12" hidden>
                                                                        <label for="inputLastName"
                                                                            class="form-label">Text</label>
                                                                            <input type="text" class="form-control"
                                                                            id="inputLastName" name="tbl_channel"
                                                                            value="<?php echo "shortcode"; ?>" readonly>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Full Name</label>
                                                                            <input type="text" class="form-control"
                                                                            id="inputLastName" name="fullname">
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Sex</label>
                                                                            <select class="form-control show-tick" name="gender" required
                                                                                style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                                <option value="" disabled selected>Please select
                                                                                </option>
                                                                                <option value="Female">Female</option>
                                                                                <option value="Male">Male</option>
                                                                            </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Region</label>
                                                                            <select id="categorySelect" class="form-control show-tick" name="region" required 
                                                                                style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                                <option value="" disabled selected>Please select
                                                                                </option>
                                                                                <?php 
                                                                                 $sql_r = "SELECT * FROM   tbl_region2 where `iss_used`='1' order by reg_date asc";
                                                                                 $result_setr = mysqli_query($db, $sql_r);
                                                                                 while ($rowr = mysqli_fetch_array($result_setr, MYSQLI_ASSOC)) {
                                                                                ?>
                                                                                <option value="<?php echo $rowr['region_id'];?>"><?php echo $rowr['region_name'];?></option>
                                                                                <?php }?>
                                                                            </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" style="margin-top: 20px;">
                                                                        <label for="userSelect" class="form-label">District</label>
                                                                        <select id="userSelect" class="form-control" name="assignedto" style="width: 100%;">
                                                                            <option value="" disabled selected>--Please select--</option>
                                                                        </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Ward/Village</label>
                                                                            <input type="text" class="form-control"
                                                                            id="inputLastName" name="wardvillage" required>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">What issue would you like to report?</label>
                                                                            <select class="form-control show-tick" name="whatissue" required
                                                                                style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                                <option value="" disabled selected>--Please select --
                                                                                </option>
                                                                                <option value="1"><?php echo nl2br(breakStringAfterWords("Feedback on abuse, harassment, exploitation, or violation of work ethics against the organization's project participant and stakeholder"));?></option>
                                                                                <option value="2">Feedback on project implementation </option>
                                                                            </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Project Name</label>
                                                                            <select class="form-control show-tick" name="project" required
                                                                                style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                                <option value="" disabled selected>Please select
                                                                                </option>

                                                                                <?php 
                                                                                 $sql_p = "SELECT * FROM   tbl_crips_product  order by product_name asc";
                                                                                 $result_setp = mysqli_query($db, $sql_p);
                                                                                 while ($rowp = mysqli_fetch_array($result_setp, MYSQLI_ASSOC)) {
                                                                                ?>
                                                                                <option value="<?php echo $rowp['id'];?>"><?php echo $rowp['product_name'];?></option>
                                                                                <?php }?>
                                                                            </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">REQUIRE FEEDBACK?</label>
                                                                            <select class="form-control show-tick" name="requirefeedback" required
                                                                                style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                                <option value="" disabled selected>Please select
                                                                                </option>
                                                                                <option value="Yes">Yes</option>
                                                                                <option value="No">No</option>
                                                                            </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Select Priority</label>
                                                                            <select class="form-control show-tick" name="priority" required
                                                                                style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                                <option value="" disabled selected>--Please select --
                                                                                </option>
                                                                                <option value="High">High</option>
                                                                                <option value="Medium">Medium</option>
                                                                                <option value="Low">Low</option>
                                                                            </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-6">
                                                                        <label for="inputLastName" class="form-label">Select Category</label>
                                                                        <select id="categorySelectttyyp" class="form-control show-tick" name="category" required
                                                                            style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                            <option value="" disabled selected>--Please select --</option>
                                                                            <option value="sensitive">Sensitive</option>
                                                                            <option value="programmatic">Programatic</option>
                                                                            <option value="outofscope">Out of Scope</option>
                                                                        </select>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-md-12" >
                                                                        <label for="inputLastName"
                                                                            class="form-label">Details</label>
                                                                            <textarea class="form-control" id="nmessage" name="nmessage"
                                                                            maxlength="200" required></textarea>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="col-12 text-center">
                                                                        <button type="submit"
                                                                            class="btn btn-primary px-5"
                                                                            style="background-color: #0D73BB">Save</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                  </tr>
                                  <?php 
                                      $x++;
                                  } 
                                  ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<!--/ DataTable with Buttons -->

<hr class="my-12">

<!-- Complex Headers -->

<!--/ Multilingual -->


          </div>
          <!-- / Content -->

          
          

<!-- Footer -->

<!-- / Footer -->

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
  </div>
  <!-- / Layout wrapper -->

    
   
    

    

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

    <script>
  document.getElementById('categorySelect').addEventListener('change', function() {
    var category = this.value;

    if (category) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get_users.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var userSelect = document.getElementById('userSelect');
                userSelect.innerHTML = xhr.responseText;
            }
        };
        
        xhr.send('category=' + encodeURIComponent(category));
    }
});
</script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<!-- Flat Picker -->
<script src="assets/vendor/libs/moment/moment.js"></script>
<script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
<!-- Form Validation -->
<script src="assets/vendor/libs/@form-validation/popular.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script src="assets/js/tables-datatables-basic.js"></script>
    
  </body>

</html>

<!-- beautify ignore:end -->