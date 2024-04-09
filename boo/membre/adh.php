<?php include_once "nav.php"; 
echo "<p> Total <b> ".$nombre."</b> Association</p>";
 $complet=$_GET['complet'];
 $res = mysqli_fetch_assoc(mysqli_query($conn,"select * from cotisation  where id_cotisation='$complet'"));
 $nombre = $res['nbr_membre'];
 if($nombre == 1){
    echo "<script> 
    alert(\" Nombre de place deja atteint \");
    window.location.href = \"listeco.php\";
    </script>"; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
    --brand: #7b29ff;
    --dark: #092032;
    --body: #516171;
    --border: rgba(0,0,0,0.08);
    --shadow: 0px 6px 30px rgba(0, 0, 0, 0.08);
    
}
    .service {
        padding: 32px;
        background-color: #fff;
        box-shadow: var(--shadow);
    }
    .service h5 {
        margin-top: 24px;
        margin-bottom: 14px;
    }
    .service img {
        width: 90px;
    }
    .intro {margin-bottom: 36px;
text-align: center;}

.intro p {
    max-width: 500px;
}
.intro h6{
    color: var(--brand);
    font-weight: 400;
    text-transform: uppercase;
}

.intro h1 {
    margin-top: 15px;
    margin-bottom: 15px;
}

.info-box {
    align-items: center;
    display: flex;
}

.info-box img {
    width: 90px;
}
a {
    color: var(--dark);
    transition: all 0.4s ease;
    font-weight: 500;
    text-decoration:none;
}

a:hover {
    color: var(--brand);
}
    </style>
</head>
<body>

</body>
</html>