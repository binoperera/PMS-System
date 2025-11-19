<?php

include '../components/connect.php';

session_start();

if(isset($_COOKIE['admin_id'])){
    $admin_id = $_COOKIE['admin_id'];
 }else{
    $admin_id = '';
    header('location:cashier_login.php');
 }

if(isset($_POST['add_package'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $duration = $_POST['duration'];
   $duration = filter_var($duration, FILTER_SANITIZE_STRING);
   $discription = $_POST['discription'];
   $discription = filter_var($discription, FILTER_SANITIZE_STRING);
   
   $update_package = $conn->prepare("UPDATE * FROM `package` WHERE name = ?");
  
   $update_package = $conn->prepare("UPDATE * FROM `package` WHERE price = ?");
   
   $update_package = $conn->prepare("UPDATE * FROM `package` WHERE duration = ?");
  
   $update_package = $conn->prepare("UPDATE * FROM `package` WHERE discription = ?");
   

   if(  $update_package->rowCount() > 0){
      $message[] = 'package  already exist!';
   }else{
         $insert_package = $conn->prepare("INSERT INTO `package`(name,price,duration,discription) VALUES(?,?,?,?)");
         $insert_package->execute([$name,$price,$duration,$discription]);
        
         $message[] = 'new package added!';
      }
   }



if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_package = $conn->prepare("DELETE FROM `package` WHERE id = ?");
   $delete_package->execute([$delete_id]);
   $delete_save = $conn->prepare("DELETE FROM `save` WHERE pid = ?");
   $delete_save->execute([$delete_id]);
   header('location:saved.php');

}

?><!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update package</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom admin style link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/cashier_header.php' ?>

<h1 class="heading">Update </h1>

<section class="form-container">

   

   <?php
      $update_price = $_GET['update'];
      $select_package = $conn->prepare("SELECT * FROM `package` WHERE price = ?");
      $select_package->execute([$update_price]);
      if($select_package->rowCount() > 0){
         while($fetch_package = $select_package->fetch(PDO::FETCH_ASSOC)){ 
   ?>

   <form action=""  method="post" enctype="multipart/form-data">
      <input type="text" class="box" required maxlength="100" placeholder="enter package name" name="name" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="int" class="box" required maxlength="100" placeholder="enter package price" name="price"oninput="this.value = this.value.replace(/\s/g, '')">
               <select name="duration" class="box" placeholder="duration" required>
                  <option value=""></option> 
                  <option value="per day">per day</option>
                  <option value="per month">per month</option>
                  
               </select>
      <input type="text" class="box" required maxlength="500" placeholder="enter package discription" name="discription"oninput="this.value = this.value.replace(/\s/g, '')">
     
      <input type="submit" value="update package" class="btn" name="update_package">
      <!--<a href="package.php" class="option-btn">view</a> -->
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no package found!</p>';
      }
   ?>

</section>




<script src="../js/admin_script.js"></script>

</body>
</html>