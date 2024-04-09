<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
    $complet=$_GET['complet'];
    $req="SELECT * FROM amande
    where id_amande='$complet'";
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
    <h1 class="title"><?php echo $ligne['raison'];?></h1>
        <ul class="breadcrumbs">
            <li><a href="amande.php">Amande</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Supprimer</a></li>
        </ul>
        <?php
            $reqdelete="DELETE FROM amande where id_amande='$complet'";
            $res=mysqli_query($conn,$reqdelete);
        }
        if ($res) {
            echo "<script>
                alert(\" Amande effacer avec succes\");
            window.location.href = \"amande.php\";
            </script>"; 
        }else{
            echo "<label style='text-align:center;color: #0960406;'>La suppression a échouée...</label>";
        
    } ?>