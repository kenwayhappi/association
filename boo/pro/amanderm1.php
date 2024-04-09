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
        *,::before,::after{
        box-sizing: border-box;
        }
        body{ 
            margin: 0;
            padding: 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            background-color: var(--color);
        }
        h1{
            margin: 0;
        }
        .l-form{
            display: flex; 
            position: relative;
            justify-content: center;
            align-items: center  ;
            height: 100%;
        }
        .l-form1{
            display: flex; 
            position: absolute;
            justify-content: center;
            align-items: center  ;
            height: 100%;
        }

        .form{
            width: 560px;
            padding: 1rem 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
            background-color : var(--color2);
        }
        .form_title{
            text-align : center;
            font-weight: 400;
            margin-bottom: 3rem;
            color : var(--color6)
        }
        .form_div{
            position: relative;
            height: 48px;
            margin-bottom: 1.5rem;
        }
        .form_div1{
            position: relative;
            height: 48px;
            margin-bottom: 1.5rem;
        }
        .form_input{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-size: var(--normal-font-size);
            border: 1px solid var(--border-color);
            border-radius: .5rem;
            outline: none;
            padding: 1rem;
            background: none;
            z-index: 1;
        }
        .form_input1{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            font-size: var(--normal-font-size);
            border: 1px solid var(--border-color);
            border-radius: .5rem;
            outline: none;
            padding: 1rem;
            background: none;
            z-index: 1;
        }
         .form_label{
            position: absolute;
            left: 1rem;
            top: 1rem;
            padding: 0 .25rem;
            background-color: var(--color2);
            color: var(--color6);
            font-size: var(--normal-font-size);
            transition: .3s;
        }
        .form_label1{
            position: relative;
            left: 1rem;
           
            padding: 0 .25rem;
            background-color: var(--color2);
            color: var(--color6);
            font-size: var(--normal-font-size);
            transition: .3s;
        }
        .form_button{
            display: block;
            margin-left: auto;
            padding: .75rem 2rem;
            outline: none;
            border: none;
            background-color: var(--color6);
            color: #fff;
            font-size: var(--normal-font-size);
            border-radius: .5rem;
            cursor: pointer;
            transition: .3s;
        
        }
        .form_button:hover{
            box-shadow: 0 10px 36px rgba(0,0,0,.15);
        }


        .form_input:focus+ .form_label{
            top: -.5rem;
            left: .8rem;
            color: var(--color6);
            font-size:var(--color6);
            font-weight: 500;
            z-index: 10;

        }
        .form_input1:focus+ .form_label{
            top: -.5rem;
            left: .8rem;
            color: var(--color6);
            font-size:var(--color6);
            font-weight: 500;
            z-index: 10;

        }
        .form_input:not(:placeholder-shown).form_input:not(:focus) + .form_label{
            top: -.5rem;
            left: .8rem; 
            font-size:var(--color6);
            font-weight: 500;
            z-index: 10;

        }
        .form_input:focus{
             border: 1.5px solid var(--color6) ;
        }
        .form_input:not(:focus){
             border: 1.5px solid var(--color6) ;
        }
        .form_input1:not(:placeholder-shown).form_input1:not(:focus) + .form_label{
            top: -.5rem;
            left: .8rem; 
            font-size:var(--color6);
            font-weight: 500;
            z-index: 10;

        }
        .form_input1:focus{
             border: 1.5px solid var(--color6) ;
        }
        .form_input1:not(:focus){
             border: 1.5px solid var(--color6) ;
        }
        
    </style>
</head>
<body>
<main>
    <form action="get">
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="gamandes.php">Gestion amande</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Amander membre</a></li>
        </ul>
    </form>
<div class="l-form">
        <form action="" class="form" method = "post">
            <h1 class="form_title">Amender Membre</h1>
           <div class="form_div">

            <select required name="nprenom" id="NPrenom" class="form_input1">
            <option required value="">Nom-Prenom</option>
            <?php
                $response = mysqli_query($conn,"SELECT * FROM membres where membre_asso='".$_SESSION['id_association']."'");
                while($row = mysqli_fetch_row($response)){
            ?>
            <option value="<?php  echo $row[0]; ?>"> <?php  echo $row[2]."-".$row[6]; ?></option>
       <?php
    }
    ?>
            </select>
            <label class="form_label">Selectionner Nom-prenom</label>
       </div> 
       <div class="form_div">

            <select name="motif" id="motif" class="form_input1" required>
            <option required value="">Motif</option>
            <?php
                $response = mysqli_query($conn,"SELECT * FROM amande where id_association='".$_SESSION['id_association']."'");
                while($row = mysqli_fetch_row($response)){
            ?>
            <option value="<?php  echo $row[0]; ?>"> <?php  echo $row[2]; ?></option>
       <?php
    }
    ?>
            </select>
            <label class="form_label">Selectionner Motif de l'amende</label>
            </div> 
       <div class="form_div1">
        <label class="form_label1">Delais de Remboursement</label>
            <input type="number" name="duree" class="form_input2" required >
            <select name="forme" class="form_input2">
                <option>jour</option>
                <option>semaine</option>
                <option>mois</option>
            </select>
           
        </div>
            <input type="submit" class="form_button" id="supp" value="Amender"  name="submit">
        </form>
    </div>
        <?php 
    if(isset( $_POST["submit"])){
        $np = $_POST["nprenom"];
        $motif = $_POST["motif"];
        $duree = $_POST["duree"];
        $forme = $_POST["forme"];
        $delais = $duree." ".$forme;
        $dat = date('Y-m-d');
        if($forme == "jour"){
            $date = date('Y-m-d',strtotime($dat."+ $duree days"));
        }
        else if($forme == "semaine"){
            $duree = $duree*7;
            $date = date('Y-m-d',strtotime("+ $duree days"));;
        }else {
            $duree = $duree*30;
            $date = date('Y-m-d',strtotime("+ $duree days"));
        }
        mysqli_query($conn,"insert into notification(message,id_membre) values(\"Vous venez d'être amendé\",'$np')");
        $req = "insert into amandem(date_debut,delai,id_membre,id_amande,id_association) values(NOW(),'$delais','$date','$np','$motif')";
        mysqli_query($conn,$req);
        echo "<script language = Javascript>
     alert(\"Amende Ajouté \");
     </script>";
      }
      

?>
    </div>
    </body>
</html>
