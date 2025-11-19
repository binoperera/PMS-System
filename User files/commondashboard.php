<?php
session_start();  // Start the session to check login status
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection Dashboard</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

 <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>

<!-- Include user header (navigation bar) -->


<!-- Main dashboard section -->
<div class="dashboard-container">
    <h1>Welcome to the Role Selection Dashboard</h1>
    <p>Select Your User Role</p>
    <p>Please note that Admin and Cashier access are pre-defined.</p>

    <!-- Navigation buttons for different user roles -->
    <div class="button-container">
        <!-- Link to user login page -->
        <a href="login.php" class="button">User Login</a>

        <!-- Link to admin dashboard -->
        <a href="admin/adminlogin.php" class="button">Admin Panel</a>

        <!-- Link to cashier login panel -->
        <a href="cashier/cashier_login.php" class="button">Cashier Panel</a>
        
    </div>
</div>


<!-- Include footer component -->
<?php include 'components/dashboardfooter.php'; ?>

<!-- Custom JS for any dashboard-specific functionalities
<script src="js/scriptdashboard.js"></script> -->

<!-- Include message component (for alerts or notifications) -->
<?php include 'components/message.php'; ?>

</body>
</html>
