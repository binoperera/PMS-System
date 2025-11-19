<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $payment_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}


if(isset($_POST['submit'])){

   
     $id= "EMP" . date('YmdHis');
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING); 
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $date = $_POST['date'];
    $date = filter_var($date, FILTER_SANITIZE_STRING);
    $type = $_POST['type'];
    $type = filter_var($type, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    

    $insert_payment = $conn->prepare("INSERT INTO `payment`( id,name, number,price,date,type) VALUES(?,?,?,?,?,?)");
    $insert_payment->execute([$id,$name, $number, $price,$date,$type]);
          
 
    if($price != $type){
       $warning_msg[] = 'payment sucessfuly!';
        }else{
          $warning_msg[] = 'payment invalid';
       
        
 
       }
    }
 ?>
 
 

 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
 
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
       <h3>payment!</h3>
       <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
       <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="enter your number" class="box">
       <input type="date" name="date" required min="0" max="9999999999" maxlength="10" placeholder="today date" class="box">
       <div class="box">
             <p>package Type <span>*</span></p>
             <select name="type" required class="input">
                <option value="Easy Promo ">Easy Promo</option>
                <option value="Promo" selected>Promo</option>
             </select>
        </div>
        <div class="box">
             <p>package Price <span>*</span></p>
             <select name="price" required class="input">
                <option value="6000">6000</option>
                <option value="12000" selected>12000</option>
             </select>
         </div>
       <input type="submit" value="pay now" name="submit" class="btn">
    </form>
 
 </section>
 
 <!--  section ends -->
 
 
 
 
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>