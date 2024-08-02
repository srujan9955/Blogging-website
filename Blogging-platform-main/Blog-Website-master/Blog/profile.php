<!DOCTYPE html>
<html lang="en">
<?php
include("connection.php");
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:home.php');
}
else
{
    $user_id=$_SESSION['user_id'];
?>

<?php $qml ="select * from user where user_id= $user_id";
          $rest=mysqli_query($db, $qml); 
          $user_row=mysqli_fetch_array($rest);
              ?>

<?php
    if(isset($_POST['submit']))

    {
               
    if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['mobile']))
    {	
      echo "<script>alert('Opps fill the details!');</script>"; 
             
    }
    else
          {
 
            $image_tmp_name = $_FILES['file']['tmp_name'];
            $image_name = $_FILES['file']['name'];
            $target_file = 'uploads/' . basename($image_name);
            move_uploaded_file($image_tmp_name, $target_file);
            $image_name = basename($image_name);                     
            $sql = "UPDATE user SET name='{$_POST['name']}', email='{$_POST['email']}', mobile='{$_POST['mobile']}', profile='$image_name' WHERE user_id='$user_id'";
            echo $sql; // Check the query to see if it's formed correctly
            mysqli_query($db, $sql);
            move_uploaded_file($temp, $store); // Move the uploaded file to the desired location
            header("Location: dashboard.php"); // Redirect to the dashboard after the operation
            
                     echo "<script>alert('successfuly Updated !');</script>"; 
                      
            
	   
	   }

    }
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/style.css">
    <title>Profile</title>
    <style>
    .user-info {
        margin-left: 40px;
        overflow: hidden; /* Clear floats */
        
    }

    .user-details {
        float: left;
    }

    .profile-image {
        float: right;
    
    }

    .user-details p, .profile-image {
        margin: 0;
    }

    .user-info hr {
        clear: both;
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }

    .user-info strong {
        font-weight: bold;
    }
</style>


</head>
<body>
    
<?php include "header.php" ?>
<div class="user-info">
    <?php
    // Assuming you have already established a database connection and fetched the user data
    // $db is your mysqli database connection

    // Fetch user data from the database
    $sql = "SELECT * FROM user where user_id= $user_id";
    $result = mysqli_query($db, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='user-details'>";
            echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Mobile:</strong> " . $row["mobile"] . "</p>";
            echo "</div>";
            
            // Display the profile image to the right
            echo "<div class='profile-image'>";
            echo "<img src='./uploads/" . $row["profile"] . "' width='300' height='300'>";
            echo "</div>";
        
            echo "<div style='clear:both;'></div>"; // Clear floating elements
            echo "<hr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</div>


    <div class="Container profile d-flex justify-content-end align-items-center ">
        <div class="card me-4">
        <h3 class="card-title">Account</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Enter Name" name="name" value="<?php echo $user_row['name'];?>">
            <input type="email" placeholder="Enter Email" name="email" id="" value="<?php echo $user_row['email'];?>">
            <input type="number" placeholder="Enter Number" name="mobile" id="">
            <input type="file" name="file" id="">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
        </form>  
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
}
?>
</html>