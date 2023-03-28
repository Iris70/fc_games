<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['u_name'])){
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <script src='bootstrap-5.0.2/bootstrap-5.0.2/dist/js/bootstrap.js'></script>

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

if(isset($_POST['referees'])){
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $telephone=$_POST['telephone'];
    $error=array();

$select=mysqli_query($conn,"SELECT * from referees where f_name='$f_name' and l_name='$l_name'");

if(mysqli_num_rows($select)==1){
    array_push($error,"Referee arleady existed");
//     $_SESSION['u_name']=$u_name;
// header('location:adversaries.php');
}
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
    $insert=mysqli_query($conn,"INSERT into referees values(null,'$f_name','$l_name','$age','$sex','$telephone')");
    ?>
    <div class='result bg-color-2'>
<span>Values inserted</span>
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
           <div class='modal' id='mymodal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Insert Referees</h5>
                        
<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
          
                    <div class='modal-body'>
                        
                    <form action="" method="post" class='' id='myform'>

                        
                        <div class='form-group'>
                            <label for="" class='form-label'>fname</label>
                            <input type="text" name='f_name' class='form-control' required>
                    
                        </div>
                        <div class='form-group'>
                            <label for="" class='form-label'>lname</label>
                            <input type="text" name='l_name' class='form-control' required>
                    
                        </div>
               
                
                    <div class='form-group'>
                            <label for="" class='form-label'>Age</label>
                            <input type="number" name='age' class='form-control' required>
                    
                        </div>
                        <div class='form-group'>
                            <label for="" class='form-label d-block my-2'>sex</label>
                            <!-- <input type="number" name='age' class='form-control' required> -->
                            <input type="radio" name="sex" id="" value='male'><label for="" class='mx-2'>Male</label>
                            <input type="radio" name="sex" id="" value='female'><label for="" class='mx-2'>Female</label>
                    
                        </div>
                        <div class='form-group'>
                            <label for="" class='form-label'>Telephone</label>
                            <!-- <input type="number" name='age' class='form-control' required> -->
                            <input type="number" name="telephone" class='form-control'>
                    
                        </div>
                       

                    </div>
                    <div class='modal-footer'>
                    <button type="submit" name='referees' class='btn  w-25 bg-color2 color-1'>Insert</button>
                  <button type='button' data-bs-dismiss='modal' class='btn bg-secondary color-1'>Cancel</button>
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
        <th>ref id</th>
        <th>fname</th>
        <th>lname</th>
        <th>age</th>
        <th>sex</th>
        <th>telephone</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    <tr>
        <?php
        $result=mysqli_query($conn,"SELECT * from referees");
         
while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
        </tr>

        <td><?php echo  $row['ref_id']; ?></td>
        <td><?php echo  $row['f_name']; ?></td>
        <td><?php echo  $row['l_name']; ?></td>
        <td><?php echo  $row['age']; ?></td>
        <td><?php echo  $row['sex']; ?></td>
        <td><?php echo  $row['telephone']; ?></td>
        <td><a href="delete.php?ref_id=<?php echo  $row['ref_id']; ?>">Delete</a></td>
        <td><a href="update.php?ref_id=<?php echo  $row['ref_id']; ?>">Update</a></td>
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