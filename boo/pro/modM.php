<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
    $complet=$_GET['complet'];
    $req="SELECT * FROM membres
    where id_membre='$complet'";
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
            <li><a href="membre.php">membre</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Modifier</a></li>
        </ul>
        <div class="container">
            <div class="text-center mb-4">
                <h3>Update Membre</h3>
                <p class="text-muted">Ici vous ete capable de m'être a jour les information d'un membre</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Id unique du membre</label>
                            <input type="text" class="form-control" name="id_membre" value="<?php echo $ligne['id_membre'] ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="membre_asso" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Nom du membre</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $ligne['nom'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Prenom</label>
                            <input type="text" class="form-control" name="prenom" value="<?php echo $ligne['prenom'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Numero</label>
                            <input type="number" class="form-control" name="numero_telephone" value="<?php echo $ligne['numero_telephone'] ?>">
                        </div>
                        <div class="col">
                            <label for="form-labe">Email</label>
                            <input type="mail" class="form-control" name="mail" value="<?php echo $ligne['adresse'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3"> 
                        <div class="col">
                            <label for="form-labe">Mot de passe</label>
                            <input type="password" class="form-control" name="mdp" value="<?php echo $ligne['mdp'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">confirmer</label>
                            <input type="password" class="form-control" name="cmdp"  value="<?php echo $ligne['mdp'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Image</label>
                            <input type="file" class="form-control" name="photo" id="photo" value="<?php echo $ligne['photo'] ?>" required>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="membre.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $id_membre = $ligne['id_membre'];
    $nom=$_POST['nom'];
    $mdpe=$_POST['mdp'];
    $mdp=hash('sha256',$mdpe);
    $cmdp=$_POST['cmdp'];
    $email=$_POST['mail'];
    $telephone=$_POST['numero_telephone'];
    $modification = date('Y-m-d');
    $prenom=$_POST['prenom'];
    $membre_asso=$_POST['membre_asso'];    
    $image=$_FILES['photo']['tmp_name'];

    $traget="../image/".$_FILES['photo']['name'];

    move_uploaded_file($image,$traget);

    if($mdpe!=$cmdp)
    {
        echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';}
    else
    {        
           
        $reqmod="UPDATE membres SET 
        nom='$nom', mdp='$mdp', adresse='$email', prenom='$prenom', 
        id_association='$membre_asso',numero_telephone ='$telephone',photo='$traget'
        WHERE id_membre='$id_membre'";


        $res=mysqli_query($conn,$reqmod);

         if ($res)
         {
            // header("location: asso.php?msg=Modifcation des données validés");
             echo '<div class="alert alert-success" role="alert"><strong>Modification des données Validé!</strong></div>';
        }else{
            echo '<div class="alert alert-danger" role="alert"><strong>Echec Modification des données!</strong></div>';
         }              
    }}
}
?> 
                </form>
            </div>
        </div>
    </main>
</body>
</html>