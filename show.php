<?php include("header.php"); ?>
<?php
    include("connect.php");
    $sno=$_GET['sno'];
    $sql=mysqli_query($con,"select * from data where SNo='$sno'")or die ('Error:- '.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);

?>
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
        <div class="col-lg-12">
            <h1 align="center">Contact Data</h1>
            <div class="card">
             <div class="card-body">
<div class="basic-form">
<p align="center" style="font-size: large;color: green" ></p>
    <form name="form" method="post" action="action.php?pid=3">
        <div style="text-align: center;"><img src="images/avatar/<?php echo $rs[12]; ?>" height="80px" width="80px"></div> 
        <br>
        <div class="form-row">

             <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $rs[2]; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $rs[3]; ?>" readonly>
            </div>

            <div class="form-group col-md-6">
        <label >Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $rs[5]; ?>" readonly id="" name="dob">
       </div>

       <div class="form-group col-md-6">
                <label>Contact</label>
                <input type="text" class="form-control" value="<?php echo $rs[4]; ?>" readonly name="cno">
            </div>

       <div class="form-group col-md-4">
                <label>City</label>
                <input type="text" class="form-control" name="city"
                value="<?php echo $rs[6]; ?>" readonly>
        </div>


         <div class="form-group col-md-3">
                <label>Blood Group</label>
                <input type="text" class="form-control" name="city"
                value="<?php echo $rs[7]; ?>" readonly>
            </div>
             <div class="form-group col-md-3">
                <label>Relationship Status</label>
                <input type="text" class="form-control" name="city"
                value="<?php echo $rs[8]; ?>" readonly>
            </div>
            <div class="form-group col-md-3">
                <label>Occupation</label>
                <input type="text" class="form-control" value="<?php echo $rs[10]; ?>" readonly name="occ">
            </div>


        </div>
        <div class="form-group" style="font-weight: bold;">Gender: 
            <label class="radio-inline mr-3">
            <div><?php if($rs[9]=="Male") { echo "Male"; } else { echo "Female";} ?> </div>    
           
            
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" value="<?php echo $rs[11]; ?>" readonly name="add">
        </div>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img">
                <label class="custom-file-label">Upload Image</label>
            </div>
            
        </div>
        <br>
       
       
        <button type="submit" class="btn btn-dark" name="Submit">Submit</button>
    </form>
</div>
</div>
</div>
</div>

</div>

</div>
</div>
<?php include("footer.php"); ?>