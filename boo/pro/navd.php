<?php require_once('../connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../besoin/image/aa.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../besoin/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../besoin/css/navd.css">
    <title>Document</title>
    <script>
// Fonction pour actualiser la page
function actualiserPage() {
    location.reload(); // Recharge la page
}

// Appelle la fonction pour actualiser toutes les 1 minute (60000 millisecondes)
setInterval(actualiserPage, 60000);
</script>
</head>
<body>
    
<?php
session_start();
    include_once "../connexion.php";
    if(!isset($_SESSION['id_association'])){
        header("location: ../login.php");
    }
	$resA=mysqli_query($conn,"SELECT * FROM seance where id_association='".$_SESSION['id_association']."'");
	$nbrA=mysqli_num_rows($resA);

    $ram = mysqli_query($conn,"SELECT * FROM regler where statut='payer' AND id_association='".$_SESSION['id_association']."'");
    $raz=mysqli_num_rows($ram);

    $resco=mysqli_query($conn,"SELECT * FROM cotisation where id_association='".$_SESSION['id_association']."'");
	$nbrco=mysqli_num_rows($resco);

    $reqam =mysqli_query($conn,"SELECT * FROM amande where id_association='".$_SESSION['id_association']."'");

    $resulpa=mysqli_query($conn,"SELECT * FROM modpa where id_association='".$_SESSION['id_association']."'");

	$resm=mysqli_query($conn,"SELECT * FROM membres where id_association='".$_SESSION['id_association']."'");
	$nbrm=mysqli_num_rows($resm);

    $resulba =mysqli_query($conn,"SELECT * FROM banque where id_association='".$_SESSION['id_association']."'");

    $req="SELECT * FROM association where id_association='".$_SESSION['id_association']."'";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
    if ($ligne=mysqli_fetch_assoc($res)){
?>
   <!-------sidebar-------->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bx-smile'></i>Admin</a>
        <ul class="side-menu">
            <li><a href="admin.php" class="active"><i class='bx bxs-dashboard icon'></i><?php echo $ligne['nom'];?></a></li>
            <li class="divider">Main</li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon' ></i>Element<i class='bx bx-chevron-right icon-right' >
                  </i></a>
                 <ul class="side-dropdown">
                    <li><a href="amande.php">Amande</a></li>
                    <li><a href="seance.php">seance</a></li>
                    <li><a href="banque.php">Banque</a></li>
                    <li><a href="paiement.php">Mode de paiement</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="membre.php"><i class='bx bx-line-chart icon' ></i>Membre</a></li>
            <li><a class="nav-link" href="chat.php"><i class='bx bx-line-chart icon' ></i>Chat</a></li>
            <li><a href="cotisation.php"><i class='bx bxs-widget icon' ></i>cotisation</a></li>
            <li class="divider">Table and forms</li>
            <a href="#"><i class='bx bxs-dashboard icon'></i>Tables</a></li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon' ></i>Traitement<i class='bx bx-chevron-right icon-right' >
                  </i></a>
                 <ul class="side-dropdown">
                    <li><a href="gamandes.php">Gestion des amandes</a></li>
                    <li><a href="gcotisation.php">Gestion des cotisation</a></li>
                    <li><a href="gemprunt.php">Gestion des Emprunt</a></li>
                    <li><a href="effdepot.php">Effectuer depôt</a></li>
                    <li><a href="achatco.php">Achat cotisation tontine</a></li>
                </ul>
            </li>
            <a href="../deconnection.php"><i class='bx bxs-dashboard icon'></i>Deconnection</a></li>
        </ul>
        <div class="ads">
            <div class="wrapper">
                <a href="moda.php" class="btn-upgrade">Upgrade</a>
                <p>Bienvenue <span>chez ASSOCIAEASE</span> modifier votre <span> association</span></p>
            </div>
        </div>
    </section>
  <!-------End sidebar-------->
    <section id="content">
        <!-------navbar-------->
        <nav>
            <i class='bx bx-menu toggle-sidebar' ></i>
            <form action="#">
                <div class="form-group">
                    <input type="search" placeholder="Search...">
                    <i class='bx bx-search-alt-2 icon' ></i>
                </div>
            </form>
            <a href="ramande.php" class="nav-link">
                <i class='bx bx-bell icon'></i>
                <span class="badge"><?php 
                if($raz=0) echo "$ram";?></span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bx-message-dots' ></i>
                <span class="badge"><?php echo "$nbr";?></span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="../image/<?php echo $ligne['photo'];?>" width="48">
                <ul class="profile-link">
                    <li><a href="moda.php"><i class='bx bx-user-circle icon'></i>profile</a></li>
                    <li><a href="moda.php"><i class='bx bx-cog' ></i>setting</a></li>
                    <li><a href="../deconnection.php"><i class='bx bx-log-in'></i>Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-------navbar-------->
        
<?php } ?>

  <script src="../besoin/js/navd.js"></script>
</body>
</html>