<?php
    session_start();
    include_once "config.php";
    $id_membre = $_SESSION['id_membre'];
    $sql = mysqli_query($conn,"SELECT * FROM membres WHERE id_membre != '{$_SESSION['id_membre']}' AND id_association='".$_SESSION['id_association']."' ORDER BY id DESC");
    $a = mysqli_num_rows($sql);
    $output = "";
    
        while($row = mysqli_fetch_assoc($sql)){
            $sql2 = mysqli_query($conn,"SELECT * FROM messages WHERE (inputmessage = {$row['id_membre']}
            OR outputmessage = {$row['id_membre']}) AND (outputmessage = {$id_membre} 
            OR inputmessage = {$id_membre}) ORDER BY id_message DESC LIMIT 1");
            $row2=(mysqli_fetch_assoc($sql2));
            (mysqli_num_rows($sql2) > 0) ? $result = $row2['msg'] : $result ="Aucun message";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['outputmessage'])){
                ($id_membre == $row2['outputmessage']) ? $you = "You: " : $you = "";
            }else{
                $you = "";
            }
            ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
            ($id_membre == $row['id_membre']) ? $hid_me = "hide" : $hid_me = "";
    
            $output .= '<a href="chat.php?user_id='. $row['id_membre'] .'">
                        <div class="content">
                        <img src="'. $row['photo'] .'" alt="">
                        <div class="details">
                            <span>'. $row['nom']. " " . $row['prenom'] .'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';
        }
    echo $output;
    //WHERE (inputmessage = {$row['id_membre']} OR outputmessage = {$row['id_membre']}) AND (outputmessage = {$id_membre} OR inputmessage = {$id_membre})
?>