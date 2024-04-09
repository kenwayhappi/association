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
<div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="id_association" value="<?php echo $ra['id_association'];?>" readonly>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="id_membre" value="<?php echo $rows['id_membre'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $rows['nom'];?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">Prenom</label>
                            <input type="text" class="form-control" name="prenom" value="<?php echo $rows['prenom'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">raison</label>
                            <input type="text" class="form-control" name="raison" value="<?php echo $ra['raison'];?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">date_amande</label>
                            <input type="date" class="form-control" name="date_amande"  value="<?php echo $ra['date_debut'];?>" readonly>
                        </div>
                    </div>

                        <div class="col">
                            <label for="form-labe">Image</label>
                            <input type="file" class="form-control" name="txtphoto" id="photo" required>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="about.php" class="btn btn-danger">Cancel</a>
                    </div>
            <?php

if(isset($_POST['submit'])) 
{

    $id_association=$_POST['id_association'];
    $id_membre=$_POST['id_membre'];
    $date_amande = $_POST['date_amande'];
    $nom = $_POST['nom'];
    $prenom=$_POST['prenom'];
    $raison=$_POST['raison'];
    $date_regler= date('Y-m-d');
    $statut="payer";
    $image=$_FILES['txtphoto']['tmp_name'];

    $traget="../image/".$_FILES['txtphoto']['name'];

    move_uploaded_file($image,$traget);
    
    
                
              $res=mysqli_query($conn,"INSERT INTO regler (nom,prenom,raison,id_membre,id_association,date_amande,date_regler,photo,statut) 
                VALUES ('$nom','$prenom','$raison','$id_membre','$id_association','$date_amande','$date_regler','$traget','$statut')");

                if ($res){
                    echo "<script>
                    alert(\"Photo envoyer \");
                    window.location.href = \"reglerA.php\";
                 </script>";
                }
                else{
                    echo "<script>
                    alert(\"echec de l'envoie \");
                    window.location.href = \"reglerA.php\";
                 </script>";
                }}
            }
    
?>
        </form>
    </div>
</body>
</html>