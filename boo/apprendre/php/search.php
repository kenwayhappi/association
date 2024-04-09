<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['id_membre'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM membres WHERE NOT id_membre = {$outgoing_id} AND (nom LIKE '%{$searchTerm}%' OR prenom LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "users.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>