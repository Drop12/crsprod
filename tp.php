<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['userrole'])) {
    header("location:index");
    exit;
}
require_once 'functions.php';

$dbsms=loginsms();
$db=login();

//$dbsm = loginsms();

if(isset($_GET['startdate']))
{
    $startdate=$_GET['startdate'];
    $enddate=$_GET['enddate'];
    $sql="SELECT * FROM tbl_expense_ledger where (cast(reg_date as date) between '$startdate' and '$enddate') order by reg_date desc";
    
    $typedd='search';
    //echo $sql;
}
else
{
    $typedd='nonsearch';
    $sql="SELECT * FROM tbl_expense_ledger order by reg_date desc";
}
if(isset($_GET['insertaoutusss']))
{
    $status=$_GET['insertaoutusss'];
}
else
{
    $status=null;
}
$user_role_role=$_SESSION['userrole'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="shortcut icon" href="assets1/images/logo.png">
    <title>Sheria Kiganjani</title>
    <!--plugins-->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style type="text/css">
    #example2 {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #example2 td,
    #example2 th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #example2 tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #example2 tr:hover {
        background-color: #ddd;
    }

    #example2 th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #9b870c !important;
        color: #fff;
    }
    </style>

</head>

<body style="background-color: #e1e0e7;">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php include_once 'adminmenu.php' ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php include_once 'header.php' ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <h6 class="page-title">Dashboard</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Welcome to Administrator Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-md-8">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <?php if($user_role_role=='Administrator'){
                                    ?>
                                        <button class="btn btn-primary" type="button" id="dropdownMenuButton"
                                        aria-expanded="false" onclick="myFunction2()">
                                        Add Followers
                                        </button>
                                        <button class="btn btn-primary" type="button" id="dropdownMenuButton"
                                            aria-expanded="false" onclick="myFunction3()">
                                            Add Reach
                                        </button>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="button" id="dropdownMenuButton"
                                        aria-expanded="false" onclick="myFunction()">
                                        Search By Year
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <li class="breadcrumb-item active"><span style="color:black;">Followers Summary</span></li>
                 <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col" >
                        <div class="card radius-10 bg-primary bg-gradient">
                            <div class="card-body" style="background: linear-gradient(45deg,#F58529,#DD2A7B,#8134AF,#515BD4);">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Instagram</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Instagram","Followers"); ?></h4>
                                    </div>
                                    <div class="text-white ms-auto font-35"><i class='lni lni-instagram'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-danger bg-gradient">
                            <div class="card-body" style="background-color: #0A66C2;color: #FFFFFF;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Linkedin</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Linkedin","Followers"); ?></h4>
                                    </div>
                                    <div class="text-white ms-auto font-35"><i class='lni lni-linkedin-original'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-success bg-gradient">
                            <div class="card-body" style="background-color: #000000;color: #FFFFFF;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Twitter</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Twitter","Followers"); ?></h4>
                                    </div>
                                    <div class="text-white ms-auto font-35"><i class='lni lni-twitter-original'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-warning bg-gradient">
                            <div class="card-body" style="background-color: #1877F2;color: #FFFFFF;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Facebook</p>
                                        <h4 class="text-white my-1"><?php echo get_social_count($db,"Facebook","Followers"); ?></h4>
                                    </div>
                                    <div class="text-white ms-auto font-35"><i class='lni lni-facebook'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    <br/>
                    <li class="breadcrumb-item active"><span style="color:black;">Reach Summary</span></li>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    
                    <div class="col">
                        <div class="card radius-10 bg-success">
                            <div class="card-body" style="background: linear-gradient(45deg,#F58529,#DD2A7B,#8134AF,#515BD4);">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Instagram</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Instagram","Reach"); ?></h4>
                                        <p class="mb-0 font-13 text-white"><i class='lni lni-instagram'></i>
                                        </p>
                                    </div>
                                    <div class="widgets-icons bg-white text-success ms-auto"><i class='lni lni-instagram'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-info">
                            <div class="card-body" style="background-color: #0A66C2;color: #FFFFFF;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Linkedin</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Linkedin","Reach"); ?></h4>
                                        <p class="mb-0 font-13 text-white"><i class='lni lni-linkedin-original'></i>
                                        </p>
                                    </div>
                                    <div class="widgets-icons bg-white text-dark ms-auto"><i class='lni lni-linkedin-original'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-warning">
                            <div class="card-body" style="background-color: #000000;color: #FFFFFF;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Twitter</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Twitter","Reach"); ?></h4>
                                        <p class="mb-0 font-13 text-white"><i class='lni lni-twitter-original'></i>
                                        </p>
                                    </div>
                                    <div class="widgets-icons bg-dark text-white ms-auto"><i class='lni lni-twitter-original'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-danger">
                            <div class="card-body" style="background-color: #1877F2;color: #FFFFFF;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Facebook</p>
                                        <h4 class="my-1 text-white"><?php echo get_social_count($db,"Facebook","Reach"); ?></h4>
                                        <p class="mb-0 font-13 text-white"><i class='lni lni-facebook'></i>
                                        </p>
                                    </div>
                                    <div class="widgets-icons bg-white text-danger ms-auto"><i class='lni lni-facebook'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   <div class="row">
                        
                    </div>
                <div id="myDIV" style="display:none;">
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Search Year</h4>
                                        <p class="card-title-desc">Kindly filter by year</p>
                                    <form action="socialyear" method="GET">
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Year:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="startdate"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <h4 class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Search By Year"
                                                name="submit" style="width:300px;">
                                        </h4>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
               
                <div id="myDIV2" style="display:none;">
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Add Followers</h4>
                                        <p class="card-title-desc">Please fill the below form</p>
                                    <form action="insertscript" method="POST">
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Year</label></label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="addfollowersinsert" min="0"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Select Month</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="mwezi" required
                                                            style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                            <option value="" disabled selected>-- Please select Month
                                                            </option>
                                                               <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Select Channel</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="chaneli" required
                                                            style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                            <option value="" disabled selected>-- Please select Chanel
                                                            </option>
                                                               <option value="Instagram">Instagram</option>
                                                                <option value="Linkedin">Linkedin</option>
                                                                <option value="Facebook">Facebook</option>
                                                                <option value="Twitter">Twitter</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Number Increase</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="ongezeko" min="0"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <h4 class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Submit"
                                                name="submit" style="width:300px;">
                                        </h4>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="myDIV3" style="display:none;">
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Add Reach</h4>
                                        <p class="card-title-desc">Please fill the below form</p>
                                    <form action="insertscript" method="POST">
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Year</label></label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="addreachinsert" min="0"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                           <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="mwezi">Select Month</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="mwezi" required
                                                            style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                            <option value="" disabled selected>-- Please select Month
                                                            </option>
                                                               <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Select Channel</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="chaneli" required
                                                            style="width: 100%;box-sizing: border-box;border: 2px solid #ccc;">
                                                            <option value="" disabled selected>-- Please select Chanel
                                                            </option>
                                                               <option value="Instagram">Instagram</option>
                                                                <option value="Linkedin">Linkedin</option>
                                                                <option value="Facebook">Facebook</option>
                                                                <option value="Twitter">Twitter</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branchname">Number Increase</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="ongezeko" min="0"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <h4 class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Submit"
                                                name="submit" style="width:300px;">
                                        </h4>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                 <div class="row">
                     <div class="col-1"></div>
                    <div class="col-10 card">
                    <div class="card-body">
                        <p class="mb-3 text-uppercase">Yearly Growth</p>
                        <div class="row mb-5">
                        </div>
                        <div class="table-responsive" id="patient-report">
                        </div>
                    </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <br/>
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Monthly Social Media Reach and Follower Growth</h4>
                                    <br>
                                    <div class="text-center">
                                        <?php if (!empty($status)) : ?>
                                        <div class="alert alert-success">
        
                                            <?php echo $status ?>
        
                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>Channel</th>
                                                <th>Number Increase</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $x=1;
                                                $sql="SELECT * FROM tbl_followers order by reg_date desc";
                                                $result_set=mysqli_query($db,$sql);
                                                while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)) 
                                                { 
                                                
                                                
                                                    
                                                
                                            ?>
                                            <tr>
                                                <td align="center" style="width: 20px;"><?php echo $x;?></td>
                                                <td align="center" style="width: 50px;">
                                                    <?php echo $row['mwaka'];?></td>
                                                <td align="center" style="width: 50px;">
                                                    <?php echo get_mwezi_husika($row['mwezi']);?></td>
                                                <td align="center" style="width: 50px;">
                                                    <?php echo $row['chaneli'];?></td>
                                                    <td align="center" style="width: 50px;">
                                                    <?php echo $row['ongezeko'];?></td>
                                                     <td align="center" style="width: 50px;">
                                                    <?php echo $row['addtype'];?></td>
                                           </tr>
                                            <?php $x++;}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
            </div>
        </div>
        <br />
        <br />
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer" style="background:url('assets/images/ski.png');color:#fff;">
            <p class="mb-0">Copyright © <?php echo date('Y'); ?>. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script>
        var options = {
        series: [
            {
            name: 'Instagram',
            data: [<?php $sql_insta="SELECT mwaka FROM `tbl_followers` GROUP BY `mwaka` ORDER BY `mwaka` ASC";$result_set=mysqli_query($db,$sql_insta);
                                                while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)) 
                                                { echo get_data_social($db,"Instagram",$row['mwaka']).',';}; ?>]
        }, 
        
        {
            name: 'Linkedin',
            data: [<?php $sql_l="SELECT mwaka FROM `tbl_followers` GROUP BY `mwaka` ORDER BY `mwaka` ASC";$result_setl=mysqli_query($db,$sql_l);
                                                while($rowl=mysqli_fetch_array($result_setl,MYSQLI_ASSOC)) 
                                                { echo get_data_social($db,"Linkedin",$rowl['mwaka']).',';}; ?>]
        }, 
        
        {
            name: 'Facebook',
            data: [<?php $sql_fb="SELECT mwaka FROM `tbl_followers` GROUP BY `mwaka` ORDER BY `mwaka` ASC";$result_setfb=mysqli_query($db,$sql_fb);
                                                while($rowfb=mysqli_fetch_array($result_setfb,MYSQLI_ASSOC)) 
                                                { echo get_data_social($db,"Linkedin",$rowfb['mwaka']).',';}; ?>]
        },
        {
            name: 'Twitter',
            data: [<?php $sql_x="SELECT mwaka FROM `tbl_followers` GROUP BY `mwaka` ORDER BY `mwaka` ASC";$result_setfx=mysqli_query($db,$sql_x);
                                                while($rowfx=mysqli_fetch_array($result_setfx,MYSQLI_ASSOC)) 
                                                { echo get_data_social($db,"Linkedin",$rowfx['mwaka']).',';}; ?>]
        }
        ],
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
            categories: ['2022','2023', '2024'],
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
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

    <script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['excel']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("myDIV");
        var y = document.getElementById("myDIV2");
        var z = document.getElementById("myDIV3");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
    }
    </script>
    
    <script type="text/javascript">
    function myFunction2() {
        var x = document.getElementById("myDIV2");
        var y = document.getElementById("myDIV");
        var z = document.getElementById("myDIV3");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
    }
    </script>
    <script type="text/javascript">
    function myFunction3() {
        var x = document.getElementById("myDIV3");
        var y = document.getElementById("myDIV");
        var z = document.getElementById("myDIV2");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
    }
    </script>
    <script>
    $(function() {
        $(".knob").knob();
    });
    </script>
    <script src="assets/js/index.js"></script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>