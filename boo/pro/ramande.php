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
            <li><a href="#" class="active">Regler Amande</a></li>
        </ul>
        <div class="container">
            <div class="text-center mb-4">
                <h3>Regler Amande</h3>
                <p class="text-muted">Ici vous vous régler les amandes votre association</p>
            </div>
            <div class="container d-flex justify-content-center">
            <table class="table table-hover tex-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nom - prenom</th>
                        <th scope="col">Raison</th>
                        <th scope="col">Date de contaction</th>
                        <th scope="col">date_regler</th>
                        <th scope="col">photo</th>
                        <th>Regler</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                   
                    while($ra=mysqli_fetch_assoc($ram)){
                ?>
                    <tr>
                        <td><?php 
                            $nom = $ra['nom'];
                            $prenom = $ra['prenom'];
                            echo $nom." - ".$prenom;
                            ?></td>
                        <td><?php echo $ra['raison'];?></td>
                        <td><?php echo $ra['date_amande'];?></td>
                        <td><?php echo $ra['date_regler'];?></td>
                        <td><img src="<?php echo $ra['photo'];?>" width="48"></td>
                        <td><a href="reglerA.php?complet=<?php echo $ra['id_regler'];?>">o<i class='bx bxs-edit' ></i></a></td>
                </tbody>    
                <?php  }?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>