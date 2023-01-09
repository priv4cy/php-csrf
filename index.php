<?php
include('csrf.php');
?>
<!doctype html>
<html>
<head>
  <title>Registration Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <form id="registration-form">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_COOKIE['csrf_token']); ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">Register</button>
  </form>
  <script>
    $('#registration-form button').click(function(event) {
      event.preventDefault();
      $.ajax({
        url: '/register.php',
        type: 'post',
        data: $('#registration-form').serialize(),
        success: function(response) {
          // Handle the response
        },
        error: function(xhr, status, error) {
          // Handle the error
        }
      });
    });
  </script>
</body>
</html>