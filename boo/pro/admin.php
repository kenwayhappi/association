<?php
    include ('navd.php');
?>
<!DOCTYPE html>

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
		            <a href="membre.php"> <i class='bx bxs-group'></i></a>
			        <span class="text">
				        <h3><?php echo $nbrm; ?></h3>
				        <p>Membre</p>
			        </span>
		        </li>
		        <li>
                    <a href="cotisation.php"> <i class='bx bxs-message-dots' ></i></a>
					<span class="text">
                        <h3><?php echo $nbrco; ?></h3>
						<p>cotisation</p>
					</span>
				</li>
                <li>
                <a href="seance.php"><i class='bx bxs-bell'></i></a>
					<span class="text">
                        <h3><?php echo "".$nbrA; ?></h3>
						<p>Seance</p>
					</span>
				</li>
                <li>
                <a href="membre.php">
					<i class='bx bxs-calendar-event'></i></a>
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