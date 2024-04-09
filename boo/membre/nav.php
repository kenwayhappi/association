<?php include_once "../connexion.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Page de présentation - Tontine</title>
    <link rel="icon" href="../besoin/image/aa.png" type="image/x-icon">
    <link rel="stylesheet" href="../besoin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../besoin/css/style.css">
  <link rel="stylesheet" type="text/css" href="z.css">
  <script>
// Fonction pour actualiser la page
function actualiserPage() {
    location.reload(); // Recharge la page
}

// Appelle la fonction pour actualiser toutes les 1 minute (60000 millisecondes)
setInterval(actualiserPage, 60000);
</script>
<script language="javascript">
    res = <?php echo json_encode($resno); ?>;
        let nav = document.getElementById("nav");
        if(res > 0 ){
             nav.style.background = "red"; }
        function rien(){
            nav.style.background = ""; 
        }
    </script>
</head>
<body>
<?php
        session_start();
        include_once "../connexion.php";
        if(!isset($_SESSION['id_association'])){
            header("location: ../login3.php");
        }

        $date = date('Y-m-d');

        
        $reqno = mysqli_query($conn,"SELECT * FROM notifications where etat = 0 and 
        id_association='".$_SESSION['id_association']."' and id_membre='".$_SESSION['membre']."'");
        $nbr=mysqli_num_rows($reqno);

        $ress = mysqli_query($conn,"SELECT * FROM seance where id_association='".$_SESSION['id_association']."'");
        $nbrs=mysqli_num_rows($ress);

        $resulta = mysqli_query($conn,"SELECT * FROM association where id_association='".$_SESSION['id_association']."'");
        
        $co = mysqli_query($conn,"SELECT * FROM cotisation where id_association='".$_SESSION['id_association']."'");

        $resulpa =mysqli_query($conn,"SELECT * FROM modpa where id_association='".$_SESSION['id_association']."'");

        $resulba =mysqli_query($conn,"SELECT * FROM banque where id_association='".$_SESSION['id_association']."'");

    $result = mysqli_query($conn,"SELECT * FROM membres where id_association='".$_SESSION['id_association']."' AND id_membre='".$_SESSION['membre']."'");
    if($rows=(mysqli_fetch_assoc($result))){
        
        
  ?>
  
  
    <div class="hero">
        <nav>
            <img src="../besoin/image/aa.png" width="58">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a href="service.php">Services</a></li>
            </ul>
            <img src="<?php echo $rows['photo'];?>" class="user-pic" onclick="toggleMenu()"> 
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="<?php echo $rows['photo'];?>">
                        <h2><?php echo $rows['nom'];?></h2>
                    </div>
                    <hr>

                    <a class="sub-menu-link" href="mod.php?complet=<?php echo $rows['id_membre'];?>">
                        <img src="../images/profile.png">
                        <p>Modifier le profil</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/help.png">
                        <p>Aide et support</p>
                        <span>></span>
                    </a>
                    <a href="../deco" class="sub-menu-link">
                        <img src="../images/logout.png">
                        <p>deconnection</p>
                        <span>></span>
                    </a>
                    
                </div>
            </div>
        </nav >
        <?php
                    } 
                ?>
    </div>
    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>
