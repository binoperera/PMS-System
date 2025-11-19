<?php
include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
    header('location:cashier_login.php');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the customer ID from the POST data
    $customer_id = $_POST["id"];

    // Prepare and execute the SQL query to delete the customer
    $sql = "DELETE FROM payment WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $customer_id);

    if ($stmt->execute()) {
        // Customer deleted successfully
        header("Location:customer_manage.php");
        http_response_code(200);
    } else {
        // Error occurred
        http_response_code(500);
    }

    // Close the database connection
    $stmt->close();
}
