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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des banques</h4>
                                <?php
                                while($banque=(mysqli_fetch_assoc($resulba))){
        
                                ?>
                                <h6 class="card-subtitle">la liste <code>des banques donc votre association est en partenaria</code></h6>
                                <div class="table-responsive">
                                    <table class="table color-table primary-table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Somme</th>
                                                <th>Photo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $banque['nom'];?></td>
                                                <td><?php echo $banque['somme'];?></td>
                                                <td><img src="../image/<?php echo $banque['photo'];?>" width="48"></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Different mode de paiment</h4>
                                <h6 class="card-subtitle">la liste <code>des modes de paiement de votre association</code></h6>
                                <?php
                                    while($paye=(mysqli_fetch_assoc($resulpa))){
        
                                ?>
                                <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">NOM</th>
                                                <th scope="col">IMAGE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $paye['nom'];?></td>
                                                <td><img src="../image/<?php echo $paye['photo'];?>" width="48"></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>