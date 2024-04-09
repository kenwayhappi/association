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
        <form action="get">
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Banque</a></li>
        </ul>
        <div class="container">
            <a href="banadd.php" class="btn btn-outline-info rounded-0 merriweather mb-3">Add Banque</a>
            
            <table class="table table-hover tex-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Somme</th>
                        <th scope="col">Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    while ($banque=mysqli_fetch_assoc($resulba)){
                ?>
                    <tr>
                        <td><?php echo $banque['id_banque'];?></td>
                        <td><?php echo $banque['nom'];?></td>
                        <td><?php echo $banque['somme'];?></td>
                        <td><img src="<?php echo $banque['photo'];?>" width="48"></td>
                        <td><a href="bansu.php?complet=<?php echo $banque['id_banque'];?>"><i class='bx bx-trash'></i></a>
                        <a href="banmod.php?complet=<?php echo $banque['id_banque'];?>"><i class='bx bxs-edit' ></i></a>
                </tbody>    
                <?php } ?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>