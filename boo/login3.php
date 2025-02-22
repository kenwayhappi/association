<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="besoin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="besoin/image/aa.png" type="image/x-icon">
    <link rel="stylesheet" href="besoin/css/style.css">
    <title>Login</title>
    <style>
        body{
            background-color: #7b29ff;
        }
        .bg{
            background-image: url(besoin/image/e.png);
            background-position: center center;
        }
    </style>
</head>
<body>
  <div class="container w-75 mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col-md-6 bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>
            <div class="col-md-6 bg-white p-6 rounded-end">
                <div class="text end">
                    <img src="besoin/image/aa.png" width="48">
                </div>
                <h2 class="fw-bold text-center pt-5 mb-5">Bienvenue</h2>
                
                <form  method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label">Entrer votre E-mail</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Entrer votre Mot de passe</label>
                        <input type="password" class="form-control" name="mdp" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-info rounded-0 merriweather" name="submit">ENVOYER</button>
                    </div>
                    <div class="my-3">
                        <span>vous n'avez pas de compte ? <a href="membre/register.php"> Inscription</a></span><br/>
                        <span><a href="index.php">Accueil</a></span>
                    </div>
                </form>

                <div class="container w-100 my-4">
                    <div class="row text-center">
                        <div class="col-12">Reseau Sociaux</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2 d-none d-md-block">
                                        <img src="besoin/image/fb.jpg" width="48">
                                    </div>
                                    <div class="col-10 text-center">
                                        Facebook
                                    </div>
                                </div>
                            </button>
                        </div>

                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2 d-none d-md-block">
                                        <img src="besoin/image/go.jpg" width="48">
                                    </div>
                                    <div class="col-10 text-center">
                                        Google
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
        session_start();
                include 'connexion.php';
                if(isset($_POST['submit'])) {
                    $nom=$_POST['email'];
                    $mdp=$_POST['mdp'];
                    $req="SELECT * FROM membres where nom='".$_POST['email']."' and mdp='".$_POST['mdp']."'";
                    $res=mysqli_query($conn,$req);
                    $row=mysqli_fetch_array($res);
                    if($row > 0){
                        if($row["usertype"]=="user")
                    {
                        $_SESSION['id_association']=$row['id_association'];
                        $_SESSION['membre']=$row['id_membre'];
                            header("location:membre/about.php");
            
                }else if($row["usertype"]=="admin") {
                 
                          $_SESSION['email']=$nom;
                          header("location:admin/admin1.php");
                      
                }else if($row["usertype"]=="pro") {
                
                          $_SESSION['email']=$nom;
                          header("location:pro/admin.php");
                      
                    }
                  }else{
                    echo '<br><br><div class="alert alert-danger" role="alert"><strong><strong>Vous netez pas dans notre base données!</strong></div>';
                  }
        
                }
              ?>
    <script src="besoin/js/bootstrap.bundle.min.js"></script>
</body>
</html>
