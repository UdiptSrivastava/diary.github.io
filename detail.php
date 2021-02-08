<?php include("header.php"); ?>
<?php
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
    <form name="form" method="post" action="action.php?pid=3" enctype="multipart/form-data">
        <div style="text-align: center;"><img src="images/avatar/11.png" height="80px" width="80px" id="output_image"></div> 
        <br>
        <div class="form-row">

             <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="form-group col-md-6">
        <label class="m-t-20">Date of Birth</label>
        <input type="text" class="form-control" placeholder="2017-06-04" id="mdate" name="dob">
       </div>

       <div class="form-group col-md-6">
                <label>Contact</label>
                <input type="text" class="form-control" placeholder="Mobile No." name="cno">
            </div>

       <div class="form-group col-md-4">
                <label>City</label>
                <input type="text" class="form-control" name="city">
        </div>


         <div class="form-group col-md-3">
                <label>Blood Group</label>
                <select id="inputState" class="form-control" name="bg">
                    <option selected="selected">Choose...</option>
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
                    <option selected="selected">Choose...</option>
                    <option>Married</option>
                    <option>Single</option>   
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Occupation</label>
                <input type="text" class="form-control" placeholder="Occupation" name="occ">
            </div>


        </div>
        <div class="form-group" style="font-weight: bold;">Gender: 
            <label class="radio-inline mr-3">
                <input type="radio" name="gen"
                id="gen" value="Male"> Male </label>
            <label class="radio-inline mr-3">
                <input type="radio" name="gen" id="gen" value="Female"> Female </label>
            
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder=" Type the address here " name="add">
        </div>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img" accept="image/*" onchange="preview_image(event)">
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
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>