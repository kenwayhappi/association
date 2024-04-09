<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: ../login.php");
}
    $complet=$_GET['complet'];
    $req="SELECT * FROM association
    where id_association='$complet'";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
    if($ligne=mysqli_fetch_assoc($res)){
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <h1 class="title"><?php echo $ligne['nom'];?></h1>
        <ul class="breadcrumbs">
            <li><a href="asso.php">Associations</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Supprimer</a></li>
        </ul>
        <?php
            // Supprimez d'abord les enregistrements de toutes les tables liées à l'ID de l'association
            $tables_a_supprimer = ["amande", "membres", "amandem", "notifications", "banque", "modpa", "cotisation", "message"]; // Remplacez par le nom des tables concernées
            foreach ($tables_a_supprimer as $table) {
                $sql = "DELETE FROM $table WHERE id_association ='$complet'";
                $rest=mysqli_query($conn,$sql);   
            }
        if ($rest) {
            echo "<label style='text-align:center;color: #0960406;'>La suppression a été correctement effectuée...</label>";
            $reqdelete="DELETE FROM association where id_association='$complet'";
            $res=mysqli_query($conn,$reqdelete);
        }else{
            echo "<label style='text-align:center;color: #0960406;'>La suppression a échouée...</label>";
        }
    } ?>