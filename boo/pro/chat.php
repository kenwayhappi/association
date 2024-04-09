<?php
    include ('navd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="styl.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
<div class="row">
                    <div class="col-12">
                        <div class="card m-b-0">
                            <!-- .chat-row -->
                            <div class="chat-main-box">
                                <!-- .chat-left-panel -->
                                <div class="chat-left-aside">
                                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                                    <div class="chat-left-inner">
                                        <div class="form-material">
                                            <input class="form-control p-20" type="text" placeholder="Search Contact" name="btn">
                                        </div>
                                        <?php
                                            if(isset($_POST['btn'])){
                                                $mc = 1;
                                                $a="user";
                                                $mc = $_POST['btn'];
                                                $req = mysqli_query($conn,"SELECT * FROM membres where prenom  or nom like '%$mc%' AND id_association='".$_SESSION['id_association']."'");
                                                $nbr=mysqli_num_rows($req);
                                                if($nbr==0)echo $mc." n'est pas enregistré";
                                            }else{
                                                $req =mysqli_query($conn,"SELECT * FROM membres where id_association='".$_SESSION['id_association']."' LIMIT 10");}
                                            while ($ligne=mysqli_fetch_assoc($req)){
                                        ?>
                                        <ul class="chatonline style-none ">
                                            <li>
                                                <a href="chat.php?complet=<?php echo $ligne['id_membre'];?>"><img src="<?php echo $ligne['photo'];?>" width="48"><span>
                                                    <?php 
                                                        $nom = $ligne['nom'];
                                                        $prenom = $ligne['prenom'];
                                                        echo $nom." - ".$prenom;
                                                    ?><small class="text-success"><?php echo $ligne['statut'];?></small></span></a>
                                            </li>
                                            
                                        <?php } ?>
                                            <li class="p-20"></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- .chat-left-panel -->
                                <!-- .chat-right-panel -->
                                <div class="chat-right-aside">
                                    <div class="chat-main-header">
                                        <div class="p-20 b-b">
                                            <h3 class="box-title">Chat Message</h3>
                                        </div>
                                        <?php
                                            if(isset($_POST['me'])){
                                                $complet=$_GET['complet'];
                                                $reqm = mysqli_query($conn,"SELECT * FROM message where id_membre='$complet'");
                                            }else{
                                                $reqm =mysqli_query($conn,"SELECT * FROM message where id_association='".$_SESSION['id_association']."'");}
                                            while ($mes=mysqli_fetch_assoc($reqm)){ 
                                        ?>
                                    </div>
                                    <div class="chat-rbox">
                                        <ul class="chat-list p-20">
                                            <!--chat Row -->
                                            <section class="chat-area">
                                                <header>
                                                    <?php 
                                                        $user_id = mysqli_real_escape_string($conn, $_GET['complet']);
                                                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE id_membre = {$user_id}");
                                                        if(mysqli_num_rows($sql) > 0){
                                                            $row = mysqli_fetch_assoc($sql);
                                                        }else{
                                                        header("location: chat.php");
                                                        }
                                                    ?>
                                                <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                                                <img src="<?php echo $row['photo'];?>" width="48">
                                                <div class="details">
                                                <span><?php echo $row['nom']. " " . $row['prenom'] ?></span>
                                                <p><?php echo $row['status']; ?></p>
                                                </div>
                                                </header>
      <div class="chat-box">
                                                    
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
        <?php }?>
      </form>
    </section>
                                        </ul>
                                    </div>
                                    <div class="card-body b-t">
                                        <div class="row">
                                            <div class="col-8">
                                                <textarea placeholder="Type your message here" class="form-control b-0"></textarea>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-paper-plane-o"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .chat-right-panel -->
                            </div>
                            <!-- /.chat-row -->
                        </div>
                    </div>
                </div>
                </form>
</body>
</html>