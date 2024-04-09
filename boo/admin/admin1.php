<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
session_start();
include_once "../connexion.php";
if(!isset($_SESSION['email'])){
    header("location: ../login.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <ul class="box-info">
		        <li>
		            <a href="asso.php"> <i class='bx bxs-group'></i></a>
			        <span class="text">
				        <h3><?php echo $nbr; ?></h3>
				        <p>Association</p>
			        </span>
		        </li>
		        <li>
                <i class='bx bxs-message-dots' ></i>
					<span class="text">
                        <h3><?php echo $nbrA; ?></h3>
						<p>Message</p>
					</span>
				</li>
                <li>
                <i class='bx bxs-bell'></i>
					<span class="text">
                        <h3><?php echo "".$nbrA; ?></h3>
						<p>Notification</p>
					</span>
				</li>
                <li>
					<i class='bx bxs-calendar-event'></i>
					<span class="text">
                        <h3><?php echo "".$nbrA; ?></h3>
						<p>Evenement</p>
					</span>
				</li>
            </ul>
        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>texte</h3>
                    <div class="menu">

                    </div>
                </div>
            </div>
            <div class="content-data">
                <div class="head">
                    <h3>texte</h3>
                    <div class="menu">
                        
                    </div>
                </div>
            </div>
        </div>
        </main>
    </section>
</body>
</html>