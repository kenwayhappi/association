<?php
    include ('navd.php');
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
            <li><a href="cotisation.php">cotisation</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Ajouter</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New cotisation</h3>
                <p class="text-muted">Ici vous ete capable d'ajouter une cotisation</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="id_association" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">date_debut</label>
                            <input type="date" class="form-control" name="date_debut"  readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">TAUX</label>
                            <input type="number" class="form-control" name="taux" min="0" max="100" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">montant</label>
                            <input type="number" class="form-control" name="montant" min="100" required>
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        <a href="cotisation.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $taux=$_POST['taux'];
    $date_debut=$_POST['date_debut'];
    $montant=$_POST['montant'];
    $id_association=$_POST['id_association'];   
    
                
                $res=mysqli_query($conn,"INSERT INTO cotisation (date_debut,taux,montant,id_association) 
                VALUES ('$date_debut','$taux','$montant','$id_association')");
            
                if ($res){
                    echo "<script>
                    alert(\"cotisation Ajouté \");
                    window.location.href = \"cotisation.php\";
                 </script>";
                }
                else{
                    echo "<script>
                    alert(\"echec Ajouté \");
                    window.location.href = \"addco.php\";
                 </script>";
                }}

    
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>