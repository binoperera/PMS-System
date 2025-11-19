<?php

include '../components/connect.php';

session_start();

if(isset($_COOKIE['admin_id'])){
    $admin_id = $_COOKIE['admin_id'];
 }else{
    $admin_id = '';
    header('location:cashier_login.php');
 }

 if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $id = $_POST['price'];
   $name = filter_var($price, FILTER_SANITIZE_STRING);
   $id = $_POST['duration'];
   $name = filter_var($duration, FILTER_SANITIZE_STRING);
   $discription = $_POST['discription'];
   $discription = filter_var($discription, FILTER_SANITIZE_STRING);
   
   $select_package = $conn->prepare("SELECT * FROM `package` WHERE name = ?");
   $select_package->execute([$name]);
   $select_package = $conn->prepare("SELECT * FROM `package` WHERE price = ?");
   $select_package->execute([$price]);
   $select_package = $conn->prepare("SELECT * FROM `package` WHERE duration = ?");
   $select_package->execute([$duration]);
   $select_package = $conn->prepare("SELECT * FROM `package` WHERE discription = ?");
   $select_package->execute([$discription]);

   if( $select_package->rowCount() > 0){
      $message[] = 'package  already exist!';
   }else{
         $insert_package = $conn->prepare("INSERT INTO `package`(name) VALUES(?)");
         $insert_package->execute([$name]);
        
         $message[] = 'new package added!';
      }
   }



if(isset($_GET['delete'])){

   $delete_price = $_GET['delete'];
   $delete_package = $conn->prepare("DELETE FROM `package` WHERE price = ?");
   $delete_package->execute([$delete_price]);
   $delete_save = $conn->prepare("DELETE FROM `save` WHERE price = ?");
   
   header('location:package.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>package</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom admin style link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/cashier_header.php' ?>

<h1 class="heading">Payment Packages</h1>
   
<section class="dashboard">

         

   <div class="box-container">

         <?php
            $select_package = $conn->prepare("SELECT * FROM `package`");
            $select_package->execute();
            if($select_package->rowCount() > 0){
               while($fetch_package = $select_package->fetch(PDO::FETCH_ASSOC)){ 
         ?>
         <div class="box">
            <div class="name"><h3><?= $fetch_package['name']; ?></h3></div>
            <div class="price"><h3><?= $fetch_package['price']; ?></h3></div>
            <div class="duration"><h3><?= $fetch_package['duration']; ?></h3></div>
            <div class="discription"><p><?= $fetch_package['discription']; ?></p></div>
               <div class="box">
                        <a href="package_update.php?update=<?= $fetch_package['price']; ?>" class="option-btn"><i class="fas fa-edit"></i>update</a>
                        <a href="package.php?delete=<?= $fetch_package['price']; ?>" class="delete-btn" onclick="return confirm('delete this package?');"><i class="fa fa-trash" aria-hidden="true"></i> delete</a>
               </div>     
         </div>
                  
         <?php
               }
            }else{
               echo '<p class="empty">no package added yet!</p>';
                  }
         ?>
   </>
   
   

</section>


<script src="../js/admin_script.js"></script>

</body>
</html>