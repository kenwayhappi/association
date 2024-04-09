<?php
    include ('navd.php');
    $complet=$_GET['complet'];
	$res=mysqli_query($conn,"SELECT * FROM cotisation where id_cotisation='$complet'");
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
                <h3>Modifier banque</h3>
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
                            <input type="text" class="form-control" name="id_banque" value="<?php echo $ligne['id_cotisation'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Montant</label>
                            <input type="number" class="form-control" name="montant" value="<?php echo $ligne['montant'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">taux</label>
                            <input type="number" class="form-control" name="taux" value="<?php echo $ligne['taux'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">date</label>
                            <input type="date" class="form-control" name="date_debut" value="<?php echo $ligne['date_debut'];?>" required>
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="cotisation.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $taux=$_POST['taux'];
    $montant=$_POST['montant'];
    $date_debut=$_POST['date_debut'];
    $id_association=$_POST['id_association'];   
    
            $reqmod="UPDATE cotisation SET 
            taux='$taux', montant='$montant',date_debut='$date_debut'
            WHERE id_association='$id_association'";
            $res=mysqli_query($conn,$reqmod);
            
            if ($res) {
                echo "<script>
                alert(\" banque modifier avec succes\");
                window.location.href = \"cotisation.php\";
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