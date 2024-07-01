<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["account_type"] !== "User") {
  // Redirect to login page if user is not logged in or is not a user
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
  <link rel="stylesheet" href="./styles/main.css">
  <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
  <div class="dashboard">
    <h1 class="dashboard__title">Welcome, User</h1>
    <a href="./logout.php" class="primary-btn ">Logout</a>
  </div>
</body>

</html>