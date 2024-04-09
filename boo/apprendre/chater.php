<?php include_once "nav.php"; ?>
<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="membre.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chat</li>
                    </ol>
                </div>
            </div>
<div class="container-fluid">
                    <?php     
                            $sql = mysqli_query($conn, "SELECT * FROM membres where id_association='{$_SESSION['id_association']}' AND id_membre='{$_SESSION['id_membre']}'");
                            if($a=mysqli_num_rows($sql) > 0){
                            $row = mysqli_fetch_assoc($sql);
                            }
                        ?>       
<div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <img src="<?php echo $rows['photo'];?>" alt="">
          <div class="details">
            <span><?php echo $rows['nom']. " " . $rows['prenom'] ?></span>
            <p><?php echo $rows['status']; ?></p>
          </div>
        </div>
      </header>
      <div class="search">
      <span class="text">la personne avec qui chatter</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
  <script src="chat/javascript/users.js"></script>
</body>
</html>

</body>
</html>
                    