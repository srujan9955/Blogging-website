<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
<?php include "header.php" ?>
<div class="container text-center mb-4 mt-2">
    <a href="#" class="btn btn-success">All</a>
    <a href="#" class="btn">Education</a>
    <a href="#" class="btn">News</a>
    <a href="#" class="btn">games</a>
    <a href="#" class="btn">Social</a>
    <a href="#" class="btn">Internet</a>
</div>

<div class="blog-card container d-flex gap-1">
<?php 
session_start();
    $qml ="SELECT * FROM blogs";
    $result=mysqli_query($db, $qml); 
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    ?>
    <a href="blog.php?blog_view=<?php echo $row['blog_id']; ?> " class="card">
        <div class="image">
            <img src="uploads/<?php echo $row['image']; ?>" alt="Blog image">
        </div>
        <div class="content">
        <h6><?php echo $row['category'];?></h6>
            <h4><?php echo $row['title'];?></h4>
            <p><?php echo $row['date'];?></p>
        </div>
    </a>
    <?php
}
} else {
  echo"<div>No Blogs</div>";
}
  ?>
    
</div>
<?php include "footer.php" ?>
</body>
</html>