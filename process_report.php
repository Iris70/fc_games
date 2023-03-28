<?php
include('connection.php');
include('fpdf/fpdf.php');
$p = new FPDF('L','mm','A4');
$p->AddPage();

$p->SetFont('Arial','B',20);
$p->SetMargins(20,10,20,10);
$p->Cell('20','10','');
$month=$_POST['month'];
if($month=='2022-01'){
    $month_name='January';
}

if($month=='2022-02'){
    $month_name='February';
}
if($month=='2022-03'){
    $month_name='March';
}
if($month=='2022-04'){
    $month_name='April';
}
if($month=='2022-05'){
    $month_name='May';
}
if($month=='2022-06'){
    $month_name='June';
}
if($month=='2022-07'){
    $month_name='July';
}
if($month=='2022-08'){
    $month_name='August';
}
if($month=='2022-09'){
    $month_name='September';
}
if($month=='2022-10'){
    $month_name='October';
}
if($month=='2022-11'){
    $month_name='November';
}
if($month=='2022-12'){
    $month_name='December';
}
$p->Cell('3','10','');
$p->Cell('240','10','Matches Monthly Report of '.$month_name,0,1,'C');
$p->Ln(10);
$p->SetFont('Arial','B',16);
$result=mysqli_query($conn,"SELECT * from (( matches inner join referees on matches.ref_id=referees.ref_id) inner join adversaries on matches.ad_id=adversaries.ad_id) where date like '$month%'") ;
if(mysqli_num_rows($result)>0){

$p->Cell('30','10','Matche Id',1,0);
$p->Cell('35','10','date',1,0);
$p->Cell('60','10','Play Ground',1,0);
$p->Cell('50','10','Referee Names',1,0);
$p->Cell('45','10','Adversary',1,0);
$p->Cell('30','10','user',1,1);
$p->SetFont('Arial','',12);
    while($row=mysqli_fetch_array($result)){
        $p->Cell('30','10',$row['mt_id'],1,0);
        $p->Cell('35','10',$row['date'],1,0);
        $p->Cell('60','10',$row['play_ground'],1,0);
        $p->Cell('50','10',$row['f_name']." ".$row['l_name'],1,0);
        $p->Cell('45','10',$row['name'],1,0);
        $user_id=$row['user_id']; 
        $admin=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where user_id='$user_id'"));
        $p->Cell('30','10',$admin['u_name'],1,1);
    }
}
else{
$p->Cell('100','10');
$p->SetFont('Arial','',12);
    $p->Cell('240','10','no matches in month of '.$month_name,0,1);
}

$p->Output();





?>