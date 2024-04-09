<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if($row=(mysqli_fetch_assoc($resulta))){
        
        ?>
    <div class="container w-78 mt-3 rounded shadow" style="background-color : skyblue;">About
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h2><?php echo $rows['nom'] , " ".$rows['prenom'];?></h2>
                        <img src="<?php echo $rows['photo'];?>" width="458">
                </div>
                <div class="col-lg-8">
                    <form class="p-lg-5 col-12 row g-3" method="post" action="">
                        <div>
                            <h1>Information</h1>
                            <p>Consulter et modifier vos information a votre gise</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="userName" class="form-label"><b>Association :</b></label>
                            <?php echo $row['nom'] ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="userName" class="form-label"><b>Date :</b></label>
                            <?php echo $date ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="userName" class="form-label"><b>Nom :</b></label>
                            <?php echo $rows['nom'];?>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label"><b>Prenom :</b></label>
                            <?php echo $rows['prenom'];?>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label"><b>Adresse :</b></label>
                            <?php echo $rows['adresse'];?>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label"><b>numero de telephone :</b></label>
                            <?php echo $rows['numero_telephone'];?>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label"><b>date_adhesion :</b></label>
                            <?php echo $rows['date_adhesion'];?>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label"><b>seance :</b></label>
                            <?php 
                            if($nbrs!=0) {
                            $lien="infoseance.php";
                            $texte="seance lancé";
                            echo"<a href='$lien'>$texte</a>";
                            }else echo"aucune";
                            ?>
                        </div>
                        <div class="col-6">
                            <label for="userName" class="form-label"><b>Statut :</b></label>
                            <?php 
                            $lien="reglerA.php";
                            $texte="Amander";
                            if($rows['statut']=="Amander"){
                                echo"<a href='$lien'>$texte</a>";
                            }else echo "normal";
                            ?>
                        </div>
                        <div class="col-12">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, incidunt quisquam, 
                            nam commodi laudantium dolor expedita rem, saepe soluta hic corporis odio possimus quam. 
                            Temporibus corporis id suscipit repellendus obcaecati?
                        </div>
                        <div class="col-12">
                        <a href="mod.php?complet=<?php echo $rows['id_membre'];?>">    
                        <input type="button" class="btn btn-order btn-lg me-5 rounded-0 merriweather w-100 mt-5" value="Mettre a jour">
                        </a>    
                    </div>
                    </form>
                </div>
            </div>
            <?php
             } 
                ?>
        </div>
    </div>
</div>
</body>
</html>