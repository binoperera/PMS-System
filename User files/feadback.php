<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $message= $_POST['message'];
   $message= filter_var($message, FILTER_SANITIZE_STRING);
   
   $verify_contact = $conn->prepare("SELECT * FROM `feedback` WHERE name = ? AND message = ? ");
   $verify_contact->execute([$name, $message]);
   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'Feedback sent already!';
   }else{
      $send_message= $conn->prepare("INSERT INTO `feedback`(id, name,message) VALUES(?,?,?)");
      $send_message->execute([$msg_id, $name, $message]);
      $success_msg[] = 'Feedback send successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact.jpg" alt="">
      </div>
      <form action="" method="post">
         <h3>FeedBack</h3>

         <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
         <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">

      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->


<!-- faq section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>