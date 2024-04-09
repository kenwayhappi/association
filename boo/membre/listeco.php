<?php include_once "nav.php"; ?>
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
<section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h6>Differente cotisation avec leur taux</h6>
                        <h1>ou voulez vous adhérez ?</h1>
                        <p class="mx-auto"></p>
                    </div>
                </div>
            </div></a>
            <?php
while($cot=(mysqli_fetch_assoc($co))){
        
        ?>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="adh.php?complet=<?php echo $cot['id_cotisation'];?>">
                        <h5>Taux <?php echo $cot['taux'];?> %</h5>
                        <p>Montant <?php echo $cot['montant'];?></p></a>
                </div>
                </div>
                <?php } ?>
</body>
</html>