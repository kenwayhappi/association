<?php
    include ('navd.php');
    $complet=$_GET['complet'];
	$res=mysqli_query($conn,"SELECT * FROM seance where id='$complet'");
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
            <li><a href="membre.php">Seance</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Modifier</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Mdifier</h3>
                <p class="text-muted">Ici vous ete capable de de Modifier les information d'une séance</p>
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
                            <label for="form-labe">Date</label>
                            <input type="Date" class="form-control" name="date_seance" value="<?php echo $ligne['date_seance'] ?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Heure</label>
                            <input type="time" class="form-control" name="heure" value="<?php echo $ligne['heure'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">lieu</label>
                            <input type="text" class="form-control" name="lieu" value="<?php echo $ligne['lieu'];?>" required>
                        </div>
                        <div class="col">
                            <label for="form-labe">Raison</label>
                            <input type="text" class="form-control" name="raison" value="<?php echo $ligne['raison'];?>" required>
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
    
            $reqmod="UPDATE seance SET 
            lieu='$lieu', date_seance='$date_seance',heure='$heure',raison='$raison'
            WHERE id_association='$id_association'";
            $res=mysqli_query($conn,$reqmod);
            
            if ($res) {
                echo "<script>
                alert(\" seance modifier avec succes\");
                window.location.href = \"seance.php\";
            </script>";
            }else{
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