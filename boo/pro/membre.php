<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php

	$req="SELECT * FROM membres where id_association='".$_SESSION['id_association']."'";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
	echo "<p> Total <b> ".$nbr."</b> Membre</p>";
?>
<style>
    #btn{

    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            <li><a href="#" class="active">Membre</a></li>
        </ul>
        <div class="container">
            <a href="addm.php" class="btn btn-outline-info rounded-0 merriweather mb-3">Add Membre</a>
            
            <table class="table table-hover tex-center">
            <div class="row mb-3"> 
                <div class="col">
                    <input type="search" placeholder="nom ou prenom du membre" name="re" class="form-control">
                </div>
                <div class="col">
                    <input type="submit" name="btn" value="rechercher" class="btn btn-primary">
                </div>
            </div>
                
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOM</th>
                        <th scope="col">PRENOM</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">Dte adhesion</th>
                        <th scope="col">Numero</th>
                        <th scope="col">type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_POST['btn'])){
                        $mc = 1;
                        $a="user";
                        $mc = $_POST['re'];
                        $req = mysqli_query($conn,"SELECT * FROM membres where  id_association='".$_SESSION['id_association']."' AND (nom LIKE '%{$mc}%' OR prenom LIKE '%{$mc}%')");
                    }else{
                        $req =mysqli_query($conn,"SELECT * FROM membres where id_association='".$_SESSION['id_association']."' LIMIT 10");
                    }
                    while ($ligne=mysqli_fetch_assoc($req)){
                        mysqli_query($conn,"UPDATE association set nbr_membre='$nbr' where id_association='{$_SESSION['id_association']}'")
                ?>
                    <tr>
                        <td><?php echo $ligne['id_membre'];?></td>
                        <td><?php echo $ligne['nom'];?></td>
                        <td><?php echo $ligne['prenom'];?></td>
                        <td><img src="<?php echo $ligne['photo'];?>" width="48"></td>
                        <td><?php echo $ligne['adresse'];?></td>
                        <td><?php echo $ligne['date_adhesion'];?></td>
                        <td><?php echo $ligne['numero_telephone'];?></td>
                        <td><?php echo $ligne['usertype'];?></td>
                        <td><a href="sup.php?complet=<?php echo $ligne['id_membre'];?>"><i class='bx bx-trash'></i></a>
                        <a href="modm.php?complet=<?php echo $ligne['id_membre'];?>"><i class='bx bxs-edit' ></i></a>
                        <a href="view.php?complet=<?php echo $ligne['id_membre'];?>"><i class='bx bxs-bullseye'></i></a></td>
                </tbody>    
                <?php } ?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>