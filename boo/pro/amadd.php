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
            <li><a href="membre.php">Amande</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Ajouter</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Amande</h3>
                <p class="text-muted">Ici vous ete capable de de creer une amande</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="id_association" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Motif</label>
                            <input type="text" class="form-control" name="raison" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">montant</label>
                            <input type="number" class="form-control" name="montant" min="100" required>
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        <a href="amande.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $raison=$_POST['raison'];
    $montant=$_POST['montant'];
    $id_association=$_POST['id_association'];   
    $rd = mysqli_fetch_row(mysqli_query($conn,"select count(*) from amande where raison ='$raison' and id_association='$id_association'")); 
    

        if($rd[0]>0)
        {
            echo "<script>alert(\"ce motif existedéjà \");
            window.location.href = \"amadd.php\";
            </script>";
        }else{
                
                $res=mysqli_query($conn,"INSERT INTO amande (raison,montant,id_association) 
                VALUES ('$raison','$montant','$id_association')");
            
                if ($res){
                    echo '<div class="alert alert-success" role="alert"><strong>Insertion des données validés!</strong></div>';
                    /*$reqmod="UPDATE association SET 
                    nbr_membre++;
                    WHERE id_association='$membre_asso'";*/
                }
                else{
                    echo '<div class="alert alert-danger" role="alert"><strong>Echec dInsertion des données!</strong></div>';
                }}
              }

    
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>