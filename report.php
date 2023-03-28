<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
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
    <h2 class='hd-form'>Generate Monthly report</h2>
    <div class='hd-report bg-secondary  p-1'>
        <form action="process_report.php" method="post" >
        <input type="month" name="month" class='form-control w-50 d-inline mx-5' id="">
<button name='report' class='btn bg-color2 color-1 mx-2'>Report</button>
        </form>

    </div>




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