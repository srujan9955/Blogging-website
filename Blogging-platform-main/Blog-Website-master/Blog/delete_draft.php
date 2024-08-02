<?php
include("connection.php");
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM draft WHERE draft_id = '".$_GET['draft_del']."'");
header("location:show_draft.php");  

?>
