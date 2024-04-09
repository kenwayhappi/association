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
<div class="container">
            
            <table class="table table-hover tex-center">
                <thead class="table-dark">
                <tr><a href="about.php">Acceuil</a>
                    <tr>
                        <th scope="col">date</th>
                        <th scope="col">heure</th>
                        <th scope="col">lieu</th>
                        <th scope="col">raison</th>
                    </tr>
                </thead>
                <?php
                    while ($ligne=mysqli_fetch_assoc($ress)){    
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $ligne['date_seance'];?>
                        <td><?php echo $ligne['heure'];?></td>
                        <td><?php echo $ligne['lieu'];?></td>
                        <td><?php echo $ligne['raison'];?></td>
                </tbody>    
                <?php }?>
            </table>
        </div>   
</body>
</html>