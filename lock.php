<?php session_start(); ?>
<?php
   include("connect.php");
   $user=$_SESSION['uid'];
    $sql=mysqli_query($con,"select username from users where email='$user'")or die('ERROR:-'.mysqli_error());
   $rs=mysqli_fetch_array($sql); 
   $msg="";
   if(isset($_SESSION['msg']))
    {
        $msg=$_SESSION['msg'];
    }
    
    $_SESSION['msg']="";
    
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
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

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4><?php echo $rs[0]; ?></h4></a>
                                <p align="center" style="font-size: large;font-weight: bold;color: red;"><?php echo $msg; ?></p>
                                <form class="mt-5 mb-3 login-input" method="post" name="form" action="action.php?pid=8">
                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" name="Unlock">Unlock</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
</body>
</html>




