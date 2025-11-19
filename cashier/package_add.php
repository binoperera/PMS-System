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
         $insert_package = $conn->prepare("INSERT INTO `package`(name,price,duration,discription) VALUES(?,?,?,?)");
         $insert_package->execute([$name,$price,$duration,$discription]);
        
         $message[] = 'new package added!';
      }
   }



if(isset($_GET['delete'])){

   $delete_price = $_GET['delete'];
   $delete_package = $conn->prepare("DELETE FROM `package` WHERE price = ?");
   $delete_package->execute([$delete_price]);
   $delete_save = $conn->prepare("DELETE FROM `save` WHERE price = ?");
   header('location:saved.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Packages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom admin style link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/cashier_header.php' ?>

<h1 class="heading">add package</h1>

<section class="form-container">
         
   

   <form action=""  method="post" enctype="multipart/form-data">
      <input type="text" class="box" required maxlength="100" placeholder="Enter package name" name="name" >
      <input type="int" class="box" required maxlength="100" placeholder="Enter package price" name="price">
               <select name="duration" class="box" placeholder="Duration" required>
                  <option value=""></option> 
                  <option value="per day">Per Day</option>
                  <option value="per day">Per 15Days</option>
                  <option value="per month">Per Month</option>
                  
               </select>
      <input type="text" class="box" required maxlength="1000" placeholder="enter package discription" name="discription">
     
      <input type="submit" value="add package" class="btn" name="add_package">
     <!-- <a href="package.php" class="option-btn">view</a> -->
   </form>

</section>


<script src="../js/admin_script.js"></script>
</body>
</html>