<?php  

include 'components/connect.php';



// Query to fetch data from the 'feedback' table
$feedback_query = $conn->prepare("SELECT id, name, message FROM feedback");
$feedback_query->execute();

// Fetch the data
$feedback_data = $feedback_query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/aboutus2.avif" alt="">
      </div>
      <div class="content">
         <h3>Why Choose Us?</h3>
         <p>At Bordima, we understand that finding the perfect place to stay is more than just about accommodation—it’s about comfort, security, and a community that feels like home. Here’s why we are the best choice for your boarding needs:<br>

🏡 Trusted & Reliable - 
Bordima is a well-established name in the boarding industry, known for providing safe, clean, and comfortable living spaces.<br>

💰 Affordable & Cost Effective -
We offer competitive pricing with flexible plans, ensuring you get the best value for your money.<br>

📍 Prime Locations -
Our boarding facilities are strategically located near universities, workplaces, and public transport for maximum convenience.<br>

🛏️ Fully Equipped Facilities -
Enjoy a hassle-free stay with high-speed WiFi, furnished rooms, laundry services, delicious meals, and more.<br>

🔒 Safety & Security First -
We prioritize your safety with 24/7 CCTV surveillance, secure access, and on-site staff support.<br>

🤝 A Friendly & Supportive Community -
Experience a welcoming and peaceful environment, perfect for students and working professionals alike.<br>

Looking for a comfortable, secure, and affordable place to stay?
👉 Join Bordima today and feel at home!<br>

(📞-0764661682)</p>
         <a href="contact.html" class="inline-btn">Contact Us</a>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="heading">3 simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Search Property</h3>
         <p>🔍 Find Your Perfect Boarding Space</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Contact Agents</h3>
         <p>Need help finding the perfect boarding facility? Our agents are here to assist you!<br>

📍 How We Can Help <br>
✅ Personalized recommendations based on your location & budget<br>
✅ Assistance with booking & availability inquiries<br>
✅ Answering any questions about facilities & services<br><br>

🗓️ Get in Touch<br>
📞 Call Us: +94 764661682<br>
📧 Email: boardima@gmail.com<br>
💬 WhatsApp: 0702054177
</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Enjoy Property</h3>
         <p>🏡 Enjoy Your Stay with Bordima
         At Bordima, we ensure that your boarding experience is not just about accommodation—it’s about comfort, security, and a place that feels like home.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="reviews">

   <h1 class="heading">client's reviews</h1>

   <div class="box-container">
      <?php foreach ($feedback_data as $feedback) : ?>
      <div class="box">
         <h3><?php echo $feedback['name']; ?></h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <p><?php echo $feedback['message']; ?></p>
      </div>
      <?php endforeach; ?>
   </div>

</section>

<!-- review section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>