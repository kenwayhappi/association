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
<body>
    <main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="cotisation.php">Cotisation</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Creer</a></li>
        </ul>
        <div class="container">
            <div class="text-center mb-4">
                <h3>Creer une cotisation</h3>
                <p class="text-muted">Ici vous pouvez creer une cotisation</p>
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
                            <label for="form-labe">date </label>
                            <input type="date" class="form-control" name="date_seance" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">heure</label>
                            <input type="time" class="form-control" name="heure" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">lieu</label>
                            <input type="text" class="form-control" name="lieu">
                        </div>
                        <div class="col">
                            <label for="form-labe">raison</label>
                            <input type="text" class="form-control" name="raison">
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="seance.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

    $id_association=$_POST['id_association'];
    $lieu=$_POST['lieu'];
    $date_seance = $_POST['date_seance'];
    $heure=$_POST['heure'];
    $raison=$_POST['raison'];

        $reqadd="INSERT INTO seance (id_association,lieu,date_seance,heure,raison)
        VALUES ('$id_association','$lieu','$date_seance','$heure','$raison')";
            
                $res=mysqli_query($conn,$reqadd);
            
                if ($res){
                    echo '<div class="alert alert-success" role="alert"><strong>Seance creer avec succès!</strong></div>';
                    /*$reqmod="UPDATE association SET 
                    nbr_membre++;
                    WHERE id_association='$membre_asso'";*/
                }
                else{
                    echo '<div class="alert alert-danger" role="alert"><strong>Echec de la seance!</strong></div>';
                }}
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>