<?php
require "../connexion.php";
require "fpdf.php";
if (isset($_POST['id_membre'])) {
    $id_association=$_POST['id_association'];
    $id_membre=$_POST['id_membre'];
    $date_amande = $_POST['date_amande'];
    $nom = $_POST['nom'];
    $prenom=$_POST['prenom'];
    $raison=$_POST['raison'];
    $date_regler= date('Y-m-d');
    $statut="payer";
    $image=$_FILES['txtphoto']['tmp_name'];
    $traget="../image/".$_FILES['txtphoto']['name'];
    move_uploaded_file($image,$traget);
    $res=mysqli_query($conn,"INSERT INTO regler (nom,prenom,raison,id_membre,id_association,date_amande,date_regler,photo,statut) 
                VALUES ('$nom','$prenom','$raison','$id_membre','$id_association','$date_amande','$date_regler','$traget','$statut')");
  }
    $req="SELECT * FROM regler where id_membre='$id_membre'";
    $reqa="SELECT * FROM association where id_association ='$id_association'";
	$resa=mysqli_query($conn,$reqa);
    $stmt = $conn->query($req);
while ($ligne=mysqli_fetch_assoc($stmt)){
    $pdf = new FPDF('p','mm','A4');
    $pdf -> AddPage ();
    if ($rows=mysqli_fetch_assoc($resa)){
    $pdf -> SetFont ('Arial','B',20);
   
    $pdf -> Cell(120,10,'Facture',0,0);
    $pdf -> Cell(69,10,'FIN DE COTISATION',0,1);
   
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
    $pdf -> Cell(100,5,'Information sur la cotisation',0,1);
   
    $pdf -> Cell(30,5,'id:',0,0);
    $pdf -> Cell(70,5,$ligne['id_membre'],0,1);
   
    $pdf -> Cell(30,5,'Nom :',0,0);
    $pdf -> Cell(70,5,$ligne['nom'],0,1);
   
    $pdf -> Cell(30,5,'raison :',0,0);
    $pdf -> Cell(70,5,$ligne['raison'],0,1);

    $pdf -> Cell(30,5,'Debut :',0,0);
    $pdf -> Cell(70,5,$ligne['date_amande'],0,1);

    $pdf -> Cell(30,5,'Fin :',0,0);
    $pdf -> Cell(70,5,$ligne['date_regler'],0,1);
    
    //-------------------------------//
    $pdf -> Cell(189,10,'',0,1);
   //-------------//
    $pdf -> SetFont ('Arial','B',12);
    
    $pdf -> Cell(130,10,'produit',1,0);
    $pdf -> Cell(59,10,$ligne['nom'],1,1,'C');
   
    $pdf -> SetFont ('Arial','B',12);
   
    $pdf -> Cell(130,10,'Prix Unitaire',1,0);
    $pdf -> Cell(59,10,$ligne['raison'],1,1,'C');
   
    $pdf -> Cell(130,10,'Quantite',1,0);
    $pdf -> Cell(59,10,$ligne['nom'],1,1,'C');
   
   //-------summary-------------------//
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Montant',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,2*2,1,1,'C');
   
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Tax',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,'3%',1,1,'C');
   
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Taxable',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,((2*2)*3)/100,1,1,'C');
   
    $pdf -> Cell(130,5,'',0,0);
    $pdf -> Cell(25,5,'Total',0,0);
    $pdf -> Cell(4,5,'$',1,0);
    $pdf -> Cell(30,5,((2*3))/100+2*3,1,1,'C');
   
    $pdf->Image($rows['photo'],18,130);
}}
    $pdf -> Output();
    ?>