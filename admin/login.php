<!DOCTYPE html>
<html>
<head>
<!-- <meta charset="utf-8"> -->
<title>Login</title>
<!-- <link type="text/css" rel="stylesheet" href="css/style.css" /> -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
	/*require('koneksi.php');*/
	$konek = mysqli_connect("localhost", "root", "", "web_pariwisata");
	session_start();
    // insert databse.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // menghapus backslashes
		$username = mysqli_real_escape_string($konek,$username); //karakter khusus di string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($konek,$password);
		
	//check user di database
        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
		$result = mysqli_query($konek,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        /*if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // mendirect user ke index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}*/
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Belum Punya Akun ? <a href='daftar.php'>Register Here</a></p>

<br /><br />
</div>
<?php } ?>
</body>
</html>
