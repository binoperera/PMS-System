<?php
require './vendor/autoload.php';
include 'connect.php';

use League\OAuth2\Client\Provider\Google;
use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
} catch (Exception $e) {
    $warning_msg[] = 'Failed to load .env file: ' . $e->getMessage();
    include 'message.php';
    exit;
}

$provider = new Google([
    'clientId'      => '338869739639-4e7n6ni40iucdtsq4u02eg9r6hipa7e6.apps.googleusercontent.com',
    'clientSecret'  => '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',
    'redirectUri'   => 'http://localhost/bordima/callback.php',
]);

function initiateSSOLogin() {
    global $provider;
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
}

function handleSSOCallback() {
    global $provider, $conn;

    if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
        $warning_msg[] = 'Invalid state parameter';
        include 'message.php';
        exit;
    }

    try {
        $token = $provider->getAccessToken('authorization_code', ['code' => $_GET['code']]);
        $user = $provider->getResourceOwner($token);
        $ssoId = $user->getId();
        $email = $user->getEmail();
        $name = $user->getName();

        // Check only in users table
        $select = $conn->prepare("SELECT id FROM `users` WHERE email = ? LIMIT 1");
        $select->execute([$email]);
        $row = $select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Update SSO info
            $update = $conn->prepare("UPDATE `users` SET sso_provider = 'google', sso_id = ? WHERE id = ?");
            $update->execute([$ssoId, $row['id']]);

            // Set session & cookie
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            $_SESSION['user_id'] = $row['id'];

            header("Location: home.php");
            exit;
        } else {
            echo "No user account found with this email. Please register first.";
            exit;
        }

    } catch (Exception $e) {
        $warning_msg[] = 'SSO login failed: ' . $e->getMessage();
        include 'message.php';
        exit;
    }
}
?>
