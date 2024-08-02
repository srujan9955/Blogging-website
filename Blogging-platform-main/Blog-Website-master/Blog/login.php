<!DOCTYPE html>
<html lang="en">
    <?php
include("connection.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
$username = $_POST['email'];
$password = $_POST['pass'];

if(!empty($_POST["submit"])) 
{
$loginquery ="SELECT * FROM user WHERE email='$username' && password='$password'";
$result=mysqli_query($db, $loginquery);
$row=mysqli_fetch_array($result);

            if(is_array($row))
                {
                        $_SESSION["user_id"] = $row['user_id'];
                        $_SESSION["username"] = $row['name'];
                        header("refresh:1;url=dashboard.php");
                } 
            else
                {
                        echo "<script>alert('Invalid Username or Password!');</script>"; 
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
    <title>Login</title>
</head>
<body>
    <div class="Container login">
        <div class="card">
            <h3 class="card-title">Login Account</h3>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Enter Email" id="">
                <input type="password" name="pass" placeholder="Enter Password" id="">
                <input class="btn btn-primary" type="submit" name="submit" value="Login">
                <span>or</span>
                <a href="signup.php">Create Account</a>
            </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>