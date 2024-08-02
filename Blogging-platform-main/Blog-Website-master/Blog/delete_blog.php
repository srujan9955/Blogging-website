<?php
include("connection.php");
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM blogs WHERE blog_id = '".$_GET['blog_del']."'");
header("location:show_blog.php");  

?>
