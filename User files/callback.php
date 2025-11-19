<?php
session_start();
include 'components/sso_handler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSO Callback</title>
    <link rel="stylesheet" href="css/style1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
<?php
try {
    handleSSOCallback();
} catch (Exception $e) {
    $warning_msg[] = 'Callback error: ' . $e->getMessage();
    include 'components/message.php';
}
?>
</body>
</html>
