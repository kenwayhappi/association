<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="besoin/image/aa.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<?php
    include 'nav.php';
    ?>
     <!-- Modal -->
     
        <div class="container w-75 mt-3 rounded shadow">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url(img/c2.jpg); min-height:300px;">
                                <div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3" method="post" action="#">
                                    <div>
                                        <h1>Contactez nous</h1>
                                    <p>Veuillez remplir le formulaire et laisser votre message nous vous contacterons le plutot possible</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">First name</label>
                                        <input type="text" class="form-control" placeholder="Jon" id="userName"
                                            aria-describedby="emailHelp" name="name" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" placeholder="Doe" id="userName"
                                            aria-describedby="emailHelp" name="prenom" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="userName" class="form-label">Email address</label>
                                        <input type="email" class="form-control" placeholder="Johndoe@example.com" id="userName"
                                            aria-describedby="emailHelp" name="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleInputEmail1" class="form-label">Enter Message</label>
                                        <textarea name="mot" placeholder="This is looking great and nice." class="form-control" id="mot"  rows="4"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <input type="submit" class="btn btn-brand" name="submit" value="Send Message">
                                    </div>
                                    <?php

if(isset($_POST['submit'])) 
{
    $nom=$_POST['name'];
    $prenom=$_POST['prenom'];
    $mot=$_POST['mot'];
    $email=$_POST['email'];

    if(empty($nom))
  {echo '<div class="alert alert-danger" role="alert"><strong>remplissez le nom!</strong></div>';}
 else if(empty($prenom))
  {echo '<div class="alert alert-danger" role="alert"><strong>remplissez le prenom!</strong></div>';}
 else if(empty($mot))
  {echo '<div class="alert alert-danger" role="alert"><strong>Veuillez entrer votre message</strong></div>';}
 else if(empty($email))
  {echo '<div class="alert alert-danger" role="alert"><strong>Veuillez entrer votre l email</strong></div>';}
  else{

    $reqadd="INSERT INTO contact (nom,prenom,email,mot)
    VALUES ('$nom','$prenom','$email','$mot')";

    $res=mysqli_query($conn,$reqadd);

    if ($res){
        echo "<script> alert ('message envoyer'); 
        </script>";
    }
    else{
        echo "<script> alert ('verifier vos information'); 
        </script>";
    }}
}
?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</body>
</html>