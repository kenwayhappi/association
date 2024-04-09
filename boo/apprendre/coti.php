<?php include_once "nav.php"; 
echo "<p> Total <b> ".$nombre."</b> Association</p>";
 $complet=$_GET['complet'];
 $res = mysqli_fetch_assoc(mysqli_query($conn,"select * from cotisation  where id_cotisation='$complet'"));
 $nombre = $res['nbr_membre'];
 if($nombre == 12){
    echo "<script> 
    alert(\" Nombre de place deja atteint \");
    window.location.href = \"listecotisation.php\";
    </script>"; }
?>