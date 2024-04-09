<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../besoin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='../stylesheet'>
    <link rel="stylesheet" href="../besoin/css/style.css">
    <title>Document</title>
    <style>
        <style>        
        :root{
            --first-color:#1A73E8;
            --input-color:#80868B;
            --border-color: #DADCE0;
            --body-font: 'Roboto' ,sans-serif;
            --normal-font-size:1rem;
            --small-font-sieze: .75rem;
            --color1: #0f3f49;
            --color2: #f3f1f9;
            --color3: #4e7d55;
            --color4: #f1f9f9;
            --color :  #f1f9f9;
            --color6 : #662a2c;
                }
        *,::before,::after{
        box-sizing: border-box;
        }
        body{ 
            margin: 0;
            padding: 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            background-color: #f1f9f9;
        }
        .container{
            background-color: #f3f1f9;
        }
    </style>
</head>
<body>
<div class="container w-78 mt-3 rounded shadow">About
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h2></h2>
                        <img src="../besoin/image/aa.png"width="458">
                </div>
                <div class="col-lg-8">
                    <form class="p-lg-5 col-12 row g-3" method="post" action="" autocomplete="" enctype="multipart/form-data">
                        <div>
                            <h1>Register</h1>
                            <p>veuillez remplir le formulaire</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="userName" class="form-label">Nom de votre Association</label>
                            <input type="text" class="form-control"  name="noma" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="userName" class="form-label">Votre nom</label>
                            <input type="text" class="form-control"  name="responsable" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="userName" class="form-label">Numero de telephone</label>
                            <input type="number" class="form-control"  name="number">
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label">Email</label>
                            <input type="mail" class="form-control"  name="email" required>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control"  name="mdp" required>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label">Confirmer</label>
                            <input type="password" class="form-control"  name="cmdp" required>
                        </div>
                        <div class="col-12">
                            <label for="userName" class="form-label">Photo</label>
                            <input type="file" class="form-control"  name="txtphoto">
                        </div>
                        <div class="form-group mb-3">
                        <label >Type :</label>
                        <input type="radio" class="form-check-input" name="type" value="tontine" required>
                        <label for="tontine" class="form-input-label">tontine</label>
                        <input type="radio" class="form-check-input" name="type" value="Syndicat">
                        <label for="Syndicat" class="form-input-label" required>Syndicat</label>
                    </div>
                        <div class="col-12">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, incidunt quisquam, 
                            nam commodi laudantium dolor expedita rem, saepe soluta hic corporis odio possimus quam. 
                            Temporibus corporis id suscipit repellendus obcaecati? <a href="../login.php">Connexion</a>
                        </div>
                        <div class="d-grid">
                        <button type="submit" class="btn btn-outline-info rounded-0 merriweather" name="submit">Creer Association</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../connexion.php';
    if(isset($_POST['submit'])) 
    {
       /* $length = 3; 
        $randomBytes = random_bytes($length);
        $id_association = bin2hex($randomBytes);*/
        $id_association = rand(1,999999);
        $nom=$_POST['noma'];
        $mdp=$_POST['mdp'];
        $cmdp=$_POST['cmdp'];
        $email=$_POST['email'];
        $telephone=$_POST['number'];
        $date = date('Y-m-d');
        $description="dsqd";
        $responsable=$_POST['responsable'];
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
        window.location.href = \"register.php\";
        </script>";
        }
        else if(filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email,'.com') !== false && strpos($email,'@') !== false)
        { 
            
            $reqadd="INSERT INTO association (id_association,nom,mdp,email,telephone,date_creation,description_A,responsable,type_association,cotisation,statut,nbr_membre,photo)
            VALUES ('$id_association','$nom','$mdp','$email','$telephone','$date','$description','$responsable','$type',$co,'$statut',$nbm,'$traget')";
        
            $res=mysqli_query($conn,$reqadd);
        
            if ($res){
                echo "<script>alert(\"Votre association viens d'être creer\");
                window.location.href = \"../login.php\";
                </script>";
            }
            else{
                echo '<div class="alert alert-danger" role="alert"><strong>Echec dInsertion des données!</strong></div>';
            }
        }
        else
        echo "<script>alert(\"adresse erroné veuillez ajouter @ ou .com a la fin!\");
        window.location.href = \"register.php\";
        </script>";
        }


    
?>
<script src="besoin/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>