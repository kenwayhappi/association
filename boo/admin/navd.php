<?php require_once('../connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../besoin/image/aa.png" type="image/x-icon">
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

	$reqA="SELECT * FROM contact";
	$resA=mysqli_query($conn,$reqA);
	$nbrA=mysqli_num_rows($resA);

    $req="SELECT * FROM association";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
?>
   <!-------sidebar-------->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bx-smile'></i>Admin</a>
        <ul class="side-menu">
            <li><a href="admin1.php" class="active"><i class='bx bxs-dashboard icon'></i>Dashboard</a></li>
            <li class="divider">Main</li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon' ></i>Element<i class='bx bx-chevron-right icon-right' >
                  </i></a>
                 <ul class="side-dropdown">
                    <li><a href="#">Membre</a></li>
                    <li><a href="#">Cotisation</a></li>
                    <li><a href="#">evenement</a></li>
                    <li><a href="#">Membre</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="asso.php"><i class='bx bx-line-chart icon' ></i>Association</a></li>
            <li><a href="#"><i class='bx bxs-widget icon' ></i>Widgets</a></li>
            <li class="divider">Table and forms</li>
            <a href="#"><i class='bx bxs-dashboard icon'></i>Tables</a></li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon' ></i>Forms<i class='bx bx-chevron-right icon-right' >
                  </i></a>
                 <ul class="side-dropdown">
                    <li><a href="#">Element</a></li>
                    <li><a href="#">Cotisation</a></li>
                    <li><a href="#">evenement</a></li>
                    <li><a href="#">Membre</a></li>
                </ul>
            </li>
        </ul>
        <div class="ads">
            <div class="wrapper">
                <a href="modad.php" class="btn-upgrade">Upgrade</a>
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
            <a href="#" class="nav-link">
                <i class='bx bx-bell icon'></i>
                <span class="badge"><?php echo "$nbr";?></span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bx-message-dots' ></i>
                <span class="badge"><?php echo "$nbr";?></span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="../img/az.jpg" alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bx-user-circle icon'></i>profile</a></li>
                    <li><a href="#"><i class='bx bx-cog' ></i>setting</a></li>
                    <li><a href="../deco.php"><i class='bx bx-log-in'></i>Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-------navbar-------->
        


  <script src="../besoin/js/navd.js"></script>
</body>
</html>