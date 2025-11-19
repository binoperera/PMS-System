<?php
session_start();
include 'components/sso_handler.php';

// Start Google login for users
initiateSSOLogin();
?>
