<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $lname = $_POST['lname'];
   $lname = filter_var($lname, FILTER_SANITIZE_STRING); 
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $email = strtolower(trim($_POST['email']));
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);


   // plain text passwords
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
   $c_pass = $_POST['c_pass'];
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);   

   $img = $_POST['img'];
   $img = filter_var($img, FILTER_SANITIZE_STRING);

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
$select_users->execute([$email]);

if ($select_users->rowCount() > 0) {
   $warning_msg[] = 'Email Already Taken!';
} else {
   if ($pass !== $c_pass) {
      $warning_msg[] = 'Password not Matched!';
   } else {
      $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

      try {
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, lname, number, type, email, password, img) VALUES(?,?,?,?,?,?,?,?)");
         $insert_user->execute([$id, $name, $lname, $number, $type, $email, $hashed_pass, $img]);

         // auto login after insert
         $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
         $verify_users->execute([$email]);
         $row = $verify_users->fetch(PDO::FETCH_ASSOC);

         if ($row && password_verify($pass, $row['password'])) {
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:home.php');
            exit;
         } else {
            $error_msg[] = 'Something went wrong while verifying user!';
         }

      } catch (PDOException $e) {
         if ($e->getCode() == 23000) {
            // duplicate email safeguard
            $warning_msg[] = 'This email is already registered!';
         } else {
            $error_msg[] = 'Database error: ' . $e->getMessage();
         }
      }
   }
}

          }




?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="post">
      <h3>create an account!</h3>
      <input type="text" name="name" required maxlength="50" placeholder="Enter Your First Name" class="box">
      <input type="text" name="lname" required maxlength="50" placeholder="Enter Your Last Name" class="box">
      <input type="email" name="email" required maxlength="50" placeholder="Enter Your Email" class="box">
      <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="Enter Your Number" class="box">
      <div class="box">
         <p>User Type <span>*</span></p>
         <select name="type" required class="input">
            <option value="Buyer">Buyer</option>
            <option value="Seller" selected>Seller</option>
         </select>
      </div>
      <input type="file" name="img" required maxlength="50" placeholder="Choose Your Image" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="Enter Your Password" class="box">
      <input type="password" name="c_pass" required maxlength="20" placeholder="Confirm Your Password" class="box">
      <p>Already Have An Account? <a href="login.php">Login Now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register section ends -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>
