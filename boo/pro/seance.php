<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association</title>
</head>
<body>
    <main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">seance</a></li>
        </ul>
        <div class="container">
            <a href="adds.php?complet=<?php echo $ligne['id_association'];?>" class="btn btn-outline-info rounded-0 merriweather mb-3">Creation seance</a>
            <table class="table table-hover tex-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">date</th>
                        <th scope="col">heure</th>
                        <th scope="col">lieu</th>
                        <th scope="col">raison</th>
                    </tr>
                </thead>
                <?php
                    while ($ligne=mysqli_fetch_assoc($resA)){    
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $ligne['id'];?></td>
                        <td><?php echo $ligne['date_seance'];?>
                        <td><?php echo $ligne['heure'];?></td>
                        <td><?php echo $ligne['lieu'];?></td>
                        <td><?php echo $ligne['raison'];?></td>
                        <td><a href="sups.php?complet=<?php echo $ligne['id'];?>"><i class='bx bx-trash'></i></a>
                        <a href="mods.php?complet=<?php echo $ligne['id'];?>"><i class='bx bxs-edit' ></i></a>
                        <a href="../fac/fac.php?complet=<?php echo $ligne['id'];?>"><i class='bx bxs-bullseye'></i></a></td>
                </tbody>    
                <?php }?>
            </table>
        </div> 
        <?php 
            $date= date('Y-m-d');
            $heure= date("H:i:s");
            $sql = mysqli_query($conn,"SELECT * FROM seance WHERE (date_seance='$date' AND heure<='$heure') OR date_seance < '$date' ");
            $num = mysqli_num_rows($sql);
            if($num > 0){
                while($su = mysqli_fetch_assoc($sql)){
                    $id_seance = $su['id'];
                    $sql_supprimer =  mysqli_query($conn,"DELETE FROM seance WHERE id = $id_seance");
                }
            }
            echo $heure
        ?>
        </form>
    </main>
</body>
</html>