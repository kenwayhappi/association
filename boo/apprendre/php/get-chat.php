<?php 
    session_start();
    if(isset($_SESSION['id_membre'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['id_membre'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN membres ON membres.id_membre = messages.outputmessage
                WHERE (outputmessage = {$outgoing_id} AND inputmessage = {$incoming_id})
                OR (outputmessage = {$incoming_id} AND inputmessage = {$outgoing_id}) ORDER BY id_message";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outputmessage'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="'.$row['photo'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">pas de message recu.</div>';
        }
        echo $output;
    }else{
        header("location: chater.php");
    }

?>