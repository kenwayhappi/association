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
            <li><a href="#" class="active">Amande</a></li>
        </ul>
        <div class="container">
            <a href="amadd.php" class="btn btn-outline-info rounded-0 merriweather mb-3">Add Amende</a>
            
            <table class="table table-hover tex-center">
            <br>
                    <input type="search" placeholder="raison amande" name="re">
                    <input type="submit" name="btn" value="rechercher">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">raison</th>
                        <th scope="col">montant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['btn'])){
                    $mc = 1;
                    $mc = $_POST['re'];
                    $req = mysqli_query($conn,"SELECT * FROM amande where raison like '%$mc%' AND id_association='{$_SESSION['id_association']}'");
                }else{
                    echo "amande non trouve";
                    $req =mysqli_query($conn,"SELECT * FROM amande where  id_association='{$_SESSION['id_association']}' LIMIT 10");
                }

                    while ($ligne=mysqli_fetch_assoc($req)){
                ?>
                    <tr>
                        <td><?php echo $ligne['id_amande'];?></td>
                        <td><?php echo $ligne['raison'];?></td>
                        <td><?php echo $ligne['montant'];?></td>
                        <td><a href="amadde.php?complet=<?php echo $ligne['id_amande'];?>"><i class='bx bx-trash'></i></a>
                        <a href="amadmod.php?complet=<?php echo $ligne['id_amande'];?>"><i class='bx bx-edit' ></i></a>
                </tbody>    
                <?php } ?>
            </table>
        </div>   
        </form>
    </main>
</body>
</html>