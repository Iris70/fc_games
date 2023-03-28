<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['u_name'])){
    header('location:index.php');
}
$u_name=$_SESSION['u_name'];
$user=mysqli_fetch_array(mysqli_query($conn,"SELECT * from  users where u_name='$u_name'"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.css">
    <script src="jquery.min.js"></script>
  
    <title>Document</title>
</head>

<body>
<script>
   $(document).ready(function(){
    $('#fer').on('click',function(e){
        e.preventDefault();
        $(this).css('width','999px').addClass('slide-lefts');

        // $('.close').hide();
  
    })

   }) 
    </script>

  
<!-- links (https://www.ferwafa.rw  for FERWAFA https://www.fifa.com for FIFA, https://www.moh.gov.rw for MINISANTE)  -->
<div class='flex-box wrapper'>
    <div class='left flex-box-item'>
        <div class='visit close'>
        <h2>Visit Also</h2>
        </div>
        <ul>
            <li><a href="https://www.ferwafa.rw">Ferwafa</a></li>
            <li class='close'><a href="https://www.fifa.rw">Fifa</a></li>
            <li class='close'><a href="https://www.moh.gov.rw">Moh</a></li>
        </ul>

    </div>
    <div class='middle flex-box-item close'>


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
    <table class='table'>
        <tr class='th-h'>
            <th>Username</th>
            <th>Update Username / password</th>
        </tr>
        <tr>
<td><?php echo $user['u_name'] ?></td>
<td><a href="update.php?user_id=<?php echo $user['user_id'] ?>">Update</a></td>
        </tr>
    </table>



    </div>

</div>




<div class='right flex-box-item close'>
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