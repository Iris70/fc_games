<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['u_name'])){
    header('location:index.php');
}
$u_name=$_SESSION['u_name'];
$user=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where u_name='$u_name'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.css">

    <script src="jquery.min.js"></script>
    <script src="bootstrap-5.0.2/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
    <script src="bootstrap-5.0.2/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <!-- <script>
        $(document).ready(function(){
            $('.modal').modal('show');
        })
    </script> -->
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
       if(isset($_POST['match'])){
        $date=$_POST['date'];
            $play_ground=$_POST['play_ground'];
            $ref_id=$_POST['ref_id'];
            $ad_id=$_POST['ad_id'];
            $user_id=$user['user_id'];
        $insert=mysqli_query($conn,"INSERT into matches values(null,'$date','$play_ground','$ref_id','$ad_id','$user_id')");
?>
 <div class='result bg-color-2'>
<span>Values inserted</span>
    </div>
<?php 

       }
       ?>
        <div class='modal' id='mymodal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
<h5>Insert Matches</h5>
<button type='button' class='btn-close' aria-label='Close' data-bs-dismiss='modal'></button>
                    </div>
                    <div class='modal-body'>
                        <form action="" method="post">

                <div class='form-group'>
                    <label for="" class='form-lable'>date</label>
                    <input type="date" name="date" id="" class='form-control'>

                </div>
                <div class='form-group'>
                    <label for="" class='form-lable'>play ground</label>
                    <input type="text" name="play_ground" id="" class='form-control'>

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
         

                    </div>

                    <div class='modal-footer'>
                        <button class='btn btn-secondary bg-color2 color1'  name='match' type='submit'>Insert</button>
                        <button class='btn btn-primary bg-secondary' data-bs-dismiss='modal'>Cancel</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
   
        <div class='table-wrapper'>
<div class='tr-hd p-2'>
<button class='btn w-25 bg-color2 color-1 my-2' data-bs-target='#mymodal' data-bs-toggle='modal'>New</button>
</div>

<table class='table'>
    <tr class='th-h'>
        <th>match id</th>
        <th>date</th>
        <th>playground</th>
        <th>referee</th>
        <th>adversary</th>
        <th>User</th>
        <th>Delete</th>
        <th>Update</th>
       
    </tr>
    <tr>
        <?php
        $result=mysqli_query($conn,"SELECT * from (( matches inner join referees on matches.ref_id=referees.ref_id) inner join adversaries on matches.ad_id=adversaries.ad_id)");
         
while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
        </tr>
        <td><?php echo  $row['mt_id']; ?></td>
        <td><?php echo  $row['date']; ?></td>
        <td><?php echo  $row['play_ground']; ?></td>
        <td><?php echo  $row['f_name']." ".$row['l_name']; ?></td>
        <td><?php echo  $row['name']; ?></td>
        <td>
            <?php
            $user_id=$row['user_id'];   
        $admin=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where user_id='$user_id'"));
        echo $admin['u_name'];
        
        ?></td>
        <td><a href="delete.php?mt_id=<?php echo  $row['mt_id']; ?>">Delete</a></td>
        <td><a href="update.php?mt_id=<?php echo  $row['mt_id']; ?>">Update</a></td>
    <?php 
}

?>
    </tr>

</table>
    

      </div>

            
    



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