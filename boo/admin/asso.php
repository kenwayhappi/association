<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: ../login.php");
}
	$req="SELECT * FROM association";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
	echo "<p> Total <b> ".$nbr."</b> Association</p>";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form method="post">
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Associations</a></li>
        </ul>
        <div class="container">
            <a href="adda.php" class="btn btn-outline-info rounded-0 merriweather mb-3">Add Association</a>
            
            <table class="table table-hover tex-center">
            <div class="row mb-3"> 
                <div class="col">
                    <input type="search" placeholder="nom de l'association ou du responsable" name="re" class="form-control">
                </div>
                <div class="col">
                    <input type="submit" name="btn" value="rechercher" class="btn btn-primary">
                </div>
            </div>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOM</th>
                        <th scope="col">RESPONSABLE</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">Dte Creation</th>
                        <th scope="col">Type</th>
                        <th scope="col">MOT DE PASSE</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    if(isset($_POST['btn'])){
                    $mc = 1;
                    $mc = $_POST['re'];
                    $req = mysqli_query($conn,"SELECT * FROM association where nom or responsable like '%$mc%'");
                    }else{
                    $req =mysqli_query($conn,"SELECT * FROM association LIMIT 10");    
                }
                    while ($ligne=mysqli_fetch_assoc($req)){
                ?>
                    <tr>
                        <td><?php echo $ligne['id_association'];?></td>
                        <td><?php echo $ligne['nom'];?></td>
                        <td><?php echo $ligne['responsable'];?></td>
                        <td><img src="../image/<?php echo $ligne['photo'];?>" width="48"></td>
                        <td><?php echo $ligne['email'];?></td>
                        <td><?php echo $ligne['date_creation'];?></td>
                        <td><?php echo $ligne['type_association'];?></td>
                        <td><?php echo $ligne['mdp'];?></td>
                        <td><a href="sup.php?complet=<?php echo $ligne['id_association'];?>"><i class='bx bx-trash'></i></a>
                        <a href="moda.php?complet=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        <a href="view.php?complet=<?php echo $ligne['id_association'];?>"><i class='bx bxs-bullseye'></i></a></td>
                </tbody>    
                <?php } ?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>