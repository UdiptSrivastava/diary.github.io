<?php include("header.php"); ?>
<?php
    $user=$_SESSION['uid'];
    if(isset($_GET['sno']))
    {
        include("connect.php");
        $sno=$_GET['sno'];
        $sql=mysqli_query($con,"delete from data where SNo='$sno'")or die 
    ('ERROR:-'.mysqli_error($con));
    }
    
?>        
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<h4 class="card-title">Data Table</h4>
<div class="table-responsive">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone No.</th>
                <th>Dob</th>
                <th>City</th>
                <th>Blood Group</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include ("connect.php");
            $sql=mysqli_query($con,"select image,name,contact,Dob,City,SNo,BloodGrp from data where userid='$user'") or die('Error:- '.mysqli_error($con));
            $count=0;
            while($rs=mysqli_fetch_array($sql))
                  {
                    $count++;
                    ?>
            <tr>
                <td><?php echo $count."."; ?><img src="images/avatar/<?php echo $rs[0]; ?>" height="50px" width="50px"> <?php echo $rs[1]; ?></td>
                <td><?php echo $rs[2]; ?></td>
                <td><?php echo $rs[3]; ?></td>
                <td><?php echo $rs[4]; ?></td>
                <td align="center" width="10px"><?php echo $rs[6]; ?></td>
                <td>
                    <a href="show.php?sno=<?php echo $rs[5]; ?>"><button type="button" class="btn mb-1 btn-primary btn-sm">Show</button></a>
                    <a href="modify.php?sno=<?php echo $rs[5]; ?>"><button type="button" class="btn mb-1 btn-primary btn-sm">Modify</button></a>
                   <a href="table.php?sno=<?php echo $rs[5]; ?>"><button type="button" class="btn mb-1 btn-primary btn-sm">Delete</button></a>
                </td>
            </tr>
        <?php } ?>
            
        </tbody>
        
    </table>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
        
<?php include("footer.php"); ?>