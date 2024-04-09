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
            <li><a href="banque.php">Mod</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Ajouter</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Mod</h3>
                <p class="text-muted">Ici vous ete capable d'ajouter un Mode de paiement</p>
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
                            <label for="form-labe">Nom</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Image</label>
                            <input type="file" class="form-control" name="txtphoto" id="photo">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="paiement.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $nom=$_POST['nom'];
    $id_association=$_POST['id_association'];   
    $rd = mysqli_fetch_row(mysqli_query($conn,"select count(*) from banque where nom ='$nom'")); 
    $image=$_FILES['txtphoto']['tmp_name'];

    $traget="../image/".$_FILES['txtphoto']['name'];

    move_uploaded_file($image,$traget);
    

        if($rd[0]>0)
        {
            echo "<script>alert(\"ce mod existe déjà \");
            window.location.href = \"paiementadd.php\";
            </script>";
        }else{
                $res=mysqli_query($conn,"INSERT INTO modpa (nom,id_association,photo) 
                VALUES ('$nom','$id_association','$traget')");
            
                if ($res){
                    echo "<script>alert(\"Mod creer avec succes \");
                     window.location.href = \"paiement.php\";
                    </script>";
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