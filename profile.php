<?php include("header.php");?>
<?php
	include("connect.php");
	$user=$_SESSION['uid'];
	$sql=mysqli_query($con,"select * from profile where email='$user'")or die('ERROR:-'.mysqli_error());
	$rs=mysqli_fetch_array($sql);
	$sql2=mysqli_query($con,"select count(*) from data where userid='$user'")or die('ERROR:-'.mysqli_error());
	$rs2=mysqli_fetch_array($sql2);
?>
<div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                        <div class="col-lg-12 col-xl-12" style="margin-top: 50px">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-6">
                                    <img class="mr-3" src="images/avatar/<?php echo $rs[8]; ?>" height="80px" width="80px" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?php echo $rs[1]; ?></h3>
                                        <p class="text-muted mb-0"><?php echo $rs[5]; ?></p>
                                    </div>
                                </div>
                                
                                <div class="row mb-12">
                                    
                                    <div class="col">
                                        <div class="card card-profile text-center">
                                            <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                            <h3 class="mb-0"><?php echo $rs2[0]; ?></h3>
                                            <p class="text-muted">Contacts</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="detail.php"><button class="btn btn-danger px-5">Add contact</button></a>
                                    </div>
                                </div>
                                <h4>Address</h4>
                                <p class="text-muted"><?php echo $rs[7]; ?></p>
                                <ul class="card-profile__info">
                                    
                                    <li><strong class="text-dark mr-4">Email</strong> <span><?php echo $rs[2]; ?></span></li>
                                    <li><strong class="text-dark mr-4">Mobile No.</strong> <span><?php echo $rs[3]; ?></span></li>
                                    
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
<?php include("footer.php");?>