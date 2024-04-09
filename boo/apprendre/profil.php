<?php include_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php
        $ab = mysqli_query($conn,"SELECT * FROM association where id_association='".$_SESSION['id_association']."'");
        if($row=(mysqli_fetch_assoc($ab))){
        ?>
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
                        <li class="breadcrumb-item"><a href="membre.php">Home</a></li>
                        <li class="breadcrumb-item active">profil</li>
                    </ol>
                </div>
               
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Profil</h4>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body">
                                        <h3 class="box-title">Information personnel</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Votre Nom:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $rows['nom'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Votre Prenom:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $rows['prenom'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Votre Association:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row['nom'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Date:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $date ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Numero:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $rows['numero_telephone'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Adresse:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $rows['adresse'] ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="update.php"><button type="button" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit</button></a>
                                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
             } 
                ?>
                </div>
</body>
</html>