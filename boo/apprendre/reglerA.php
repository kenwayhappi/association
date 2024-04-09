<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="membre.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Liste</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">regler une amande</h4>
                                <?php
                                    $req = mysqli_query($conn,"SELECT amande.*, amandem.* FROM amande LEFT JOIN amandem 
                                    ON amande.id_amande = amandem.id_amande
                                    WHERE amandem.id_membre='".$rows['id_membre']."'");
                                    while ($ra=mysqli_fetch_assoc($req)){
                                ?>
                                <h6 class="card-subtitle">raison <code>et la durée de votre amande</code></h6>
                                <div class="table-responsive">
                                    <table class="table color-table danger-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Raison</th>
                                                <th scope="col">Somme</th>
                                                <th scope="col">Date de contaction</th>
                                                <th scope="col">Durée avant règlement</th>
                                                <th scope="col">Rembourser</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $ra['raison'];?></td>
                                                <td><?php echo $ra['montant'];?></td>
                                                <td><?php echo $ra['date_debut'];?></td>
                                                <td><?php echo $ra['delai'];?></td>
                                                <td><a href="rav.php?identite=<?php echo $rows['id_membre']?> ">Rembourser</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</body>
</html>