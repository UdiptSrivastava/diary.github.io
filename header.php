<?php session_start(); ?>
<?php 
                                        
                include("connect.php");
                $user=$_SESSION['uid'];
                $sql=mysqli_query($con,"SELECT name,monthname(dob),day(dob) from data where month(dob)=month(now()) and day(dob)-day(now())>=0 and day(dob)-day(now())<=7 and userid='$user'")or die('ERROR-:'.mysqli_error($con));
                $n=mysqli_num_rows($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Digital Diary</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css_dash/style.css" rel="stylesheet">
    <!--  Data table  -->
     <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
     <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="./plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="./plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="./plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="./plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <?php 
            $sql2=mysqli_query($con,"select image from profile where email='$user'") or die('ERROR-:'.mysqli_error($con));
            $rs2=mysqli_fetch_array($sql2);
            ?>
            <p align="center"><img src="images/avatar/<?php echo $rs2[0]; ?>" height="70px" width="70px" style="border-radius: 50% 50% 50% 50%"></p>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
<div class="header">  
  
<div class="header-content clearfix">
    
    <div class="nav-control">
        <div class="hamburger">
            <span class="toggle-icon"><i class="icon-menu"></i></span>
        </div>
    </div>
    <div class="header-right">

        <ul class="clearfix">
        
            <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge badge-pill gradient-2"><?php if(mysqli_num_rows($sql)>0) { echo $n; } ?></span>
                </a>
                <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                    <div class="dropdown-content-heading d-flex justify-content-between">
                        <span class=""><?php  if(mysqli_num_rows($sql)>0) { echo $n." New Notifications"; } ?></span>  
                        <a href="javascript:void()" class="d-inline-block">
                            <span class="badge badge-pill gradient-2"></span>
                        </a>
                    </div>
                    <div class="dropdown-content-body">
                        <ul>
                             <?php 
                                        
                
                $count=0;
            while($rs=mysqli_fetch_array($sql))
            {
                $count++;
                ?> 
                <li>
                <a href="javascript:void()">
                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                    <div class="notification-content">
                        <p class="notification-heading" style="font-size: small;"><?php echo $rs[0]."'s ";?>Birthday coming up this week</p>
                        <span class=""><?php echo $rs[2]." - ".$rs[1]; ?></span> 
                    </div>
                </a>
            <?php 
            }
            ?>
        </li>

        </ul>
                    
            </li>
            <li class="icons dropdown d-none d-md-flex">
                
            </li>
            <li class="icons dropdown">
                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                    <span class="activity active"></span>
                    <img src="images/user/1.png" height="40" width="40" alt="">
                </div>
                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                    <div class="dropdown-content-body">
                        <ul>
                            <li>
                                <a href="profile.php"><i class="icon-user"></i> <span>Profile</span></a>
                            </li>
                            <li>
                               <a href="add-profile.php"><i class="icon-user"></i> <span> Add Profile</span></a>
                            </li>
                            
                            <hr class="my-2">
                            <li>
                                <a href="lock.php"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                            </li>
                            <li><a href="sign.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>

</div>

</div>

<!--**********************************
Header end ti-comment-alt
***********************************-->

<!--**********************************
Sidebar start
***********************************-->
<div class="nk-sidebar">           
<div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
        <div class="user-img c-pointer position-relative"   data-toggle="dropdown" style="background-color: #7571f9">
                    <span class="activity active"></span>
                    <h3  align="center" style="font-family:cursive; color: white ">My Diary</h3>
        </div>
        <br>
        <li>
            <a href="table.php" aria-expanded="false">
                <i class="icon-badge menu-icon"></i><span class="nav-text">Home</span>
            </a>
        </li>
        <li>
            <a href="detail.php" aria-expanded="false">
                <i class="icon-badge menu-icon"></i><span class="nav-text">Add Contact</span>
            </a>
        </li>
       <li>
            <a href="profile.php" aria-expanded="false">
                <i class="icon-badge menu-icon"></i><span class="nav-text">My Profile</span>
            </a>
        </li>
        <li>
            <a href="sign.php" aria-expanded="false">
                <i class="icon-badge menu-icon"></i><span class="nav-text">Logout</span>
            </a>
        </li>
    </ul>
</div>
</div>
        