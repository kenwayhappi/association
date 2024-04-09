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
                                <h4 class="card-title">Information sur la séeance</h4>
                                <h6 class="card-subtitle">votre association <code>a lancé une séance et voila les informations</code></h6>                                
                                <div class="table-responsive">
                                    <table class="table color-table primary-table">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>heure</th>
                                                <th>lieu</th>
                                                <th>raison</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                while ($ligne=mysqli_fetch_assoc($ress)){ 
        
                                ?>
                                            <tr>
                                                <td><?php echo $ligne['date_seance'];?>
                                                <td><?php echo $ligne['heure'];?></td>
                                                <td><?php echo $ligne['lieu'];?></td>
                                                <td><?php echo $ligne['raison'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>