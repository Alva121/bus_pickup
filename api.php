<?php
include "db.php";
$id=$_GET['id'];
$result=mysqli_query($conn,"select g_email as `pemail`,pickup as `location` from user where id='$id'");

echo json_encode(mysqli_fetch_assoc($result));

