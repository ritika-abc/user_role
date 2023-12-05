<?php
include "db.php";
 
$id = $_GET['id'];
$del = "DELETE FROM `user_role` WHERE `id`='$id'";
$query = mysqli_query($con, $del);

if ($query) {
    header("location:user_view.php");
}
