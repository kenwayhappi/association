<?php
require "../connexion.php";
require "fpdf.php";
$complet=$_GET['complet'];
    $req="SELECT * FROM regler where id_regler='$complet'";
    $stmt = $conn->query($req);
while ($ligne=mysqli_fetch_assoc($stmt)){
    $pdf = new FPDF('p','mm','A4');
    $pdf -> AddPage ();
    $id_membre = $ligne['id_membre'];
    $id_association = $ligne['id_association'];
    $res=mysqli_query($conn,"INSERT INTO notifications(messagen,id_membre,id_association,date_no) values(\"Vous  amande retiré\",'$id_membre','$id_association',NOW())");
    mysqli_query($conn,"DELETE FROM amandem where id_membre='$id_membre'");
    if($res){
        mysqli_query($conn,"UPDATE  membres SET statut='Normal' WHERE id_membre='$id_membre'");
        mysqli_query($conn,"UPDATE  regler SET statut='regler' WHERE id_membre='$id_membre'");}
    $a = $ligne['id_association'];
    $resa= mysqli_query($conn,"SELECT * FROM association where id_association='$a'");
    if ($rows=mysqli_fetch_assoc($resa)){
    $pdf -> SetFont ('Arial','B',20);
   
    $pdf -> Cell(120,10,'Facture',0,0);
    $pdf -> Cell(69,10,'Reglement Amande',0,1);
   
    $pdf -> SetFont ('Arial','',12);
   
    $pdf -> Cell(120,5,'',0,0);
    $pdf -> Cell(69,5,'',0,1);
    $pdf -> Cell(25,5,'Association :',0,0);
    $pdf -> Cell(95,5,$rows['nom'],0,0);
    $pdf -> Cell(30,5,'date',0,0);
    $pdf -> Cell(39,5,$date= DATE('d / m / Y'),0,1);
   
    $pdf -> Cell(28,5,'responsable :',0,0);
    $pdf -> Cell(92,5,$rows['responsable'],0,0);
    $pdf -> Cell(30,5,'adresse',0,0);
    $pdf -> Cell(39,5,$rows['email'],0,1);
   
    $pdf -> Cell(20,5,'Numero :',0,0);
    $pdf -> Cell(100,5,$rows['telephone'],0,0);
    $pdf -> Cell(30,5,'',0,0);
    $pdf -> Cell(39,5,'',0,1);
   
   //-------------------------------//
    $pdf -> Cell(189,10,'',0,1);
     $pdf -> SetFont ('Arial','B',12);
   //-------------//
    $pdf -> Cell(100,5,'Information sur le membre',0,1);
   
    $pdf -> Cell(30,5,'Nom:',0,0);
    $pdf -> Cell(70,5,$ligne['nom'],0,1);
   
    $pdf -> Cell(30,5,'Prenom :',0,0);
    $pdf -> Cell(70,5,$ligne['prenom'],0,1);
   
    $pdf -> Cell(30,5,'Raison :',0,0);
    $pdf -> Cell(70,5,$ligne['raison'],0,1);

    $pdf -> Cell(30,5,'Debut :',0,0);
    $pdf -> Cell(70,5,$ligne['date_amande'],0,1);

    $pdf -> Cell(30,5,'Fin :',0,0);
    $pdf -> Cell(70,5,$ligne['date_regler'],0,1);
    
    //-------------------------------//
    $pdf -> Cell(189,10,'',0,1);
   //-------------//
    $pdf -> SetFont ('Arial','B',12);
    
    $pdf -> Cell(130,10,'NOM',1,0);
    $pdf -> Cell(59,10,$ligne['nom'],1,1,'C');
   
    $pdf -> SetFont ('Arial','B',12);
   
    $pdf -> Cell(130,10,'Raison',1,0);
    $pdf -> Cell(59,10,$ligne['raison'],1,1,'C');
   
    $pdf -> Cell(130,10,'statut',1,0);
    $pdf -> Cell(59,10,$ligne['statut'],1,1,'C');
   
   //-------summary-------------------//
    $pdf -> Cell(130,5,'',0,0);
   /* $pdf -> Cell(25,5,'Montant',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,2*2,1,1,'C');
   
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Tax',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,'3%',1,1,'C');
   
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Taxable',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,((2*2)*3)/100,1,1,'C');*/
   
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Total',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,((2*3))/100+2*3,1,1,'C');
   
    $pdf->Image($ligne['photo'],18,130);
}}
    $pdf -> Output();
    ?>