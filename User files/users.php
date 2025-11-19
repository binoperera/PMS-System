<?php
session_start();
include_once "components/connect.php";
if(isset($_SESSION['unique_id'])){
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = ? ORDER BY unique_id DESC";
    $query = $conn->prepare($sql);
    $query->execute(array($outgoing_id));
    $output = "";
    if($query->rowCount() === 0){
        $output .= "No users are available to chat";
    }elseif($query->rowCount() > 0){
        include_once "data.php";
    }
    echo $output;
}else{
    echo "Session 'unique_id' is not set.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>chat</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>

<body>
<?php include 'components/user_header.php'; ?>


  <div class="wrapper">
    <section class="users">
      <header>
      <?php 
        $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
       // $select_profile->execute(array($_SESSION['unique_id']));
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <img src="uploaded_files/<?= $fetch_profile['img']; ?> " alt="">
      <?php if(!empty($fetch_profile['img'])){ ?>
        <img src="uploaded_files/<?= $fetch_profile['img']; ?>" alt="" >
      <?php } ?>
          
      <div class="details">
      <?php if ($fetch_profile !== false) { ?>
        <span><?php echo $fetch_profile['name']. " " . $fetch_profile['lname']; ?></span>
        <p><?php echo $fetch_profile['status']; ?></p>
      <?php } ?>
      </div>
          
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      
    </section>
  </div>

  <script src="js/users.js"></script>

</body>
</html>