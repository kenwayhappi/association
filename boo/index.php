<?php require_once('connexion.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="besoin/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="icon" href="besoin/image/aa.png" type="image/x-icon">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="besoin/css/style.css">

    <title>AssociaEase</title>
</head>

<body>

<?php
    include 'nav.php';
    ?>

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">ENSEMBLE C'EST POSSIBLE</h6>
                        <h1 class="display-3 my-4">Prennez en main<br /> votre association</h1>
                        <a href="login.php" class="btn btn-brand">Connexion</a>
                        <a href="membre/register.php" class="btn btn-outline-light ms-3">Inscription</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">ENSEMBLE C'EST POSSIBLE</h6>
                        <h1 class="display-3 my-4">Votre solution<br /> a votre portée</h1>
                        <a href="login.php" class="btn btn-brand">Connexion</a>
                        <a href="membre/register.php" class="btn btn-outline-light ms-3">Inscription</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 py-5">
                    <div class="row">

                        <div class="col-12">
                            <div class="info-box">
                                <img src="img/icon3.png" alt="">
                                <div class="ms-4">
                                    <h5>Gestion des membres </h5>
                                    <p>Suivi des informations des membres, de leurs cotisations, de leur participation aux activités, etc. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="img/icon4.png" alt="">
                                <div class="ms-4">
                                    <h5>Sécurité des données</h5>
                                    <p>Assurer la confidentialité et la sécurité des informations des membres et de l'association</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="img/icon5.png" alt="">
                                <div class="ms-4">
                                    <h5>Inscription aux événements </h5>
                                    <p>Permettre aux membres de s'inscrire en ligne aux événements organisés par l'association</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="img/i/post-1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    

    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">AssociaEase<span class="dot">.</span></h4>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from</p>
                        <div class="col-auto social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-pinterest'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">AssociaEase@2023. All rights Reserved</p>
        </div>
    </footer>






    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>