<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
    $complet=$_GET['complet'];
    $req="SELECT * FROM membres
    where id_membre='$complet'";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
    if($ligne=mysqli_fetch_assoc($res)){
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1 class="title"><?php
	echo $ligne['nom'];?></h1>
        <ul class="breadcrumbs">
            <li><a href="membre.php">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Associations <?php
	echo $ligne['nom'];?></a></li>
        </ul>

        <table class="table table-hover tex-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">NOM</th>
                        <th scope="col">Valeur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $ligne['id'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>ID-membre</td>
                        <td><?php echo $ligne['id_membre'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>mot de passe</td>
                        <td><?php echo $ligne['mdp'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><?php echo $ligne['adresse'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Numero</td>
                        <td><?php echo $ligne['numero_telephone'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>date d'adhesion</td>
                        <td><?php echo $ligne['date_adhesion'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>nom</td>
                        <td><?php echo $ligne['nom'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>prenom</td>
                        <td><?php echo $ligne['prenom'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><?php echo $ligne['usertype'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>photo</td>
                        <td><img src="<?php echo $ligne['photo'];?>" width="48"></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                </tbody>
    </table>
                     <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="membre.php" class="btn btn-danger">Cancel</a>
                    </div>
                <?php

                    
                ?>
                    <tr>

        <?php } ?> 