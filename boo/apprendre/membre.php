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
                        <li class="breadcrumb-item"><a href="membre.php">Home</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
               
            </div>
            <div class="container-fluid">
            <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2>Statut <i class="ti-angle-down font-14 text-danger"></i></h2>
                                        <h4>
                                            <?php 
                                                $lien="reglerA.php";
                                                $texte="Amander";
                                                if($rows['statut']=="Amander"){
                                                echo"<a href='$lien'>$texte</a>";
                                                }else echo "normal";
                                            ?>
                                        </h4></div>
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <div id="sparklinedash3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2 class="">Séance<i class="ti-angle-up font-14 text-success"></i></h2>
                                        <h4><?php 
                            if($nbrs!=0) {
                            $lien="infoseance.php";
                            $texte="seance lancé";
                            echo"<a href='$lien'>$texte</a>";
                            }else echo"aucune";
                            ?></h4></div>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                <?php
                                $resulta = mysqli_query($conn,"SELECT * FROM association where id_association='".$_SESSION['id_association']."'");
                                    if($ligne=(mysqli_fetch_assoc($resulta))){
                                ?>
                                    <div class="col-8"><h2>Votre association<i class="ti-angle-up font-14 text-success"></i></h2>
                                        <h4><img src="<?php echo $ligne['photo'];?>" alt="Acceuil" class="dark-logo" width="20"/> <span> <span> </span></span><?php echo $ligne['nom'];?></h4></div>
                                        <?php
                                            } 
                                        ?>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2>Cotisation<i class="ti-angle-down font-14 text-danger"></i></h2>
                                        <h4><?php 
                                        $co = mysqli_query($conn,"SELECT * FROM cotisation where id_association='".$_SESSION['id_association']."'");
                                        $nbrco = mysqli_num_rows($co);
                                            if($nbrco!=0) {
                                            $lien="listecotisation.php";
                                            $texte="Cotisation lancé";
                                            echo"<a href='$lien'>$texte</a>";
                                            }else echo"aucune";
                            ?></h4></div>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>