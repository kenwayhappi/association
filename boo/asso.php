<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<?php
session_start();
include_once "connexion.php";
if(!isset($_SESSION['email'])){
    header("location: login.php");
}
	$req="SELECT * FROM association";
	$res=mysqli_query($conn,$req);
	$nbr=mysqli_num_rows($res);
	echo "<p> Total <b> ".$nbr."</b> Association</p>";
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
            <li><a href="#" class="active">Associations</a></li>
        </ul>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New Association</h3>
                <p class="text-muted">Ici vous ete capable de gérer tout les association</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="post" action="" style="width:50vw; min-width:300px;">
                    <div class="row">
                        <div class="col">
                            <label for="form-labe">IDA</label>
                            <input type="number" class="form-control" name="IDA" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>