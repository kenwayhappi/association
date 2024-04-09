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
                                <h4 class="card-title">Intégrer cotisation</h4>
                                <?php
                                    $req = mysqli_query($conn,"SELECT * FROM cotisation where id_association='".$_SESSION['id_association']."'");
                                    while ($ra=mysqli_fetch_assoc($req)){
                                ?>
                                <h6 class="card-subtitle">Differente <code>cotisation et place</code></h6>
                                <div class="table-responsive">
                                    <table class="table color-table danger-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">montant</th>
                                                <th scope="col">nbr_place_demander</th>
                                                <th scope="col">nbr_place_prise</th>
                                                <th scope="col">taux</th>
                                                <th scope="col">date_debut</th>
                                                <th scope="col">Intégrer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $ra['montant'];?></td>
                                                <td><?php echo $ra['nbr_membre'];?></td>
                                                <td><?php echo $ra['nbr_membre'];?></td>
                                                <td><?php echo $ra['taux'];?>%</td>
                                                <td><?php echo $ra['date_debut'];?></td>
                                                <td><a href="coti.php?complet=<?php echo $ra['id_cotisation'];?>">Intégrer</a></td>
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