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
            <li><a href="gamandes.php">Gestions des amandes</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Amander membre</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Amander</h3>
                <p class="text-muted">Ici vous ete capable d'amander un membre de votre association</p>
            </div>
            <div class="container d-flex justify-content-center">
            <form method="POST" autocomplete="" enctype="multipart/form-data" style="width:70vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">son association</label>
                            <input type="text" class="form-control" name="id_association" value="<?php echo $ligne['id_association'];?>" readonly>
                        </div>
                        <div class="col">
                            <label for="form-labe">Nom-Prenom</label>
                            <select name="id_membre" class="form-control">
                                <option required value=""></option>
                                <?php
                                $statut="amander";
                                    $res = mysqli_query($conn,"SELECT * FROM membres where id_association='".$_SESSION['id_association']."' and statut!='$statut'");
                                    while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <option value="<?php  echo $row['id_membre']; ?>"> <?php  echo $row['nom']."-".$row['prenom']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">raison-montant</label>
                                <select name="id_amande" class="form-control">
                                    <option required value=""></option>
                                    <?php
                                        $res = mysqli_query($conn,"SELECT * FROM amande where id_association='".$_SESSION['id_association']."'");
                                        while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php  echo $row['id_amande']; ?>"> <?php  echo $row['raison']."-".$row['montant']; ?></option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="form-labe">delai de remboursement</label>
                            <input type="number" class="form-control" name="dure" min="3" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="form-labe">periode</label>
                            <select name="forme" class="form-control">
                                <option>jour</option>
                                <option>semaine</option>
                                <option>mois</option>
                                </select>
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="gamandes.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <?php

if(isset($_POST['submit'])) 
{

        $id_membre = $_POST["id_membre"];
        $id_association = $_POST["id_association"];
        $motif = $_POST["id_amande"];
        $duree = $_POST["dure"];
        $forme = $_POST["forme"];
        $delais = $duree." ".$forme;
        $dat = date('Y-m-d');
        if($forme == "jour"){
            $date = date('Y-m-d',strtotime($dat."+ $duree days"));
        }
        else if($forme == "semaine"){
            $duree = $duree*7;
            $date = date('Y-m-d',strtotime("+ $duree days"));;
        }else {
            $duree = $duree*30;
            $date = date('Y-m-d',strtotime("+ $duree days"));
        }
        $res=mysqli_query($conn,"INSERT INTO notifications(messagen,id_membre,id_association,date_no) values(\"Vous venez d'être amendé\",'$id_membre','$id_association','$dat')");

        mysqli_query($conn,"INSERT INTO amandem(date_debut,delai,id_membre,id_association,id_amande) values('$dat','$delais','$id_membre','$id_association','$motif')");
        if($res){
            mysqli_query($conn,"UPDATE  membres SET statut='Amander' WHERE id_membre='$id_membre'");
            echo "<script language = Javascript>
        alert(\"Amende Ajouté \");
        window.location.href = \"gamandes.php\";
     </script>";
        }else{
            echo "<script language = Javascript>
        alert(\"Amende erreur \");
        window.location.href = \"amanderm.php\";
     </script>";
        }
      }

    
?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>