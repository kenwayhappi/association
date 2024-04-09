<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                        <li class="breadcrumb-item"><a href="membre.php">Home</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
                
            </div>
<div class="container-fluid"style="width:70vw; min-width:300px;">
<div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Modifier vos information</h4>
                            <h6 class="card-subtitle">respecter les champs</h6>
                            <div class="row">
                                <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                                <?php

if(isset($_POST['submit'])) 
{
    $vrai = $rows['mdp'];
    $an = $_POST['ancien'];
    $ancien = hash('sha256',$an);
    $id_membre = $rows['id_membre'];
    $nom=$_POST['nom'];
    $mdpe=$_POST['mdp'];
    $mdp=hash('sha256',$mdpe);
    $cmdp=$_POST['cmdp'];
    $email=$_POST['mail'];
    $telephone=$_POST['numero_telephone'];
    $modification = date('Y-m-d');
    $prenom=$_POST['prenom'];
    $membre_asso= $rows['id_association'];    
    $image=$_FILES['photo']['tmp_name'];

    $traget="../image/".$_FILES['photo']['name'];

    move_uploaded_file($image,$traget);

    if($mdpe!=$cmdp)
    {
        echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';}
    else
    {           
        if($ancien!=$vrai){
            echo '<div class="alert alert-danger" role="alert"><strong>Vous avez ratez lancien mot de passe!</strong></div>';
        }
        else{
            if(empty($mdp)) $mdp=$vrai;
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
    }}}
?> 
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">nom</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="nom" value="<?php echo $rows['nom'] ?>" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">prenom</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="prenom" value="<?php echo $rows['prenom'] ?>" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2" name="mail" value="<?php echo $rows['adresse'] ?>" required>
                                            <span class="input-group-addon" id="basic-addon2">@example.com</span>
                                        </div>
                                        <br>
                                        <label for="basic-url">Votre numero</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon3">(+237)</span>
                                            <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="numero_telephone" value="<?php echo $rows['numero_telephone'] ?>">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">Photo</span>
                                            <input type="file" class="form-control" aria-label="Amount (to the nearest dollar)" name="photo" id="photo" value="<?php echo $rows['photo'] ?>" required>
                                        </div>
                                        <br>
                                    
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                        <label class="control-label m-t-20" for="example-input1-group2">Nouveau mot de passe et confirmer</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">MDP</span>
                                                    <input type="password" class="form-control" aria-label="basic-addon1" name="mdp">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Confirme</span>
                                                    <input type="password" class="form-control" aria-label="basic-addon1" name="cmdp">
                                                </div>
                                            </div>
                                        </div>
                                        <label class="control-label m-t-20" for="example-input1-group2">Ancien mot de passe</label>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                    <input type="password" class="form-control" aria-label="Text input with checkbox" name="ancien">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-3">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                        </div>
                                    </form>
                                </div>
</body>
</html>