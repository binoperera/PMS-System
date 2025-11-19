<?php
include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
    header('location:cashier_login.php');
}


if (isset($_POST['delete_payment'])) {
    $payment_id = $_POST['payment_id'];

    // Perform the deletion of the payment with the given ID
    $delete_payment = $conn->prepare("DELETE FROM `payment` WHERE id = ?");
    if ($delete_payment->execute([$payment_id])) {
        $success_msg[] = 'Payment deleted successfully!';
    } else {
        $warning_msg[] = 'Failed to delete payment.';
    }
}



// Fetch property data before the payment loop
$select_property = $conn->prepare("SELECT * FROM `property`");
$select_property->execute();
$property_data = array();

while ($row = $select_property->fetch(PDO::FETCH_ASSOC)) {
    $property_data[] = $row;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom admin style link  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/cashier_header.php' ?>

<section class="grid">
    <h1 class="heading">Payments</h1>

    <div class="box-container">
        <?php
        $select_payment = $conn->prepare("SELECT * FROM `payment`");
        $select_payment->execute();

        if ($select_payment->rowCount() > 0) {
            foreach ($property_data as $property) {
                while ($fetch_payment = $select_payment->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($_POST['update_payment'])) {
                        $payment_status = $_POST['update_payment_status'];
                        $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
                        $payment_date = $_POST['date'];
                        $payment_date = filter_var($payment_date, FILTER_SANITIZE_STRING);
                        $payment_id = $fetch_payment['id'];
                
                        if (!empty($payment_status) && !empty($payment_date)) {
                            // Update payment status and payed_date if they are not empty
                            $update_payment_status = $conn->prepare("UPDATE `payment` SET payment_status = ?, date = ? WHERE id = ?");
                            $update_payment_status->execute([$payment_status, $payment_date, $payment_id]);
                            $success_msg[] = 'Payment status and payed_date updated!';
                        } else {
                            // Insert a new record if either payment_status or payed_date is empty
                            $verify_payment_status = $conn->prepare("SELECT * FROM `payment` WHERE (payment_status IS NULL OR date IS NULL) AND id = ?");
                            $verify_payment_status->execute([$payment_id]);
                            if ($verify_payment_status->rowCount() > 0) {
                                $warning_msg[] = 'Payment status or payed_date already taken!';
                            } else {
                                $insert_payment = $conn->prepare("INSERT INTO `payment` (payment_status, payed_date) VALUES (?, ?)");
                                $insert_payment->execute([$payment_status, $payment_date]);
                                $success_msg[] = 'New payment created!';
                            }
                        }
                    }
        ?>
        <div class="box">
            
            <p> name : <span><?= $fetch_payment['name']; ?></span> </p>
            <p> placed on : <span><?= $property['date']; ?></span> </p>
            <p> payed on : <span><?= $fetch_payment['date']; ?></span> </p>
            <p> number : <span"><?= $fetch_payment['number']; ?></span> </p>
            <p> total price : <span><?= $fetch_payment['price']; ?></span> </p>
            <p>  type : <span><?= $fetch_payment['type']; ?></span> </p>
            <p> Payment status : <span><?= $fetch_payment['payment_status']; ?></span> </p>
            <form action="" method="post">
                <input type="hidden" name="payment_status" value="<?= $fetch_payment['payment_status']; ?>" >
                <select name="update_payment_status">
                    <option value="pending" <?= ($fetch_payment['payment_status'] == 'pending') ? 'selected' : ''; ?>>pending</option>
                    <option value="completed" <?= ($fetch_payment['payment_status'] == 'completed') ? 'selected' : ''; ?>>completed</option>
                </select>
                <input type="date" class="box" required placeholder="updating date" name="date">


                <div class="flex-btn">
                    <input type="submit" value="update" class="option-btn" name="update_payment">
                </div>

 

            </form>
                           <!-- Add this code inside the foreach loop -->
<form action="" method="post">
    <input type="hidden" name="payment_id" value="<?= $fetch_payment['id']; ?>">
    <button type="submit" name="delete_payment">Delete</button>
</form>

            
        </div>
        <?php
                }
            }
        } else {
            echo '<p class="empty">no payment placed yet!</p>';
        }
        ?>
    </div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>
