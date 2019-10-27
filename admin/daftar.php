<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link type="text/css" rel="stylesheet"  href="css/style.css">
</head>
<body>
<?php
//require('koneksi.php');
$konek = mysqli_connect("localhost", "root", "", "web_pariwisata");

    if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   }
// insert databse.
if (isset($_REQUEST['username'])){
        // menghapus backslashes
 $username = stripslashes($_REQUEST['username']);
        //karakter khusus di string
 $username = mysqli_real_escape_string($konek,$username); 
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($konek,$password);
 $nama = stripslashes($_REQUEST['nama']);
 $nama = mysqli_real_escape_string($konek,$nama);
 $contact = stripslashes($_REQUEST['contact']);
 $contact = mysqli_real_escape_string($konek,$contact);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($konek,$email);
        $query = "INSERT into `user` (username, password, nama, contact,  email)
VALUES ('$username', '$password', '$nama', '$contact', '$email')";
        $result = mysqli_query($konek,$query);
        if($result){
            echo "<div class='form'>
        <h3>Berhasil mendaftar.</h3>
        <br/>Click here <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registrasi</h1>
<form name="registrasi" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="text" name="nama" placeholder="Nama" required />
<input type="text" name="contact" placeholder="Contact" required />
<input type="email" name="email" placeholder="Email" required />
<input type="submit" name="submit" value="Daftar" />
</form>
</div>
<?php } ?>
</body>
</html>