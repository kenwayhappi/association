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
                        <h6>Vos Diffent service</h6>
                        <h1>Que voulez vous faire ?</h1>
                        <p class="mx-auto"></p>
                    </div>
                </div>
            </div></a>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="ltb.php">
                        <img src="img/icon1.png" alt="">
                        <h5>Lister banque</h5>
                        <p>Ce service a été créé pour vous offrir une vue complète de toutes les banques avec lesquelles votre association es affilié</p></a>
                </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="ltmodp.php">
                        <img src="img/icon2.png" alt="">
                        <h5>Lister Mode paiement</h5>
                        <p>Ce service a été créé pour vous offrir une vue claire et organisée de tous les modes de paiement disponibles pour votre association</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="ltb.php">
                        <img src="../besoin/image/b.png">
                        <h5>Effectur un Paiement</h5>
                        <p>Ce service a été créé pour simplifier le processus de paiement au sein de votre association</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="reglerA.php">
                        <img src="img/icon4.png" alt="">
                        <h5>Regler Amende</h5>
                        <p>Ce service a été créé pour simplifier le processus de règlement des amendes au sein de votre association</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="reglerE.php">
                        <img src="img/icon5.png" alt="">
                        <h5>Regler un Emprunt</h5>
                        <p>Ce service a été créé pour simplifier le processus de règlement des Emprunt au sein de votre association</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="listeco.php">
                        <img src="img/icon4.png" alt="">
                        <h5>consulter ses cotisation pour la tontine</h5>
                        <p>Ce service a été créé pour vous permettre de garder un suivi précis de vos cotisations au sein de la tontine</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="ltb.php">
                        <img src="img/icon4.png" alt="">
                        <h5>consulter ses amendes</h5>
                        <p>Ce service a été créé pour vous permettre de garder un suivi précis de toutes les amendes qui vous ont été attribuées. Vous pouvez consulter les détails de chaque amende, les montants dus, les dates d'échéances,et plus encore</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="ltb.php">
                        <img src="img/icon4.png" alt="">
                        <h5>consulter ses cotisations pour la banque scolaire</h5>
                        <p>Ce service a été conçu pour vous offrir une visibilité complète sur toutes vos cotisations liées à la banque scolaire</p></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                    <a href="ltb.php">
                        <img src="img/icon6.png" alt="">
                        <h5>consulter ses Fonds</h5>
                        <p>Ce service a été crée pour vous offrir une vue transparente et accessible sur l'état de vos fonds de l'association</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>