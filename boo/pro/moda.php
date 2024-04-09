<?php require_once("navd.php") ?>
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
            <li><a href="admin.php">UPDATE</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Associations</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Modifier votre association</h3>
                <p class="text-muted">Ici vous ete capable de de m'être a jour vos information</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                <div class="row mb-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="form-labe">Nom de l'assocation</label>
                        <input type="text" class="form-control" name="na" value="<?php echo $ligne['nom'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="form-labe">Nom du responsable</label>
                        <input type="text" class="form-control" name="nra" value="<?php echo $ligne['responsable'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="form-labe">Email</label>
                        <input type="mail" class="form-control" name="mail" value="<?php echo $ligne['email'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="form-labe">Numero</label>
                        <input type="number" class="form-control" name="telephone" value="<?php echo $ligne['telephone'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3"> 
                    <div class="col">
                        <label for="form-labe">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp" value="<?php echo $ligne['mdp'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="form-labe">confirmer</label>
                        <input type="password" class="form-control" name="cmdp" value="<?php echo $ligne['mdp'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="form-labe">Image</label>
                        <input type="file" class="form-control" name="photo" id="photo" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                <label >Type :</label>
                        <input type="radio" class="form-check-input" name="type" value="tontine" required>
                        <label for="tontine" class="form-input-label">tontine</label>
                        <input type="radio" class="form-check-input" name="type" value="Syndicat">
                        <label for="Syndicat" class="form-input-label" required>Syndicat</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="admin.php" class="btn btn-danger">Cancel</a>
                </div>
                <?php

                    if(isset($_POST['submit'])) 
                    {
    
                        $id_association = $ligne['id_association'];
                        $nom=$_POST['na'];
                        $mdp=$_POST['mdp'];
                        $cmdp=$_POST['cmdp'];
                        $email=$_POST['mail'];
                        $telephone=$_POST['telephone'];
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
                        {
                            echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';}
                        else
                        {           
                            $reqmod="UPDATE association SET 
                            nom='$nom',type_association='$type', mdp='$mdp', email='$email', modification='$modification', 
                            description_A='$description', telephone='$telephone', 
                            responsable='$responsable',id_association ='$id_association',cotisation='$co',photo='$traget'
                            WHERE id_association='$id_association'";


                            $res=mysqli_query($conn,$reqmod);

                             if ($res)
                             {
                                // header("location: asso.php?msg=Modifcation des données validés");
                                 echo '<div class="alert alert-success" role="alert"><strong>Modification des données Validé!</strong></div>';
                            }else{
                                echo '<div class="alert alert-danger" role="alert"><strong>Echec Modification des données!</strong></div>';
                             }              
                        }
                    }
                 ?> 
            <div>  
        </form>       
</body>
</html>