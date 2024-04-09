<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
    $complet=$_GET['complet'];
	$res=mysqli_query($conn,"SELECT * FROM banque where id_banque='$complet'");
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
            <li><a href="banque.php">banque</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Supprimer</a></li>
        </ul>
        <?php
            $reqdelete="DELETE FROM banque where id_banque='$complet'";
            $res=mysqli_query($conn,$reqdelete);
        }
        if ($res) {
            echo "<script>
                alert(\" banque effacer avec succes\");
            window.location.href = \"banque.php\";
            </script>"; 
        }else{
            echo "<label style='text-align:center;color: #0960406;'>La suppression a échouée...</label>";
        
    } ?>