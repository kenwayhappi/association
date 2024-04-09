<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $req = mysqli_query($conn,"SELECT amande.*, amandem.* FROM amande LEFT JOIN amandem 
    ON amande.id_amande = amandem.id_amande
    WHERE amandem.id_membre='".$rows['id_membre']."'");
    while ($ra=mysqli_fetch_assoc($req)){  
    ?>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="membre.php">confirmer</a></li>
                        <li class="breadcrumb-item active">reglement</li>
                    </ol>
                </div>
            </div>
    <div class="container">
        <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Envoyer juste la capture du message de paiement</h3>
                            <p class="text-muted m-b-30 font-13">il sera renvoyer a votre responsable</p>
                            <form method="POST" autocomplete="" enctype="multipart/form-data" >
                            <?php

                            if(isset($_POST['submit'])) 
                            {
                            
    $id_association= $rows['id_association'];    
    $id_membre=$rows['id_membre'];
    $vrai=$rows['mdp'];
    $date_amande = $_POST['date_amande'];
    $nom = $_POST['nom'];
    $prenom=$_POST['prenom'];
    $raison=$_POST['raison'];
    $mdpe=$_POST['mdp'];
    $mdp=hash('sha256',$mdpe);
    $date_regler= date('Y-m-d');
    $statut="payer";
    $image=$_FILES['txtphoto']['tmp_name'];

    $traget="../image/".$_FILES['txtphoto']['name'];

    move_uploaded_file($image,$traget);
    
            if($mdp!=$vrai){
                echo '<div class="alert alert-danger" role="alert"><strong>Vous avez ratez votre mot de passe!</strong></div>';
            }else{
                $res=mysqli_query($conn,"INSERT INTO regler (nom,prenom,raison,id_membre,id_association,date_amande,date_regler,photo,statut) 
                VALUES ('$nom','$prenom','$raison','$id_membre','$id_association','$date_amande','$date_regler','$traget','$statut')");

                if ($res){
                    echo "<script>
                    alert(\"Photo envoyer \");
                    window.location.href = \"membre.php\";
                 </script>";
                }
                else{
                    echo "<script>
                    alert(\"echec de l'envoie \");
                    window.location.href = \"rav.php\";
                 </script>";
                }
            }
              
            }
            
    
?>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Nom</label>
                                            <input type="text" class="form-control" aria-label="basic-addon1" name="nom" value="<?php echo $rows['nom'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Prenom</label>
                                            <input type="text" class="form-control" aria-label="basic-addon1" name="prenom" value="<?php echo $rows['prenom'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Raison</label>
                                            <input type="text" class="form-control" aria-label="basic-addon1" name="raison" value="<?php echo $ra['raison'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Dte_amander</label>
                                            <input type="text" class="form-control" aria-label="basic-addon1" name="date_amande"  value="<?php echo $ra['date_debut'];?>" readonly>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Photo</span>
                                            <input type="file" class="form-control"  name="txtphoto" id="photo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" aria-label="basic-addon1" name="mdp">
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                    <?php
                                }
    
    ?>
    </div>   
</body>
</html>