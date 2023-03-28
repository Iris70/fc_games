<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['u_name'])){
    header('location:index.php');
}
$u_name=$_SESSION['u_name'];
$user=mysqli_fetch_array(mysqli_query($conn,"SELECT * from  users where u_name='$u_name'"));

?>
<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
  
    <title>Document</title>
</head>
<body>
<!-- links (https://www.ferwafa.rw  for FERWAFA https://www.fifa.com for FIFA, https://www.moh.gov.rw for MINISANTE)  -->
<div class='flex-box wrapper'>
    <div class='left flex-box-item'>
        <div class='visit'>
        <h2>Visit Also</h2>
        </div>
        <ul>
            <li><a href="https://www.ferwafa.rw">Ferwafa</a></li>
            <li><a href="https://www.fifa.rw">Fifa</a></li>
            <li><a href="https://www.moh.gov.rw">Moh</a></li>
        </ul>

    </div>
    <div class='middle flex-box-item'>


<h1 class='hd  color-1'>FC Kaine</h1>

<div class='staff'>

    <div class='rows'>
        <span> President: </span><span>Jeff MUHINYUZA</span>
</div>
<div class='rows'>
<span> Captain:  </span><span>Rico Pie</span>

</div>
<div class='rows'>
<span> Accountant:  </span><span>Monday Chrito</span>

</div>
<div class='rows'>
<span> Secretary:  </span><span>Jeanne KAYITERA</span>
</div>
<div class='rows'>
<span> Manager:  </span><span>Dreck GATO</span>
</div>

    </div>

    <div class='contents'>
        <!-- update user -->

<?php 
if(isset($_GET['user_id'])){
       ?>
        <form action="" method="post" class='w-50' id='myform'>

                        
<div class='form-group'>
    <label for="" class='form-label'>Username</label>
    <input type="text" name='u_name' value='<?php echo $user['u_name'] ?>' class='form-control'>
    <input type="number" name='user_id' value='<?php echo $user['user_id'] ?>' class='form-control' hidden>

</div>
<div class='form-group'>
    <label for="" class='form-label'>Old Password</label>
    <input type="password" name='old_password' value='' class='form-control' >

</div>
<div class='form-group'>
    <label for="" class='form-label'>New Password</label>
    <input type="password" name='new_password' value='' class='form-control' >

</div>
<button type='submit' name='user_update' class='btn bg-color2 color-1 my-2'>Update</button>
</form>
       <?php 
}
if(isset($_POST['user_update'])){
    $u_name=$_POST['u_name'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $user_id=$_POST['user_id'];
    $select_pw=mysqli_query($conn,"SELECT * from users where u_password='$old_password' and user_id='$user_id'");
    if(mysqli_num_rows($select_pw)==1){

         $update=mysqli_query($conn,"UPDATE `users` SET `u_name` = '$u_name', `u_password` = '$new_password' WHERE `users`.`user_id` = '$user_id';");            // header('location:users.php');
        //         if($u_name==$user['u_name']){
header('location:users.php');
//         }
//         else{
//          $update=mysqli_query($conn,"UPDATE `users` SET `u_name` = '$u_name', `u_password` = '$new_password' WHERE `users`.`user_id` = '$user_id';")
//          header('location:users.php');
//         }

    }
    else{
        // header('location:users.php');
        ?>
        <div class='result bg-color2 p-2 color-1'>
<span>Wrong Old Password</span>
        </div>
        <?php 
    }
  

}


?>





        <!-- end update update user -->
        <!-- update ad -->
        
        <?php 
        if(isset($_GET['ad_id'])){
            $ad_id=$_GET['ad_id'];
            $adversaries=mysqli_fetch_array(mysqli_query($conn,"SELECT * from adversaries where ad_id='$ad_id'"));

            ?>
 <h2 class='hd-form'>Update Adversary: <?php echo $adversaries['name'] ?></h2>
    <form action="" method="post" class='w-50' id='myform'>

<div class='form-group'>
    <label for="" class='form-label'>adversaries name</label>
    <input type="number" name="ad_id" id="" value="<?php echo $adversaries['ad_id'] ?>" hidden>
    <input type="text" name='name' class='form-control' value='<?php echo $adversaries['name'] ?>' required>
    
</div>
<button type="submit" name='u_adversaries'  style='background-color:red;color:white' class='my-2 btn  w-25 bg-color2 color-1' >Update</button>

            <?php
           
        }
        if(isset($_POST['u_adversaries'])){
            $ad_id=$_POST['ad_id'];
            $name=$_POST['name'];
            $update=mysqli_query($conn,"UPDATE  adversaries set name='$name' where ad_id='$ad_id'");
            header('location:adversaries.php');
        }
        ?>

    

        <!-- end upd ad -->

        <!-- start update ref -->

  <?php 
if(isset($_GET['ref_id'])){
    $ref_id=$_GET['ref_id'];
    $referees=mysqli_fetch_array(mysqli_query($conn,"SELECT * from referees where ref_id='$ref_id'"));

?>
     <h2 class='hd-form' style='width:500px'>Update referee: <?php echo $referees['f_name']." ".$referees['l_name'] ?></h2>
     
        <form action="" method="post" class='' id='myform'>

                        
<div class='form-group'>
    <label for="" class='form-label'>fname</label>
    <input type="text" name='f_name' value='<?php echo $referees['f_name'] ?>' class='form-control'>
    <input type="number" name='ref_id' value='<?php echo $referees['ref_id'] ?>' class='form-control' hidden>

</div>
<div class='form-group'>
    <label for="" class='form-label'>lname</label>
    <input type="text" name='l_name' value='<?php echo $referees['l_name'] ?>' class='form-control' >

</div>


<div class='form-group'>
    <label for="" class='form-label'>Age</label>
    <input type="number" name='age' class='form-control'  value="<?php echo $referees['age'] ?>">

</div>
<div class='form-group'>
    <label for="" class='form-label d-block my-2'>sex</label>
    <!-- <input type="number" name='age' class='form-control' required> -->
    <?php 
if($referees['sex']=='male'){
    ?>
  <input type="radio" name="sex" id="" value='male' checked>
    <label for="" class='mx-2'>Male</label>
  <input type="radio" name="sex" id="" value='female' >
    <label for="" class='mx-2'>female</label>
    <?php 
}
if($referees['sex']=='female'){
    ?>
  <input type="radio" name="sex" id="" value='male'>
    <label for="" class='mx-2'>Male</label>
  <input type="radio" name="sex" id="" value='female' checked>
    <label for="" class='mx-2'>Female</label>
    <?php 
}

?>

</div>
<div class='form-group'>
    <label for="" class='form-label'>Telephone</label>
    <!-- <input type="number" name='age' class='form-control' required> -->
    <input type="number" name="telephone"  class='form-control' value="<?php echo $referees['telephone'] ?>">

</div>
<button type="submit" name='u_referees' class='btn  w-25 bg-color2 color-1 my-2'>Update</button>
<?php
}
 

if(isset($_POST['u_referees'])){
    $ref_id=$_POST['ref_id'];
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $telephone=$_POST['telephone'];
    $error=array();

if((!preg_match('/^[a-zA-Z ]*$/',$f_name)) or (!preg_match('/^[a-zA-Z ]*$/',$l_name))){
    array_push($error,"only letters required"); 
}
if($age<18){
    array_push($error,"Must be above 18");
}
if(!preg_match('/^07/',$telephone)){
    array_push($error,"Phone number must start with 07");
}
if(strlen(strval($telephone))!=10){
    array_push($error,'Phone number must have 10 digits');
}
if(count($error)==0){
    $update=mysqli_query($conn,"UPDATE `referees` SET `f_name` = '$f_name', `l_name` = '$l_name', `age` = '$age', `sex` = '$sex', `telephone` = '$telephone' WHERE `referees`.`ref_id` = '$ref_id';");
    header('location:referees.php');
    ?>
    <div class='result bg-color-2'>
<span>Values Updated</span>
    </div>
    <?php 

}
if(count($error)!=0){
    foreach($error as $item){
        ?>
        <div class='result bg-color2'>
    <?php echo $item ?>
        </div>
        <?php
    
}


}
}

  ?>
        <!-- end update ref -->
        <!-- start update ref -->

  <?php 
if(isset($_GET['mt_id'])){
    $mt_id=$_GET['mt_id'];
    $matches=mysqli_fetch_array(mysqli_query($conn,"SELECT * from (( matches inner join referees on matches.ref_id=referees.ref_id) inner join adversaries on matches.ad_id=adversaries.ad_id) where matches.mt_id='$mt_id'
    "));

?>
     <h2 class='hd-form' style='width:500px'>Update your match with: <?php echo $matches['name']?></h2>
     
        <form action="" method="post" class=''>
    
<div class='form-group'>
    <label for="" class='form-lable'>date</label>
    <input type="date" name="date" id="" value="<?php echo $matches['date'] ?>" class='form-control'>
    <input type="number" name="mt_id" id="" value="<?php echo $matches['mt_id'] ?>" class='form-control' hidden>

</div>
<div class='form-group'>
    <label for="" class='form-lable'>play ground</label>
    <input type="text" name="play_ground" id="" value="<?php echo $matches['play_ground'] ?>" class='form-control'>

</div>
<div class='form-group'>
    <label for="" class='form-label'>referee</label>
   <select name="ref_id" id="" class='form-select'>
    <?php 
    
$result=mysqli_query($conn,"SELECT * from  referees");
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['ref_id'] ?>"><?php echo $row['f_name']." ".$row['l_name'] ?></option>
<?php 
}

?>
    
   </select>

</div>
<div class='form-group'>
    <label for="" class='form-label'>adversaries</label>
   <select name="ad_id" id="" class='form-select'>
    <?php 
    
$result=mysqli_query($conn,"SELECT * from  adversaries");
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['ad_id'] ?>"><?php echo $row['name']?></option>
<?php 
}

?>
    
   </select>

</div>

                        

<button type="submit" name='u_matches' class='btn  w-25 bg-color2 color-1 my-2'>Update</button>
</form>
<?php
}
 

if(isset($_POST['u_matches'])){
    $mt_id=$_POST['mt_id'];
    $play_ground=$_POST['play_ground'];
    $ref_id=$_POST['ref_id'];
    $ad_id=$_POST['ad_id'];
    $date=$_POST['date'];
$error=array();
    // $user_id=$user['user_id'];
  
if(count($error)==0){
    $update=mysqli_query($conn,"UPDATE `matches` SET `date` = '$date', `play_ground` = '$play_ground', `ref_id` = '$ref_id', `ad_id` = '$ad_id' WHERE `matches`.`mt_id` = '$mt_id';");
    header('location:matches.php');
    ?>
    <div class='result bg-color-2'>
<span>Values Updated</span>
    </div>
    <?php 

}
if(count($error)!=0){
    foreach($error as $item){
        ?>
        <div class='result bg-color2'>
    <?php echo $item ?>
        </div>
        <?php
    
}


}
}

  ?>
        <!-- end update ref -->

    </div>

</div>




<div class='right flex-box-item'>
    <div class='announcements'>
    <h2>Announcement</h2>
    <p>Match between KAINE FC Vs Gasabo Veterans at Nyamirambo Play ground on 1st  september 2022.</p>
    </div>
    <div class='navs'>
        <a href="adversaries.php" class=''>adversaries</a>
        <a href="referees.php" class=''>referees</a>
        <a href="adversaries.php" class=''>adversaries</a>
        <a href="matches.php" class=''>Matches</a>
        <a href="users.php" class=''>My Account</a>

    </div>
<a href="logout.php?logout" class='logout'>Logout</a>
</div>

    </div>


    
</body>
</html>