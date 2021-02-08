<?php include("header.php"); ?>
<?php
    include("connect.php");
    $sno=$_GET['sno'];
    $_SESSION['sno']=$sno;
    $sql=mysqli_query($con,"select * from data where SNo='$sno'")or die ('Error:- '.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);
     $msg="";
     if(isset($_SESSION['msg']))
    {
        $msg=$_SESSION['msg'];
    }
    
    $_SESSION['msg']="";

?>
<div class="content-body">

<div class="row page-titles mx-0">
<div class="col p-md-0">
<div class="col-lg-12">
<h1 align="center">Contact Data</h1>
<div class="card">
<div class="card-body">
<div class="basic-form">
<p align="center" style="font-size: large;color: green" ><?php echo $msg; ?></p>
        <form name="form" method="post" action="action.php?pid=4">
            <div style="text-align: center;"><a href="change_image.php?sno=<?php echo $sno; ?>"><img src="images/avatar/<?php echo $rs[12]; ?>" height="80px" width="80px"></a></div> 
            <br>
            <div class="form-row">

                 <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $rs[2]; ?>" >
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $rs[3]; ?>" >
                </div>

                <div class="form-group col-md-6">
            <label class="m-t-20">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $rs[5]; ?>"  id="mdate" name="dob">
           </div>

           <div class="form-group col-md-6">
                    <label>Contact</label>
                    <input type="text" class="form-control" value="<?php echo $rs[4]; ?>"  name="cno">
                </div>

           <div class="form-group col-md-4">
                    <label>City</label>
                    <input type="text" class="form-control" name="city"
                    value="<?php echo $rs[6]; ?>" >
            </div>


            <div class="form-group col-md-3">
                    <label>Blood Group</label>
                    <select id="inputState" class="form-control" name="bg">
                        <option selected="selected"><?php echo $rs[7]; ?></option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        <option>O+</option>
                        <option>O-</option>
                    </select>
                </div>
                 <div class="form-group col-md-3">
                    <label>Relationship Status</label>
                    <select id="inputState" class="form-control" name="status">
                        <option selected="selected"><?php echo $rs[8]; ?></option>
                        <option>Married</option>
                        <option>Single</option>   
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Occupation</label>
                    <input type="text" class="form-control" value="<?php echo $rs[10]; ?>"  name="occ">
                </div>


            </div>
            <div class="form-group" style="font-weight: bold;">Gender: 
            <label class="radio-inline mr-3">
            <div><?php if($rs[9]=="Male") { echo "Male"; } else { echo "Female";} ?> </div>    
           
            
        </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" value="<?php echo $rs[11]; ?>"  name="add">
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