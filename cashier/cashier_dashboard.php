<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:cashier_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cashier Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/cashier_header.php'; ?>
<!-- header section ends -->

<!-- dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">Cashier Dashboard</h1>

   <div class="box-container">

   <div class="box">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <h3>welcome!</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update.php" class="btn">update profile</a>
   </div>

   <div class="box">
      <?php
         $select_listings = $conn->prepare("SELECT * FROM `property`");
         $select_listings->execute();
         $count_listings = $select_listings->rowCount();
      ?>
      <h3><?= $count_listings; ?></h3>
      <p>property posted</p>
      <a href="listings.php" class="btn">view listings</a>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `users`");
         $select_users->execute();
         $count_users = $select_users->rowCount();
      ?>
      <h3><?= $count_users; ?></h3>
      <p>total users</p>
      <a href="users.php" class="btn">view users</a>
   </div>

   <div class="box">
      <?php
         $select_package = $conn->prepare("SELECT * FROM `package`");
         $select_package->execute();
         $count_package = $select_package->rowCount();
      ?>
      <h3><?= $count_package; ?></h3>
      <p>Packages</p>
      <a href="package.php" class="btn">view package</a><a href="package_add.php" class="btn">add package</a>
      
   </div>
   <div class="box">
      <?php
         $select_payment = $conn->prepare("SELECT * FROM `payment`");
         $select_payment->execute();
         $count_payment = $select_payment->rowCount();
      ?>
      <h3><?= $count_payment; ?></h3>
      <p>payment</p>
      <a href="cashier-payment.php" class="btn">view payment</a>
      
   </div>



</section>


<!-- dashboard section ends -->




















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>