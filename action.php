<?php 
session_start();
	$pid=$_GET['pid'];
		$cd=date("d-m-y");
	include ("connect.php");
	if($pid==1) //sign in 
	{
		if(isset($_POST['Signin']))
		{
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$sql=mysqli_query($con,"select * from users where email='$email' and password='$pass'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql)>0)
			{
				$_SESSION['uid']=$email;
				header('location:table.php');
			}
			else
			{
				$_SESSION['msg1']="Invalid email/password!!";
				header('location:sign.php');
			}
		}
	}
	if($pid==2) //sign up 
	{
		if(isset($_POST['Signup']))
		{
			$pass=$_POST['pass'];
			$cpass=$_POST['cpass'];
			$email=$_POST['email'];
			if($pass==$cpass) 
			{
			$sql1=mysqli_query($con,"select * from users where email='$email'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql1)>0)// when already a member
			{
				$_SESSION['msg2']="Already registered!!";
				
			} 
			else // sign up 
			{	
			$sql2=mysqli_query($con,"insert into users (username,email,password,date) values('$_POST[user]','$_POST[email]','$_POST[pass]','$cd')")or die('Error:- '.mysqli_error($con));
			$_SESSION['msg2']="Successully registered!!";

			// sending mail
            
			$subject = "Registeration confirmed";
					$message = "$_POST[user] you are successfully registered.";
			$message .= '<table rules="all" style="border-color: #666;font-size:18px;" cellpadding="10" width="50%" border="1">';
			$message .= '<tr><td colspan=2><img src="https://source.unsplash.com/200x200/?nature,water" width="100%" height="80px"/></td></tr>';
			$message .= "</table>";

$headers = "From: Global Computer Institute\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
					
					mail($_POST['email'], $subject, $message, $headers);
			}
			}
			header('location:signup.php');
		}
	}
	if($pid==3)
	{
		if(isset($_POST['Submit']))
		{
			$user=$_SESSION['uid'];
			$file_name=$_FILES["img"]["name"];
			if($file_name!="")
			{
				
				

				$file_location=$_FILES["img"]["tmp_name"];
			  $ext=end(explode('.', $file_name));
			  $num=rand(100000,999999);
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="svg")
			{
					
					$img=$num."."."$ext";
					$upload_path="images/avatar/".$img;
					move_uploaded_file($file_location,$upload_path);
			}
		}
		else
		{
			if($_POST['gen']=="Male")
				$img="male.svg";
			else
				$img="female.svg";
		}
			$sql=mysqli_query($con,"insert into data(userid,name,email,contact,Dob,City,BloodGrp,Status,Gender,Occupation,Address,image) values ('$user','$_POST[name]','$_POST[email]','$_POST[cno]','$_POST[dob]','$_POST[city]','$_POST[bg]','$_POST[status]','$_POST[gen]','$_POST[occ]','$_POST[add]','$img')")or die('Error:- '.mysqli_error($con));
			//header('location:detail.php');
			$_SESSION['msg']="Record saved !!!";
			header('location:detail.php');
		}
	}
	
	if($pid==4)
	{
		if(isset($_POST['Submit']))
		{
			$sno=$_SESSION['sno'];
			$sql=mysqli_query($con,"update data set name='$_POST[name]',email='$_POST[email]', contact='$_POST[cno]', Dob='$_POST[dob]', City='$_POST[city]', BloodGrp='$_POST[bg]', Status='$_POST[status]',Occupation='$_POST[occ]', Address='$_POST[add]' where SNo='$sno'")or die('Error-:'.mysqli_error($con));
			$_SESSION['msg']="Record Updated !!!";
			header("location:modify.php?sno=$sno");
		}
	}
	if($pid==5)
	{
		if(isset($_POST['Submit']))
		{
			$file_name=$_FILES["eimg"]["name"];
			$file_location=$_FILES["eimg"]["tmp_name"];
			$ext=end(explode('.', $file_name));
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="svg")
			{
					
					$new_file_name=$_SESSION['sno'].".".$ext;
					$upload_path="images/avatar/".$new_file_name;
					move_uploaded_file($file_location,$upload_path);
					$sql=mysqli_query($con,"update data set image='$new_file_name' where SNo='$_SESSION[sno]'") or die('Error : '.mysqli_error($con));
					header('location:table.php');
			}
			else
			{
				
				$_SESSION['msg']='Please Upload a valid Image File';
				header("location:change_image.php?sno=$_SESSION[sno]");
			}
			
		}
	}

	if($pid==6) //forget password	{
		if(isset($_POST['Change']))
		{
			$flag=1;
			//$uid=$_POST['uid'];
			
			$sql=mysqli_query($con,"select * from users where email='$_POST[email]'") or die('ERROR : '.mysqli_error($con));
			 
			if(mysqli_num_rows($sql)>0)
			{
				$sql=mysqli_query($con,"select username from users where email='$_POST[email]'") or die('ERROR : '.mysqli_error($con));
				$rs=mysqli_fetch_array($sql);
				$_SESSION['uid']=$_POST['email'];
				$otp=rand(1000,9999);
				$_SESSION['otp']=$otp;

				$subject = "User Id and Password";
					$message = '<html><body>';

				$message .= '<table rules="all" style="border-color: #666;font-size:18px; background-image:linear-gradient(#81F9EF,white);" cellpadding="10" width="50%" border="1">';
//$message .= '<tr><td colspan=2><img src="images/logo.gif" width="100%" height="80px"/></td></tr>';
$message .= "<tr><td><strong>Username:</strong> </td><td>" . strip_tags($rs[0]) . "</td></tr>";


$message .= "<tr><td><strong>OTP:</strong> </td><td>" . strip_tags($otp) . "</td></tr>";

$message .= "</table>";
$message .= "</body></html>";

$headers = "From: Global Computer Institute\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
								
				mail($_POST['email'], $subject, $message, $headers); 
				header('location:change_pass.php');
			}
			else
				$flag=0;
			if($flag==0)
			{
				$_SESSION['uid']=$_POST['email'];
				$_SESSION['msg']='Invalid User Id ';
				header('location:forget_pass.php');
			}
		}

		if($pid==7)
		{
			$user=$_SESSION['uid'];
			$otp=$_SESSION['otp'];
			if($otp!=$_POST['otp'])
			{
				$_SESSION['msg']="Invalid otp";
				
			}
			else
			{
				$sql=mysqli_query($con,"UPDATE users set password='$_POST[npass]' where email='$user' ") or die('ERROR-: '.mysqli_error($con));
				$_SESSION['msg']="Password is changed successfully!!";

			}
			header('location:change_pass.php');
		}
		if($pid==8)
		{
			if(isset($_POST['Unlock']))
			{
				 $user=$_SESSION['uid'];
        $sql=mysqli_query($con,"SELECT password,username from users where email='$user'");
        $rs=mysqli_fetch_array($sql);
        if($rs[0]==$_POST['pass'])
        {
            header('location:table.php');
        }
        else
        {
            $_SESSION['msg']='Invalid password!!!';
            header('location:lock.php');
        }
			}
		}

		if($pid==9)
		{
		if(isset($_POST['Submit']))
		{
			$user=$_SESSION['uid'];
			$file_name=$_FILES["img"]["name"];
			if($file_name!="")
			{
				
				

				$file_location=$_FILES["img"]["tmp_name"];
			  $ext=end(explode('.', $file_name));
			  $num=rand(100000,999999);
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="svg")
			{
					
					$img=$num."."."$ext";
					$upload_path="images/avatar/".$img;
					move_uploaded_file($file_location,$upload_path);
			}
		}
		else
		{
			if($_POST['gen']=="Male")
				$img="male.svg";
			else
				$img="female.svg";
		}
			$sql=mysqli_query($con,"insert into profile(name,email,contact,Dob,city,gender,address,image) values ('$_POST[name]','$user','$_POST[cno]','$_POST[dob]','$_POST[city]','$_POST[gen]','$_POST[add]','$img')")or die('Error:- '.mysqli_error($con));
			//header('location:detail.php');
			$_SESSION['msg']="Record saved !!!";
			header('location:add-profile.php');
		}
	}
?>