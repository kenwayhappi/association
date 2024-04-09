<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regler</title>
</head>
<body>
    <div class="container">
        <table class="table table-hover tex-center  mt-3 ">
            <thead class="table-dark">
                <tr><a href="service.php">Acceuil</a>
                    <th scope="col">Raison</th>
                    <th scope="col">Somme</th>
                    <th scope="col">Date de contaction</th>
                    <th scope="col">Date de reglement</th>
                    <th scope="col">Rembourser</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $req = mysqli_query($conn,"SELECT amande.*, amandem.* FROM amande LEFT JOIN amandem 
                    ON amande.id_amande = amandem.id_amande
                    WHERE amandem.id_membre='".$rows['id_membre']."'");
                    while ($ra=mysqli_fetch_assoc($req)){
                ?>
                <tr>
                    <td><?php echo $ra['raison'];?></td>
                    <td><?php echo $ra['montant'];?></td>
                    <td><?php echo $ra['date_debut'];?></td>
                    <td><?php echo $ra['delai'];?></td>
                    <td><a href="rav.php?identite=<?php echo $rows['id_membre']?> ">Rembourser</a></td>
            </tbody>    
                <?php  }?>
        </table>
    </div>   
</body>
</html>