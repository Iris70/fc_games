<?php 
include('connection.php');
if(isset($_POST['adversaries_name'])){
    $adversaries_name=$_POST['adversaries_name'];
    $error=array();
    $select=mysqli_query($conn,"SELECT * from adversaries where name='$adversaries_name'");

    if(mysqli_num_rows($select)==1){
        array_push($error,"adversaries already Existed");
    }
    if(count($error)==0){
        $insert=mysqli_query($conn,"INSERT into adversaries values(null,'$adversaries_name')");
        echo 'values Inserted';

    }
    if(count($error)!=0){
        foreach($error as $item){
            echo $item;
        }
    }

}


?>