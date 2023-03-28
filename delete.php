<?php 
include('connection.php');
if(isset($_GET['ad_id'])){
$ad_id=$_GET['ad_id'];
$delete=mysqli_query($conn,"DELETE from adversaries where ad_id='$ad_id'");
header('location:adversaries.php');
}
if(isset($_GET['ref_id'])){
$ref_id=$_GET['ref_id'];
$delete=mysqli_query($conn,"DELETE from referees where ref_id='$ref_id'");
header('location:referees.php');
}
if(isset($_GET['mt_id'])){
$mt_id=$_GET['mt_id'];
$delete=mysqli_query($conn,"DELETE from matches where mt_id='$mt_id'");
header('location:matches.php');
}



?>