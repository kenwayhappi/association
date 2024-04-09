<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
session_start();
include_once "../connexion.php";
if(!isset($_SESSION['email'])){
    header("location: ../login.php");
}
$complet=$_GET['complet'];
$req="SELECT * FROM association
where id_association='$complet'";
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
            <li><a href="asso.php">Home</a></li>
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
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>ID-ASSOCIATION</td>
                        <td><?php echo $ligne['id_association'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>mot de passe</td>
                        <td><?php echo $ligne['mdp'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $ligne['email'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Numero</td>
                        <td><?php echo $ligne['telephone'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>nombre_membre</td>
                        <td><?php echo $ligne['nbr_membre'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>date de creation</td>
                        <td><?php echo $ligne['date_creation'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>date dernière modification</td>
                        <td><?php echo $ligne['modification'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td><?php echo $ligne['description_A'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Responsable</td>
                        <td><?php echo $ligne['responsable'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><?php echo $ligne['type_association'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cotisation</td>
                        <td><?php echo $ligne['cotisation'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Statut</td>
                        <td><?php echo $ligne['statut'];?></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>photo</td>
                        <td><img src="<?php echo $ligne['photo'];?>" width="58"></td>
                        <td>
                            <a href="upd.php?upd=<?php echo $ligne['id_association'];?>"><i class='bx bxs-edit' ></i></a>
                        </td>
                    </tr>
                </tbody>
    </table>
                     <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="asso.php" class="btn btn-danger">Cancel</a>
                    </div>
                <?php

                    
                ?>
                    <tr>

        <?php } ?> 