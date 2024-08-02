
<?php
include("connection.php");
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
?>
	<div class="header shadow mb-4">
    <nav>
        <div class="logo">Blog</div>
        <div class="nav">
            <a class="btn" href="home.php">Home</a>
            <a class="btn" href="blogs.php">Blogs</a>
            <a class="btn btn-outline-primary text-black" href="login.php">sign In</a>
            <a class="btn btn-warning" href="login.php">Create Blogs</a>

</div>
        </div>
    </nav>
</div>
<?php
}
else
{
?>
<div class="header shadow mb-4">
    <nav>
        <div class="logo">Blog</div>
        <div class="nav">
            <a class="btn" href="home.php">Home</a>
            <a class="btn" href="blogs.php">Blogs</a>
            <a class="btn" href="dashboard.php">Dashboard</a>
            <a class="btn" href="logout.php">Logout</a>
</div>
        </div>
    </nav>
</div>
<?php
}
?>