<?php
session_start();
require_once 'functions.php';
$db = login();


?>
<!DOCTYPE html>



<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>FCRM</title>


    <meta name="description" content="FCRM" />
    <meta name="keywords" content="FCRM">
    <!-- Canonical SEO -->



    <!-- End Google Tag Manager -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />

    <!-- Fonts -->

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Number Of Members'],
            ['Male', 535],
            ['Female', 660],
        ]);

        var options = {
            title: 'Member Ratio By Gender',
            height: 400,
            colors: ['#404042', '#de1f26'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>


    <script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Zones", "Registered Members", {
                role: "style"
            }],
            ["Western", 34, "#2babe3"],
            ["Central", 52, "#ebffab"],
            ["Coast A", 203, "#de1f26"],
            ["Lake", , "#404042"],
            ["Northern", 194, "#ebffab"],
            ["Southern", 277, "#de1f26"],
            ["Coast B ", 189, "#404042"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Registered Members Per Zone",
            height: 400,
            bar: {
                groupWidth: "80%"
            },
            legend: {
                position: "none"
            },
            is3D: true,
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>
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
    <!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>-->
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
      <span class="app-brand-text demo menu-text fw-bold">CRS</span>
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

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">











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
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
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
                                                    <small
                                                        class="text-muted"><?php echo $_SESSION['off_role']; ?></small>
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
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search...">
                        <i class="ti ti-x search-toggler cursor-pointer"></i>
                    </div>



                </nav>

                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row g-6">
                            <!-- Statistics -->
                            <!--<div class="col-lg-8 col-md-12">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title mb-0">Statistics</h5>
                      <small class="text-muted">Updated 1 month ago</small>
                    </div>
                    <div class="card-body">
                      <div class="row gy-3">
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div
                              class="badge rounded bg-label-primary me-4 p-2"
                            >
                              <i class="ti ti-chart-pie-2 ti-lg"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">230k</h5>
                              <small>Sales</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded bg-label-info me-4 p-2">
                              <i class="ti ti-users ti-lg"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">8.549k</h5>
                              <small>Customers</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded bg-label-danger me-4 p-2">
                              <i class="ti ti-shopping-cart ti-lg"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">1.423k</h5>
                              <small>Products</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div
                              class="badge rounded bg-label-success me-4 p-2"
                            >
                              <i class="ti ti-currency-dollar ti-lg"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">$9745</h5>
                              <small>Revenue</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>-->

                            <!-- Orders -->


                            <!--/ Card Border Shadow -->

                            <!-- Cards with few info -->

                            <div class="col-xl-3 col-sm-6" style="height:250px; width: 300px;">
                                <div class="card h-100">
                                    <div class="card-header text-center">
                                        <p class="mb-0 text-body">Total Entries</p>
                                        <h4 class="card-title mb-1"><?php echo 87;//get_total_rentries($db);?></h4>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div class="row w-100">
                                            <div class="col-6 text-center">
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="badge bg-label-info p-1 rounded"
                                                        style="font-size: 3rem;">
                                                        <!-- Increased icon size -->
                                                        <i class="ti ti-mail" style="font-size: 3rem;"></i>
                                                        <!-- Increased icon size -->
                                                    </span>
                                                    <p class="mb-0">Short code</p>
                                                    <h5 class="mb-0 pt-1">
                                                        <?php echo 54;//get_total_rentries_channel($db,"ivr");?></h5>
                                                </div>
                                            </div>
                                            <div class="col-6 text-center">
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="badge bg-label-primary p-1 rounded"
                                                        style="font-size: 3rem;">
                                                        <!-- Increased icon size -->
                                                        <i class="ti ti-headphones" style="font-size: 3rem;"></i>
                                                        <!-- Increased icon size -->
                                                    </span>
                                                    <p class="mb-0">IVR</p>
                                                    <h5 class="mb-0 pt-1">
                                                        <?php echo 33;//get_total_rentries_channel($db,"shortcode");?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="col-lg-2 col-md-6">
                                <div class="mt-4">
                                    <!-- Button trigger modal -->
                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modalCenteryear"
                                        style="height: 100px;width:100%;background-color:#06358a;">
                                        Year
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCenteryear" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Filter Data By Year
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start of the form -->
                                                    <form action="adminhome" method="post">
                                                        <div class="row">
                                                            <div class="col mb-4">
                                                                <label for="nameWithTitle"
                                                                    class="form-label">Year</label>
                                                                <input type="text" id="nameWithTitle" name="year"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                    </form> <!-- End of the form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="mt-4">
                                    <!-- Button trigger modal -->

                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modalCenterquater"
                                        style="height: 100px;width:100%;background-color:#06358a;">
                                        Quarter
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCenterquater" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Filter Data Quarterly</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start of the form -->
                                                    <form action="adminhome" method="post">
                                                        <div class="row">
                                                            <div class="col mb-4">
                                                                <label for="nameWithTitle" class="form-label">Year</label>
                                                                <input type="text" id="nameWithTitle" name="year" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-top:14px;">
                                                            <label class="col-2 col-form-label">Select Quarter:</label>
                                                            <div class="col-10">
                                                                <select class="form-control show-tick" name="quarter" required
                                                                    style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                    <option value="" disabled selected>--Please select --</option>
                                                                    <option value="first_quarter">First Quarter</option>
                                                                    <option value="second_quarter">Second Quarter</option>
                                                                    <option value="third_quarter">Third Quarter</option>
                                                                    <option value="fourth_quarter">Fourth Quarter</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                    </form> <!-- End of the form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="mt-4">
                                    <!-- Button trigger modal -->

                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modalCentermonth"
                                        style="height: 100px;width:100%;background-color:#06358a;">
                                        Month
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCentermonth" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Search By Month</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start of the form -->
                                                    <form action="adminhome" method="post">
                                                        <div class="row">
                                                            <div class="col mb-4">
                                                                <label for="nameWithTitle" class="form-label">Year</label>
                                                                <input type="text" id="nameWithTitle" name="year" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-top:14px;">
                                                            <label class="col-2 col-form-label">Month:</label>
                                                            <div class="col-10">
                                                                <select class="form-control show-tick" name="month" required
                                                                    style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                    <option value="" disabled selected>--Please select --</option>
                                                                    <option value="01">January</option>
                                                                    <option value="02">February</option>
                                                                    <option value="03">March</option>
                                                                    <option value="04">April</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">June</option>
                                                                    <option value="07">July</option>
                                                                    <option value="08">August</option>
                                                                    <option value="09">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                    </form> <!-- End of the form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="mt-4">
                                    <!-- Button trigger modal -->

                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modalCenteregion"
                                        style="height: 100px;width:100%;background-color:#06358a;">
                                        Region
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCenteregion" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Search By Region</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start of the form -->
                                                    <form action="adminhome" method="post">
                                                        <div class="row">
                                                            <div class="col mb-4">
                                                                <label for="nameWithTitle" class="form-label">Year</label>
                                                                <input type="text" id="nameWithTitle" name="year" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-top:14px;">
                                                            <label class="col-2 col-form-label">Region:</label>
                                                            <div class="col-10">
                                                                <select class="form-control show-tick" name="region" required
                                                                    style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                                    <option value="" disabled selected>--Please select --</option>
                                                                    <option value="Dar es Salaam">Dar es Salaam</option>
                                                                    <option value="Mbeya">Mbeya</option>
                                                                    <option value="Kigoma">Kigoma</option>
                                                                    <option value="Tabora">Tabora</option>
                                                                    <option value="Kwengineko">Kwengineko</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                    </form> <!-- End of the form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--/ Cards with few info -->


                            <!-- Generated Leads -->

                            <!--/ Cards with charts & info -->

                            <br />
                            <br />
                            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3" style="margin-top:12px;">
                                <div class="col">
                                    <div class="portlet">
                                        <div class="portlet-heading">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="portlet3" class="panel-collapse collapse show">
                                            <div class="portlet-body">
                                                <div class="card radius-10 w-100">
                                                    <div class="card-body">
                                                        <div id="projectmembers" style="width:100%; height: 300px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="portlet">
                                        <div class="portlet-heading">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="portlet3" class="panel-collapse collapse show">
                                            <div class="portlet-body">
                                                <div class="card radius-10 w-100">
                                                    <div class="card-body">
                                                        <div id="pie-chart" style="width:100%; height: 300px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="portlet">
                                        <div class="portlet-heading">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="portlet3" class="panel-collapse collapse show">
                                            <div class="portlet-body">
                                                <div class="card radius-10 w-100">
                                                    <div class="card-body">
                                                        <div id="member-contribution-chart"
                                                            style="width:100%; height: 300px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <br />
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2" style="margin-top:12px;">
                                <div class="col">
                                    <div class="portlet">
                                        <div class="portlet-heading">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="portlet3" class="panel-collapse collapse show">
                                            <div class="portlet-body">
                                                <div class="card radius-10 w-100">
                                                    <div class="card-body">
                                                        <div id="member-contribution-charte"
                                                            style="width:100%; height: 300px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="portlet">
                                        <div class="portlet-heading">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="portlet3" class="panel-collapse collapse show">
                                            <div class="portlet-body">
                                                <div class="card radius-10 w-100">
                                                    <div class="card-body">
                                                        <div id="chartproject" style="width:100%; height: 300px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />


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
            <script>
            var options = {
                series: [{
                    name: 'Pending Cases',
                    data: [0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0
                    ]
                }, {
                    name: 'Open Cases',
                    data: [14,
                        27,
                        16,
                        17,
                        20,
                        9,
                        8,
                        7,
                        9,
                        14,
                        15,
                        9
                    ]
                }, {
                    name: 'Closed Cases',
                    data: [23,
                        27,
                        19,
                        38,
                        43,
                        50,
                        42,
                        53,
                        35,
                        49,
                        43,
                        39
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'],
                },
                yaxis: {
                    title: {
                        text: undefined
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#patient-report"), options);
            chart.render();
            </script>
            <script>
            //var pp = 535;
            //console.log(pp);
            let pieOptions = {
                series: [35, 52],
                chart: {
                    type: 'pie',
                    height: 350,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true // <== line to add
                        }
                    }
                },
                labels: ['Male', 'Female'],
                theme: {
                    monochrome: {
                        enabled: false
                    }
                },
                title: {
                    text: 'Sex Of Complainant'
                },
                colors: ['#06358a', '#de1f26'],
                responsive: [{
                    breakpoint: 380,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            let pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieOptions);
            pieChart.render();

            let memberContributionOptions = {
                series: [{
                    name: "Feedback Type",
                    data: [49, 25, 13] // Corresponding values for the categories
                }],
                chart: {
                    type: 'bar',
                    height: 300
                },
                colors: ['#6d8dbd', '#FF0000', '#06358a'], // Manually assigned colors
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: false, // Ensure the bars are vertical (histogram)
                        distributed: true // Distribute colors to each bar
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    style: {
                        colors: ['#fff']
                    }
                },
                xaxis: {
                    categories: ['Programatic', 'Sensitive', 'Out Of Scope'], // The categories for each bar
                    title: {
                        text: 'Feedback Type'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Count'
                    }
                },
                title: {
                    text: 'Feedback Type Distribution',
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold'
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            };

            let memberChart = new ApexCharts(document.querySelector("#member-contribution-chart"),
                memberContributionOptions);
            memberChart.render();
            </script>
            <script>
            let memberContributionOptionse = {
                series: [{
                    name: "Request Per Region",
                    data: [10, 7, 20, 25, 18, 7] // Corresponding values for the regions
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                colors: ['#06358a', '#33FF57', '#6d8dbd', '#FFC300', '#900C3F',
                '#a0b4d4'], // Manually assigned colors
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: false, // Ensure the bars are vertical (histogram)
                        distributed: true // Distribute colors to each bar
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    style: {
                        colors: ['#fff']
                    }
                },
                xaxis: {
                    categories: ['Dar es Salaam', 'Mbeya', 'Kigoma', 'Tabora', 'Songwe',
                    'Others'], // The regions for each bar
                    title: {
                        text: 'Region'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Requests'
                    }
                },
                title: {
                    text: 'Request Per Region',
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold'
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            };

            let memberCharte = new ApexCharts(document.querySelector("#member-contribution-charte"),
                memberContributionOptionse);
            memberCharte.render();
            </script>
            <script>
            var options = {
                series: [{
                    name: "Feedback Type",
                    data: [22,
                        80,
                        111
                    ]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Feedback Type',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Programatic', 'Sensitive', 'Out Of Scope'],
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
            </script>
            <script>
            var options = {
                series: [{
                    name: "",
                    data: [3, 10, 37, 35, 2]
                }],
                chart: {
                    type: 'bar',
                    height: 300
                },
                title: {
                    text: 'Feedback Status',
                    align: 'left'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                        distributed: true, // Enables different colors for each bar
                    }
                },
                colors: ['#06358a', '#FFFF00', '#cfdae9', '#008000', '#6d8dbd'], // Array of colors for each bar
                dataLabels: {
                    enabled: true, // Enable data labels
                    formatter: function(val) {
                        return val; // Return the value to be displayed
                    },
                    offsetX: 0, // Adjust the horizontal position
                    style: {
                        fontSize: '12px', // Font size of the labels
                        colors: ['#333'] // Color of the labels
                    }
                },
                xaxis: {
                    categories: [
                        'New', 'Assigned', 'WP', 'Closed', 'Reassigned'
                    ],
                }
            };

            var chart = new ApexCharts(document.querySelector("#projectmembers"), options);
            chart.render();
            </script>

            <script>
            // Function to generate a random color in hex format
            function getRandomColor() {
                let letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Define the data
            var data = [7, 9, 24, 18, 9, 13, 7];

            // Generate a random color for each data point
            var randomColors = data.map(() => getRandomColor());

            var options = {
                series: [{
                    name: "",
                    data: data
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                title: {
                    text: '# Of Issues Per Project',
                    align: 'left'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                        colors: {
                            ranges: randomColors.map((color, index) => ({
                                from: data[index],
                                to: data[index],
                                color: color
                            }))
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: [
                        'VOICE', 'GHG', 'SCP4 Malari', 'ECD', 'Charity water', 'STRONG', 'ADG'
                    ],
                },
            };

            var chart = new ApexCharts(document.querySelector("#chartproject"), options);
            chart.render();
            </script>



            <script>
            var options = {
                series: [{
                    name: 'Training',
                    data: [44, 55, 41, 67, 22, 43]
                }, {
                    name: 'Workshop',
                    data: [13, 23, 20, 8, 13, 27]
                }, {
                    name: 'Meeting',
                    data: [11, 17, 15, 15, 21, 14]
                }, {
                    name: 'Suportive Supervision',
                    data: [21, 7, 25, 13, 22, 8]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                title: {
                    text: 'Activities Held Monthly(2024)',
                    align: 'left'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 10,
                        dataLabels: {
                            total: {
                                enabled: true,
                                style: {
                                    fontSize: '13px',
                                    fontWeight: 900
                                }
                            }
                        }
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr',
                        'May', 'Jun'
                    ],
                },
                legend: {
                    position: 'bottom',
                    offsetY: 40
                },
                fill: {
                    opacity: 1
                }
            };

            var chart = new ApexCharts(document.querySelector("#activitiesmonth"), options);
            chart.render();
            </script>
            <script>
            var options = {
                series: [44, 55, 13, 43],
                chart: {
                    height: 350,
                    type: 'pie',
                    toolbar: {
                        show: true,
                        tools: {
                            download: true // <== line to add
                        }
                    }
                },
                title: {
                    text: 'Training Held Percentage by Theamtic Area(2024)',
                    align: 'left'
                },
                labels: ['Elimu', 'Afya', 'Miundombinu', 'Ushiriki wa Uchaguzi wa Zamani na Ujao'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#thematicares"), options);
            chart.render();
            </script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

            <!-- Main JS -->
            <script src="assets/js/main.js"></script>


            <!-- Page JS -->
            <script src="assets/js/dashboards-crm.js"></script>

</body>

</html>

<!-- beautify ignore:end -->