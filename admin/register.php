<!-- <head>
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <style media="screen">
        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        body{
            background: #c2c4c2;
        }
        .form_login{
            width: 30%;
            height: 400px;
            background: white;
            margin: 5% auto;  
}
        form{
            padding: 20px;
        }
        #judul_login{
            width: 100%;
            height: 40px;
            background: #50a8a9;
            color: white;
            text-align: center;
            line-height: 40px;
            font-size: 23px;
            margin-bottom: 30px;
        }
        
        .username{
            width: 350px;
            height: 35px;
        }
        .username:focus{
            font-size: 20px;
            background: #dfdfdf;
        }
        .submit{
            width: 350px;
            height: 40px;
            background: #49af49;
            border: none;
            cursor: pointer;
             font-size: 18px;
            color: white;
        }
        .submit:hover{
            background: #41b741;
           
        }
        #under_login{
            padding: 20px;
            margin: auto 35%;
        }
        a{
            width: 80px;
            height: 40px;
            background: #50a8a9;
            text-decoration: none;
            padding: 5px;
            color: white;
            font-size:14px;
            border-radius: 3px;
        }
    </style>
    <div class="form_login">
        <p id="judul_login"> Daftar </p>
        
        <form action="" method="post">
            <label for="username">Username</label><br>
            <input class="username" type="text" name="username"><br><br>
            <label for="passsword">Password </label><br>
            <input class="username" type="password" name="password"><br><br>
            
            <input class="submit" type="submit" name="submit" value="Daftar"><br>
        
        </form>
        
        <div id="under_login">Atau <br><br> <a href="login.php">Login</a>
            </div>
    </div>
</body> -->




<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.css">
    <title>Register</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>
<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="register.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>

                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nama" name="name" type="text" autofocus>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contact" name="contact" type="number" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                            </div>
                            


                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >

                        </fieldset>
                    </form>
                    <center><b>Sudah Mendaftar ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php

$konek = mysqli_connect("localhost", "root", "", "web_pariwisata");

    if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   exit();//make connection here
if(isset($_POST['register']))
{
    $username=$_POST['username'];//here getting result from the post array after submitting the form.
    $password=$_POST['password'];//same
    $name=$_POST['name'];//same
    $contact=$_POST['contact'];
    $email=$_POST['email'];


    if($username=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the name')</script>";
exit();//this use if first is not work then other will not show
    }

    if($password=='')
    {
        echo"<script>alert('Please enter the password')</script>";
exit();
    }

    if($name=='')
    {
        echo"<script>alert('Please enter the email')</script>";
    exit();
    }

    if($contact=='')
    {
        echo"<script>alert('Please enter the email')</script>";
    exit();
    }

    if($email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
    exit();
    }
//here query check weather if user already registered so can't register again.
    $check_email_query="select * from user WHERE email='$email'";
    $run_query=mysqli_query($konek,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
exit();
    }
//insert the user into the database.
    $insert_user="INSERT into 'user' (username,password,nama,contact,email) VALUE ('$username','$password','$nama','$contact','$email')";
    if(mysqli_query($konek,$insert_user))
    {
        echo"<script>window.open('index.php','_self')</script>";
    }

}
}
?>