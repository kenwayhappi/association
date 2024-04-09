<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .bg{
            background-image: url(<?php echo $ra['photo'];?>);
            background-position: center center;
        }
</style>
<body>
<main>
<?php

$req = mysqli_query($conn,"SELECT * FROM regler where id_association='".$_SESSION['id_association']."'");
if($ra=mysqli_fetch_assoc($req)){
?>
<div class="container w-75 mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col-md-6 bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            <img src="<?php echo $ra['photo'];?>" width="48">
            </div>
            <div class="col-md-6 bg-white p-6 rounded-end">
                <div class="text end">
                    <img src="<?php echo $ra['photo'];?>" width="48">
                </div>
                <h2 class="fw-bold text-center pt-5 mb-5">Bienvenue</h2>
                
                <form  method="post">
                    <div class="mb-4">
                    <div class="mb-4">
                        <label for="password" class="form-label">Association</label>
                        <input type="text" class="form-control" name="id_association" value="<?php echo $ra['id_association'];?>" required>
                    </div>
                        <label for="email" class="form-label">Personne</label>
                        <input type="text" class="form-control" name="id_membre"  value="<?php  echo $ra['id_membre']; ?>"> 
                        <?php  echo $ra['nom']."-".$ra['prenom']; ?>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Amande</label>
                        <input type="text" class="form-control" name="mdp" value="<?php echo $ra['raison'];?>" required>
                    </div>

                    <div class="d-grid">
                    <a href="../fac/fac2.php?complet=<?php echo $ra['id_regler'];?>">
                    <button class="btn btn-outline-info rounded-0 merriweather" name="submit">Valider</button></a> 
                    </div>
                    <div class="d-grid mt-3">
                        <a href="gamandes.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>

                <div class="container w-100 my-4">
                    
                    
                    </div>
                </div>
                
                <?php  }?>
            </div>
        </div>
    </div>
    </main>
</body>
</html>