<?php 
	session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head lang="en">
 	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
 	<title>Login</title>
 </head>
 <style>
 	.login-panel {
 		margin-top: 150px;
 	}
 </style>

 <body>
 
 <div class="container">
 	<div class="row">
 		<div class="col-md-4 col-md-offset-4">
 			<div class="login-panel panel-succes">
 				<div class="panel-heading">
 					<h3 class="panel-title">Login</h3>
 				</div>
 				<div class="panel-body">
 					<form role="form" method="post" action="login.php">
 						<fieldset>
 							<div class="form-group">
 								<input type="form-control" placeholder="E-mail" name="email" type="email" autofocus>
 							</div>
 							<div class="form-group">
 								<input type="form-control" placeholder="Password" name="password" type="password" value="">
 							</div>

 							<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">
 						</fieldset>
 					</form>
 				</div>
 				<div><a href="register.php">Register</a> | 
				<a href="registration.php">Registrasi</a>
				</div>
 			</div>
 		</div>
 	</div>
 </div>
 </body>
 </html>

 <?php



if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=$_POST['password'];

    $konek = mysqli_connect("localhost", "root", "", "web_pariwisata");

	if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   exit();

    $check_user="select * from user WHERE email='$email'AND password='$password'";

    $run=mysqli_query($konek,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('index.php','_self')</script>";

        $_SESSION['email']=$email;//here session is used and value of $user_email store in $_SESSION.

    }           
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
}
?>