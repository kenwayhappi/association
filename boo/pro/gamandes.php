<?php
    include ('navd.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    :root{
            --first-color:#1A73E8;
            --input-color:#80868B;
            --border-color: #DADCE0;
            --body-font: 'Roboto' ,sans-serif;
            --normal-font-size:1rem;
            --small-font-sieze: .75rem;
            --color1: #0f3f49;
            --color2: #f3f1f9;
            --color3: #4e7d55;
            --color4: #f1f9f9;
            --color :  #f1f9f9;
            --color6 : #662a2c;
            }
        .form_div{
            position: relative;
            height: 200px;
            width : 300px;
            margin-left : 300px;
            margin-top: 10rem;
        }
    .bouton{
            display: block;
            width: 150%;
            height: 30%;
            outline: none;
            border: none;
            margin-bottom: 1.5rem;
            background-color: var(--color6);
            color: #fff;
            font-size: var(--normal-font-size);
            border-radius: .5rem;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
            transition: .3s;
            transition:transform .2s;
        
        }
    .bouton:hover{
        -ms-transform : scale(1.2);
        -webkit-transform: scale(1.2);
        transform : scale(1.2);
    }
</style>
<body>
    <form action="" method="post">
        <div class="form_div">
            <a href="amanderm.php" class="btn bouton">Amender Membre</a>
            <a href="listep.php" class="btn bouton">Liste Membre Amandé</a>
            <a href="ramande.php" class="btn bouton">Regler Amende</a>
        </div>
    </form>
</body>
</html>