<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: ../login.php");
}
	$req="SELECT * FROM association";
	$res=mysqli_query($conn,$req);
    $id_association = rand(1,999999);
	$nbr=mysqli_num_rows($res);
	echo "<p> Total <b> ".$nbr."</b> Association</p>";
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
            <li><a href="asso.php">Associations</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Ajouter</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Association</h3>
                <p class="text-muted">Ici vous ete capable de gérer tout les association</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Id unique de l'association</label>
                            <input type="text" class="form-control" name="id_association" value="<?php echo $id_association ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Nom de l'assocation</label>
                            <input type="text" class="form-control" name="na" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Nom du responsable</label>
                            <input type="text" class="form-control" name="nra" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="jean@gmail.com" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Numero</label>
                            <input type="number" class="form-control" name="telephone">
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
                    <div class="form-group mb-3">
                        <label >Type :</label>
                        <input type="radio" class="form-check-input" name="type" value="tontine" required>
                        <label for="tontine" class="form-input-label">tontine</label>
                        <input type="radio" class="form-check-input" name="type" value="Syndicat">
                        <label for="Syndicat" class="form-input-label" required>Syndicat</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="asso.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{
  
    $id_association = $_POST['id_association'];
    $nom=$_POST['na'];
    $mdp=$_POST['mdp'];
    $cmdp=$_POST['cmdp'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $date = date('Y-m-d');
    $description="dsqd";
    $responsable=$_POST['nra'];
    $type=$_POST['type'];
    $co=0;
    $statut="dqsd";
    $nbm=0;      
    $rd = mysqli_fetch_row(mysqli_query($conn,"select count(*) from association where email ='$email'"));
    $image=$_FILES['txtphoto']['tmp_name'];

    $traget="../image/".$_FILES['txtphoto']['name'];

    move_uploaded_file($image,$traget);

            if($mdp!=$cmdp)
            {
            echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';
            }
            else if($rd[0]>0)
            {
                echo "<script>alert(\"ce adresse d'utilisateur est déjà utilisé\");
            window.location.href = \"adda.php\";
            </script>";
            }
            else if(filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email,'.com') !== false && strpos($email,'@') !== false)
            { 
                
                $reqadd="INSERT INTO association (id_association,nom,mdp,email,telephone,date_creation,description_A,responsable,type_association,cotisation,statut,nbr_membre,photo)
                VALUES ('$id_association','$nom','$mdp','$email','$telephone','$date','$description','$responsable','$type',$co,'$statut',$nbm,'$traget')";
            
                $res=mysqli_query($conn,$reqadd);
            
                if ($res){
                    echo '<div class="alert alert-success" role="alert"><strong>Insertion des données validés!</strong></div>';
                }
                else{
                    echo '<div class="alert alert-danger" role="alert"><strong>Echec dInsertion des données!</strong></div>';
                }
            }
            else
            echo '<div class="alert alert-danger" role="alert"><strong>adresse erroné veuillez ajouter @ ou .com a la fin!</strong></div>';
            }
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>