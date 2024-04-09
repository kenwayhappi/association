<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['id_membre'])){
    header("location: chater.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM membres where id_association='{$_SESSION['id_association']}' AND id_membre='{$_SESSION['id_membre']}'");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="<?php echo $row['photo']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['prenom']. " " . $row['nom'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="chater.php?logout_id=<?php echo $row['id_membre']; ?>" class="logout">Deconnection</a>
      </header>
      <div class="search">
        <span class="text">Selectionner la personne avec qui chatter</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
  <script src="javascript/users.js"></script>
<?php 
  
  include_once "php/config.php";
  if(!isset($_SESSION['id_membre'])){
    header("location: chater.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM membres WHERE id_membre = {$user_id} AND id_association='{$_SESSION['id_association']}'");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: chater.php");
          }
        ?>
        <a href="mtn.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo $row['photo']; ?>" alt="">
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
        <header><a href="mtn.php" class="logout">sortie</a></header>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
