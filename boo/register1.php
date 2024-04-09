<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="besoin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="besoin/css/style.css">
    <title>Document</title>
</head>
<body style="background-color: #7b29ff">
<center>
<?php
include 'connexion.php';
$az=rand(1,999999);
if(isset($_POST['submit']))
{
  $prenom=$_POST['prenom'];
  $nom=$_POST['nom'];
  $balance=$_POST['balance'];
  $mdp=$_POST['mdp'];
  $rmdp=$_POST['rmdp'];
  $nomA=$_POST['nomA'];
  
  if(empty($nomA))
  {echo '<div class="alert alert-danger" role="alert"><strong>remplissez le nom de lassocition!</strong></div>';}
  else if(empty($nom))
  {echo '<div class="alert alert-danger" role="alert"><strong>remplissez le nom!</strong></div>';}
 else if(empty($prenom))
  {echo '<div class="alert alert-danger" role="alert"><strong>remplissez l email!</strong></div>';}
 else if($mdp!=$rmdp)
  {echo '<div class="alert alert-danger" role="alert"><strong>les mots de passe ne sont pas identiques!</strong></div>';}
 else
  {
    $sql="insert into users(id,nom,prenom,mdp,balance) values('{$id}','{$nom}','{$prenom}','{$mdp}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
      session_start();
        $_SESSION['IDAS']=$_POST['nomA'];
        echo "<script> alert('Hurray! Assosiation Creer');
        window.location='pageuser.php';
        </script>";
    }
  }

  
}

?>
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold">Sign up</p>
                <form class="mx-1 mx-md-4" action="" method="post">

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="nomA">
                      <label class="form-label" for="form3Example1c">Nom de votre Association</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control"  name="nom"/>
                      <label class="form-label" for="form3Example1c">Votre nom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example3c" name="prenom" class="form-control" />
                      <label class="form-label" for="form3Example3c">Prenom</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="Number" name="balance" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Numero</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="mail" name="balance" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">E-mail</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="mdp" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Mot de passe</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password"  name="rmdp" class="form-control" />
                      <label class="form-label" for="confirmer">Confirmer</label>
                    </div>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3">
                     <a href="index.php">Acceuil</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary btn-lg">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="besoin/image/aa.png"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</center>
</body>
</html>
