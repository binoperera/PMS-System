<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<!-- home section starts  -->


<div class="home">

   <section class="center">

      <form action="search.php" method="post">

      
         <?php
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$user_id]);
            if($select_user->rowCount() > 0){
               while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){
                  echo '<h3>Welcome ! <span>'.$fetch_user['name'].'</span></h3>';
                  
               }
            }else{
               echo '<p><span>You are Not Logged in Now!</span></p>';
            }
         ?>
      
         <h3>Stay where your Hearts  Smile</h3>
         <div class="box">
            <p>enter location <span>*</span></p>
            <input type="text" name="h_location" required maxlength="100" placeholder="Enter city name" class="input">
         </div>
         <div class="flex">
            <div class="box">
               <p>property type <span>*</span></p>
               <select name="h_type" class="input" required>
                  <option value="flat">Flat</option>
                  <option value="house">House</option>
                  <option value="shop">Shop</option>
               </select>
            </div>
            <div class="box">
               <p>offer type <span>*</span></p>
               <select name="h_offer" class="input" required>
                  <option value="sale">Sale</option>
                  <option value="resale">Resale</option>
                  <option value="rent">Rent</option>
               </select>
            </div>
            <div class="box">
               <p>maximum budget <span>*</span></p>
               <select name="h_min" class="input" required>
                  <option value="5000">5,000LKR</option>
                  <option value="10000">10,000LKR</option>
                  <option value="15000">15,000LKR</option>
                  <option value="20000">20,000LKR</option>
                  <option value="30000">30,000LKR</option>
                  <option value="40000">40,000LKR</option>
                  <option value="50000">50,000LKR</option>
                  <option value="100000">100,000</option>
                  <option value="200000">200,000</option>
                  <option value="300000">300,000</option>
                  <option value="400000">400,000</option>
                  <option value="500000">500,000</option>
                  <option value="600000">600,000</option>
                  <option value="700000">700,000</option>
                  <option value="800000">800,000</option>
                  <option value="900000">900,000</option>
                  <option value="1000000">1,000,000</option>
                  <option value="10000000">10,000,000</option>
                  <option value="100000000">100,000,000</option>
               </select>
            </div>
            <div class="box">
               <p>maximum budget <span>*</span></p>
               <select name="h_max" class="input" required>
               <option value="5000">5,000LKR</option>
                  <option value="10000">10,000LKR</option>
                  <option value="15000">15,000LKR</option>
                  <option value="20000">20,000LKR</option>
                  <option value="30000">30,000LKR</option>
                  <option value="40000">40,000LKR</option>
                  <option value="50000">50,000LKR</option>
                  <option value="100000">100,000</option>
                  <option value="200000">200,000</option>
                  <option value="300000">300,000</option>
                  <option value="400000">400,000</option>
                  <option value="500000">500,000</option>
                  <option value="600000">600,000</option>
                  <option value="700000">700,000</option>
                  <option value="800000">800,000</option>
                  <option value="900000">900,000</option>
                  <option value="1000000">1,000,000</option>
                  <option value="10000000">10,000,000</option>
                  <option value="100000000">100,000,000</option>
               </select>
            </div>
         </div>
         <input type="submit" value="search property" name="h_search" class="btn">
      </form>

   </section>

</div>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading">Our Services</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Buy house - Find Your Dream Home</h3>
         <p>Explore a range of homes for sale, from cozy apartments to luxury villas. 
         Get verified listings, transparent pricing, and expert support for a hassle-free purchase. Start your journey today!
         </p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Rent house - Find the best place</h3>
         <p>Looking for an affordable rental? Explore our well-maintained apartments, family homes, 
         and luxury villas in prime locations with flexible leases and great prices!</p>
      </div>   

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Sell house - Get the best deals</h3>
         <p>List your property with us for a fast, hassle-free sale. Get expert guidance, verified buyers, and competitive offers.
            Sell with confidence today!</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Flats and Buildings - Buy, Rent, or Sell with Ease!</h3>
         <p>Discover premium flats and buildings for sale or rent. 
         Whether you're looking for a modern apartment or a commercial space, we offer verified listings, transparent deals, and expert support.
         Find your ideal property today!</p>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Shops and Malls - Find the Perfect Commercial Space!</h3>
         <p>Explore a range of shops and malls for sale or rent. Whether you need a retail space or a large commercial property, 
         we offer prime locations, competitive prices, and seamless transactions.
         Get started today!</p>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>24/7 service - Always Here for you</h3>
         <p>Our team is available around the clock to assist with your property needs. 
         Whether buying, selling, or renting, we ensure seamless support anytime, anywhere.
         Contact us 24/7!</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- listings section starts  -->

<section class="listings">

   <h1 class="heading">latest listings</h1>

   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            if(!empty($fetch_property['image_02'])){
               $image_coutn_02 = 1;
            }else{
               $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
               $image_coutn_03 = 1;
            }else{
               $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
               $image_coutn_04 = 1;
            }else{
               $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
               $image_coutn_05 = 1;
            }else{
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>Saved</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>Save</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price"><i class="fa fa-money" aria-hidden="true"></i></i><span><?= $fetch_property['price']; ?>LKR</span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
               <input type="submit" value="send enquiry" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">No Properties Added Yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>
      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">view all</a>
   </div>

</section>

<!-- listings section ends -->








<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

<script>

   let range = document.querySelector("#range");
   range.oninput = () =>{
      document.querySelector('#output').innerHTML = range.value;
   }

</script>

</body>
</html>