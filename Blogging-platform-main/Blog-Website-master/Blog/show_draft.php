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
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
<?php include "header.php" ?>
    <div class="dashboard">
        <div class="menu card">
            <div class="card-header mt-2 p-4">
                <h4>Blog Website</h4>
            </div>
            <div class="card-body">
            <a class="btn border-bottom" href="profile.php">Account</a>
                <a class="btn border-bottom" href="dashboard.php">Dashboard</a>
                <a class="btn border-bottom" href="show_blog.php">All Blogs</a>
                <a class="btn " href="show_draft.php">Draft Blogs</a>
            </div>
        </div>
        
         <div class="container show-blog-content">
            <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-center">Draft Blogs</h4>
                                </div>

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S.No</th>
                                                <th>title</th>
                                                <th>Date</th>
                                                <th>options</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                    <?php
                                        $sql="SELECT * FROM draft order by draft_id desc";
                                        $query=mysqli_query($db,$sql);
                                
                                        if(!mysqli_num_rows($query) > 0 )
                                        {
                                            echo '<td colspan="11"><center>No Blogs</center></td>';
                                        }
                                        else
                                            {				
                                                while($rows=mysqli_fetch_array($query))
                                                        {
                                                                $mql="select * from draft where draft_id='".$rows['draft_id']."'";
                                                                $newquery=mysqli_query($db,$mql);
                                                                $fetch=mysqli_fetch_array($newquery);
                                                                
                                                                
                                                                    echo '<tr><td>'.$fetch['draft_id'].'</td>
                                                                    
                                                                                <td>'.$rows['title'].'</td>
                                                                                <td>'.$rows['date'].'</td>
                                                                            
                                                                                     <td>
                                                                                     <a href="draft_view.php?draft_view='.$rows['draft_id'].'" class="btn btn-outline-success">view</a>
                                                                                     <a href="update_draft.php?draft_upd='.$rows['draft_id'].'" class="btn btn-outline-warning" >update</i></a>
                                                                                     <a href="delete_draft.php?draft_del='.$rows['draft_id'].'" class="btn btn-outline-danger">delete</a> 
                                                                                    </td></tr>';
          
                                                        }	
                                            }
                                    ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                </div>
            </div>
    </div>
    <?php include "footer.php" ?>
</body>
<?php
}
?>
</html>