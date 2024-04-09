<?php
    include ('navd.php');
    if(isset($_POST["submit1"]))
        header("location:Amender.php");
    if(isset($_POST["submit2"]))
        header("location:RAmende.php");
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
        <form method="POST">
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">cotisation</a></li>
        </ul>
        <div class="container">
            <a href="addco.php" class="btn btn-outline-info rounded-0 merriweather mb-3">Add cotisation</a>
            
            <table class="table table-hover tex-center">
            <br>
            <div class="row mb-3"> 
                <div class="col">
                    <input type="search" placeholder="nom ou prenom du membre" name="re" class="form-control">
                </div>
                <div class="col">
                    <input type="submit" name="btn" value="rechercher" class="btn btn-primary">
                </div>
            </div>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TAUX</th>
                        <th scope="col">date_debut</th>
                        <th scope="col">montant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['btn'])){
                    $mc = 1;
                    $mc = $_POST['re'];
                    $req = mysqli_query($conn,"SELECT * FROM cotisation where taux like '%$mc%' AND id_association='{$_SESSION['id_association']}'");
                }else{
                    $req =mysqli_query($conn,"SELECT * FROM cotisation where id_association='{$_SESSION['id_association']}' LIMIT 10");
                }

                    while ($ligne=mysqli_fetch_assoc($req)){
                ?>
                    <tr>
                        <td><?php echo $ligne['id_cotisation'];?></td>
                        <td><?php echo $ligne['taux'];?>%</td>
                        <td><?php echo $ligne['date_debut'];?></td>
                        <td><?php echo $ligne['montant'];?></td>
                        <td><a href="deco.php?complet=<?php echo $ligne['id_cotisation'];?>"><i class='bx bx-trash'></i></a>
                        <a href="modco.php?complet=<?php echo $ligne['id_cotisation'];?>"><i class='bx bx-edit' ></i></a>
                </tbody>    
                <?php } ?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>