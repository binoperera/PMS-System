<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>post property</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="my-listings">

   <h1 class="heading">Our Packages</h1>

   <div class="box-container">

      <?php
         $select_package = $conn->prepare("SELECT * FROM `package`");
         $select_package->execute();
         if($select_package->rowCount() > 0){
            while($fetch_package = $select_package->fetch(PDO::FETCH_ASSOC)){    
      ?>
      <div class="box">
         <div class="name"><h1><span><?= $fetch_package['name'] ?></span></h1>
         <div class="price"><h3><span><?= $fetch_package['price'] ?></span></h3>
         <div class="duration"><h3><span><?= $fetch_package['duration'] ?></span></h3>
         <div class="discription"><h3><span><?= $fetch_package['discription'] ?></span></h3>
         
         <a href="post_property.php" class="btn">Post Your Property</a>
         
         </div>

         
      </div>
      
     
     
      <?php
         }
      }else{
         echo '<p class="empty">No Catergory added Yet!</p>';
      }
      ?>

   </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>