<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
    $complet=$_GET['complet'];
	$res=mysqli_query($conn,"SELECT * FROM modpa where id_mo='$complet'");
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
            <li><a href="paiement.php">Mod</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Supprimer</a></li>
        </ul>
        <?php
            $res=mysqli_query($conn,"DELETE FROM modpa where id_mo='$complet'");
        }
        if ($res) {
            echo "<script>
                alert(\" Mod effacer avec succes\");
            window.location.href = \"paiement.php\";
            </script>"; 
        }else{
            echo "<label style='text-align:center;color: #0960406;'>La suppression a échouée...</label>";
        
    } ?>