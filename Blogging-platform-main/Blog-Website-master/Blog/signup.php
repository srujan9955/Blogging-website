<!DOCTYPE html>
<html lang="en">
<?php
include("connection.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))          
{ 
    if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['pass']))
		{
            $error = 	'<div class="alert alert-danger alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>All fields Must be Fillup!</strong>
								</div>';
								
		}
	else
		{

			$sql = "INSERT INTO user (name,email,password) VALUE('".$_POST['name']."','".$_POST['email']."','".$_POST['pass']."')";
			mysqli_query($db, $sql); 			
            echo "<script>alert('Account created Successfully');</script>"; 
            $loginquery ="SELECT * FROM user WHERE email='".$_POST['email']."' && password='".$_POST['pass']."'";
            $result=mysqli_query($db, $loginquery);
            $row=mysqli_fetch_array($result);

            if(is_array($row))
                {
                        $_SESSION["user_id"] = $row['user_id'];
                        header("refresh:1;url=dashboard.php");
                } 
            else
                {
                        header("refresh:1;url=login.php");		
                        echo "<script>alert('Opps please login Manual!');</script>"; 
                }
}		
		}
					        
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="Container login">
        <div class="card">
            <h3 class="card-title">Create Account</h3>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Enter Name" id="">
                <input type="email" name="email" placeholder="Enter Email" id="">
                <input type="password" name="pass" placeholder="Enter Password" id="">
                <input class="btn btn-primary" type="submit" name="submit" value="Sign Up">
                <span>or</span>
                <a href="login.php">Login Account</a>
            </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>