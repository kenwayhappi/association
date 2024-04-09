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
    <h1 class="title"><?php
	echo $ligne['nom'];?></h1>
        <ul class="breadcrumbs">
            <li><a href="asso.php">Associations</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Modifier</a></li>
        </ul>
        <div class="container">
            <div class="text-center mb-4">
                <h3>Update Association</h3>
                <p class="text-muted">Ici vous ete capable de gérer tout les association</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Id unique de l'association</label>
                            <input type="text" class="form-control" name="IAD" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Nom de l'assocation</label>
                            <input type="text" class="form-control" name="na" value="<?php echo $ligne['nom'];?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Nom du responsable</label>
                            <input type="text" class="form-control" name="nra" value="<?php echo $ligne['responsable'];?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Email</label>
                            <input type="mail" class="form-control" name="mail" value="<?php echo $ligne['email'];?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Numero</label>
                            <input type="number" class="form-control" name="telephone" value="<?php echo $ligne['telephone'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3"> 
                        <div class="col">
                            <label for="form-labe">Mot de passe</label>
                            <input type="password" class="form-control" name="mdp" value="<?php echo $ligne['mdp'];?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">confirmer</label>
                            <input type="password" class="form-control" name="cmdp" value="<?php echo $ligne['mdp'];?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Image</label>
                            <input type="file" class="form-control" name="photo" id="photo" value="<?php echo $ligne['photo'];?>">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label >Type :</label>
                        <input type="radio" class="form-check-input" name="type"value="<?php echo $ligne['type_association'];?>" required>
                        <label for="tontine" class="form-input-label">tontine</label>
                        <input type="radio" class="form-check-input" name="type" value="<?php echo $ligne['type_association'];?>" required>
                        <label for="Syndicat" class="form-input-label" required>Syndicat</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="asso.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{
    $length = 6; 
    $randomBytes = random_bytes($length);
    $id_association = bin2hex($randomBytes);
    $nom=$_POST['na'];
    $mdp=$_POST['mdp'];
    $cmdp=$_POST['cmdp'];
    $email=$_POST['mail'];
    $telephone=0;
    $modification = date('Y-m-d');
    $description="dsqd";
    $responsable=$_POST['nra'];
    $type=$_POST['type'];
    $co=0;
    $statut="dqsd";
    $nbm=0;      
    $image=$_FILES['photo']['tmp_name'];

    $traget="../image/".$_FILES['photo']['name'];

    move_uploaded_file($image,$traget);

            if($mdp!=$cmdp)
            {echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';}
           else
            {
                $reqmod="UPDATE association SET 
                nom='$nom',type_association='$type', mdp='$mdp', email='$email', telephone='$telephone', 
                description_A='$description', modification='$modification',
                responsable='$responsable',id_association ='$id_association',cotisation='$co',photo='$traget'
                WHERE id_association='$complet'";


             $res=mysqli_query($conn,$reqmod);

             if ($res){
               // header("location: asso.php?msg=Modifcation des données validés");
               echo '<div class="alert alert-success" role="alert"><strong>Modification des données Validé!</strong></div>';
            }else{
                echo '<div class="alert alert-danger" role="alert"><strong>Echec Modification des données!</strong></div>';
             }}
            }
        }?> 
                </form>
            </div>
        </div>
    </main>
</body>
</html>