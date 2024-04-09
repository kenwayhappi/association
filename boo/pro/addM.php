<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php

$id_association = rand(1,999999);
echo "<p> Total <b> ".$nbrm."</b> Membre</p>";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="membre.php">Membre</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Ajouter</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Membre</h3>
                <p class="text-muted">Ici vous ete capable de d'ajouter un membre</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Id unique du membre</label>
                            <input type="text" class="form-control" name="id_membre" value="<?php echo $id_association ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="membre_asso" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Nom du membre</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Prenom</label>
                            <input type="text" class="form-control" name="prenom" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Numero</label>
                            <input type="number" class="form-control" name="numero_membre" placeholder="688899">
                        </div>
                        <div class="col">
                            <label for="form-labe">Email</label>
                            <input type="mail" class="form-control" name="mail" placeholder="jean@gmail.com" required>
                        </div>
                    </div>
                    <div class="row mb-3"> 
                        <div class="col">
                            <label for="form-labe">Mot de passe</label>
                            <input type="password" class="form-control" name="mdp" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">confirmer</label>
                            <input type="password" class="form-control" name="cmdp" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Image</label>
                            <input type="file" class="form-control" name="txtphoto" id="photo">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="membre.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $id_membre=$_POST['id_membre'];
    $mdpe=$_POST['mdp'];
    $mdp=hash('sha256',$mdpe);
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $cmdp=$_POST['cmdp'];
    $email=$_POST['mail'];
    $numero_membre=$_POST['numero_membre'];
    $date = date('Y-m-d');
    $usertype="user";
    $statut="normal";
    $membre_asso=$_POST['membre_asso'];    
    $image=$_FILES['txtphoto']['tmp_name'];

    $traget="../image/".$_FILES['txtphoto']['name'];

    move_uploaded_file($image,$traget);

            if($mdpe!=$cmdp)
            {echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';}
           else
            {
                $reqadd="INSERT INTO membres (id_membre,nom,prenom,mdp,adresse,numero_telephone,date_adhesion,usertype,id_association,photo,statut)
                VALUES ('$id_membre','$nom','$prenom','$mdp','$email','$numero_membre','$date','$usertype',$membre_asso,'$traget','$statut')";
            
                $res=mysqli_query($conn,$reqadd);
            
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