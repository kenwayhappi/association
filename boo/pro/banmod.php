<?php
    include ('navd.php');
    $complet=$_GET['complet'];
	$res=mysqli_query($conn,"SELECT * FROM banque where id_banque='$complet'");
    if($ligne=mysqli_fetch_assoc($res)){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="membre.php">Banque</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Modifier</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Amande</h3>
                <p class="text-muted">Ici vous ete capable de de Modifier les information une banque</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="id_association" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">Id unique de la banque</label>
                            <input type="text" class="form-control" name="id_banque" value="<?php echo $ligne['id_banque'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $ligne['nom'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">montant</label>
                            <input type="number" class="form-control" name="somme" value="<?php echo $ligne['somme'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">photo</label>
                            <input type="file" class="form-control" name="txtphoto" value="<?php echo $ligne['photo'];?>" required>
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="banque.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $nom=$_POST['nom'];
    $id_banque=$_POST['id_banque'];
    $somme=$_POST['somme'];
    $id_association=$_POST['id_association'];   
    $rd = mysqli_fetch_row(mysqli_query($conn,"select count(*) from banque where nom ='$nom'")); 
    $image=$_FILES['txtphoto']['tmp_name'];

    $traget="../image/".$_FILES['txtphoto']['name'];

    move_uploaded_file($image,$traget);
    

    
            $reqmod="UPDATE banque SET 
            nom='$nom', somme='$somme',photo='$traget'
            WHERE id_banque='$id_banque'";
            $res=mysqli_query($conn,$reqmod);
            
            if ($res) {
                echo "<script>
                alert(\" banque modifier avec succes\");
                window.location.href = \"banque.php\";
            </script>";
            }else{
                    echo '<div class="alert alert-danger" role="alert"><strong>Echec des modification données!</strong></div>';
                }}
              }    
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>