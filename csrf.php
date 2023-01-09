<?php
session_start();

$token = bin2hex(random_bytes(32));

$_SESSION['csrf_token'] = $token;
setcookie('csrf_token', $token, time() + 3600, '/', '', true, true);
?>