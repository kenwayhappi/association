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
            <li><a href="#" class="active">Liste Amande</a></li>
        </ul>
        <div class="container">
            <div class="text-center mb-4">
                <h3>Liste personne Amandé</h3>
                <p class="text-muted">Ici vous voyez tout les membrs et les motif de leur amande dans votre association</p>
            </div>
            <div class="container d-flex justify-content-center">
            <table class="table table-hover tex-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nom - prenom</th>
                        <th scope="col">Raison</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date de contaction</th>
                        <th scope="col">Date de reglement</th>
                        <th>Regler</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $req = mysqli_query($conn,"SELECT amande.*, amandem.* FROM amande LEFT JOIN amandem 
                    ON amande.id_amande = amandem.id_amande
                    WHERE amande.id_association='".$_SESSION['id_association']."'");
                    
                        while ($ra=mysqli_fetch_assoc($req)){
                            $res = mysqli_query($conn,"SELECT membres.*, amandem.* FROM membres LEFT JOIN amandem 
                            ON  membres.id_membre=amandem.id_membre 
                            WHERE membres.id_membre='".$ra['id_membre']."' ");
                            if ($banque=mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                        <td><?php 
                            $nom = $banque['nom'];
                            $prenom = $banque['prenom'];
                            echo $nom." - ".$prenom;
                            ?></td>
                        <td><?php echo $ra['raison'];?></td>
                        <td><?php echo $ra['montant'];?></td>
                        <td><?php echo $ra['date_debut'];?></td>
                        <td><?php echo $ra['delai'];?></td>
                        <td><a href="reglerA.php?complet=<?php echo $banque['id_am'];?>">o<i class='bx bxs-edit' ></i></a></td>
                </tbody>    
                <?php } }?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>