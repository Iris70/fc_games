<?php 
include('connection.php');
session_start();
?>
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
        <?php 

if(isset($_POST['login'])){
$u_name=$_POST['u_name'];
$u_password=$_POST['u_password'];
$select=mysqli_query($conn,"SELECT * from users where u_name='$u_name' and u_password='$u_password'");
if(mysqli_num_rows($select)==1){
    $_SESSION['u_name']=$u_name;
header('location:adversaries.php');
}
else{
    ?>
    <div class='result bg-color2'>
   <span>Wrong Username/password</span>
    </div>
    <?php 
}
}

?>
        <h2 class='hd-form'>Login Manager</h2>
<form action="" method="post" class='w-50'>
    <div class='form-group my-2'>
        <label for="" class='form-label'>Username</label>
        <input type="text" name='u_name' class='form-control' require>

    </div>
    <style>

    </style>
    <div class='form-group my-2'>
        <label for="" class='form-label'>Password</label>
        <input type="password" name='u_password' class='form-control' require>

    </div>
    <button type="submit" name='login'  class='btn  w-25 bg-color2 color-1' >Login</button>
    <span   class='w-25 color-2' ><a href="create_account.php" class='color-2'>Create Account</a></span>
</form>
        



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
        <a href="report.php" class=''>Report</a>
        <a href="users.php" class=''>My Account</a>

    </div>
<a href="logout.php?logout" class='logout'>Logout</a>
</div>

    </div>


    
</body>
</html>