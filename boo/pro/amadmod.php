
<?php
include ('navd.php');
    $complet=$_GET['complet'];
	$res=mysqli_query($conn,"SELECT * FROM amande where id_amande='$complet'");
    if($ligne=mysqli_fetch_assoc($res)){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="membre.php">Amende</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Modifier</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Amande</h3>
                <p class="text-muted">Ici vous ete capable de de Mofier une amande</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="id_association" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">Motif</label>
                            <input type="text" class="form-control" name="raison" value="<?php echo $ligne['raison'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">montant</label>
                            <input type="number" class="form-control" name="montant" value="<?php echo $ligne['montant'] ?>" required>
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="amande.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $raison=$_POST['raison'];
    $montant=$_POST['montant'];
    $id_association=$_POST['id_association'];   
    $rd = mysqli_fetch_row(mysqli_query($conn,"select count(*) from amande where raison ='$raison'")); 
    
            $reqmod="UPDATE amande SET 
            raison='$raison', montant='$montant'
            WHERE id_amande='$complet'";

            $res=mysqli_query($conn,$reqmod);
            
                if ($res){
                    echo "<script>
                alert(\" amande modifier avec succes\");
            window.location.href = \"amande.php\";
            </script>";
                }
                else{
                    echo '<div class="alert alert-danger" role="alert"><strong>Echec des modification données!</strong></div>';
                }}
              }
    
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>