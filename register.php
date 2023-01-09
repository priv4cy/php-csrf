<?php
session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
  http_response_code(400);
  die('Invalid CSRF token');
}

$username = $_POST['username'];
$password = $_POST['password'];

// Example
if (validateUsername($username) && validatePassword($password)) {
  $success = registerUser($username, $password);
  if ($success) {
    header('Location: /login.php');
  } else {
    echo '<p>An error occurred while registering the user.</p>';
  }
} else {
  echo '<p>Invalid username or password.</p>';
}
?>