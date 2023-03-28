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
    <script src="jquery.min.js"></script>

    <script src="bootstrap-5.0.2/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="styles.css">
  
    <title>Document</title>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('#myform').on('submit',function(e){
                e.preventDefault();
                var adversaries_name=$('input[name="adversaries_name"]').val();
                $.post('insert.php',{adversaries_name:adversaries_name},function(data){
                    // alert(data);
                    $('.slide-left').html(data).animate({'left':'1100px'},{
                        duration:3000,
                        complete:function(){
    
                            $('.modal').modal('hide');
                            $('.slide-left').hide();
                            window.location='adversaries.php';
                        }
                    })
                })

            })
        })
    </script>
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
        <div class='slide-left'>this is the output</div>
        <div class='modal' id='mymodal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Insert adversaries</h5>
                        
<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                    <form action="" method="post" class='' id='myform'>

    <div class='form-group'>
        <label for="" class='form-label'>adversaries name</label>
        <input type="text" name='adversaries_name' class='form-control' required>

    </div>


                    </div>
                    <div class='modal-footer'>

                    <button type="submit" name='adversaries'  class='btn  w-25 bg-color2 color-1' >Insert</button>
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
        <th>adversaries id</th>
        <th>name</th>
        <th>delete</th>
        <th>Update</th>
    </tr>
    <tr>
        <?php
        $result=mysqli_query($conn,"SELECT * from adversaries");
         
while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
        </tr>
        <td><?php echo  $row['ad_id']; ?></td>
        <td><?php echo  $row['name']; ?></td>
        <td><a href="delete.php?ad_id=<?php echo  $row['ad_id']; ?>">Delete</a></td>
        <td><a href="update.php?ad_id=<?php echo  $row['ad_id']; ?>">Update</a></td>
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