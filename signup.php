<?php session_start(); ?>
<?php 

    
    $msg2="";
    if(isset($_SESSION['msg2']))
    {
        $msg2=$_SESSION['msg2'];
    }
    
    $_SESSION['msg2']="";
?>
<style>

	body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(40,57,101,.9);
}

.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}
</style>
</head>
<body>
<div class="login-wrap">
	<div class="login-html">
		
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">SIGN UP</label>
		<form method="post" name="form" onsubmit="return validate();" action="action.php?pid=2">
		<div class="login-form">
			
				
				
			<div class="sign-up-htm">
				<div style="text-align: center;color: red"><?php echo $msg2; ?></div>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="user" type="text" class="input">
					<div id="u" style="color: red"></div>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pass" type="password" class="input" data-type="password"><div id="p" style="color: red"></div>
				</div>
				<div class="group">
					<label for="cpass" class="label">Repeat Password</label>
					<input id="cpass" name="cpass" type="password" class="input" data-type="password"><div id="c" style="color: red"></div>
				</div>
				<div class="group">
					<label for="email" class="label">Email Address</label>
					<input id="email" name="email" type="text" class="input">
					<div id="e" style="color: red"></div>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="Signup">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="sign.php"> <label for="tab-1">Already Member?</a>
				</div>
			</div>
		</label>
	</div>
		</div>
		</div>		
	</form>
	</div>

</div>


</body>
</html>
<script>
	var chk_name=/^[A-Za-z. ]{2,40}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
    function validate()
    {
       var pass=form.pass.value;
       var cpass=form.cpass.value;
       var name=form.user.value;
       var email=form.email.value;

       var flag=1;
       if(!chk_name.test(name)) // Name
		{
			document.getElementById('u').innerHTML="You must write a valid name";
			if(flag==1)
			form.user.focus();
			flag=0;
		}
		else
			document.getElementById('u').innerHTML="";
			
		

       
        if(pass=="" || pass!=cpass) // Name
        {
            document.getElementById('c').innerHTML="Password not matched!!";
            if(flag==1)
            form.cpass.focus();
            flag=0;
        }
        else
            document.getElementById('c').innerHTML="";

        if(!chk_email.test(email)) // Email
		{
			document.getElementById('e').innerHTML="You must enter a valid email";
			if(flag==1)
			form.email.focus();
			flag=0;
		}
		else
			document.getElementById('e').innerHTML="";
              
        if(flag==1)
        return true;
        return false;
    }
</script>