<?php
session_start();

if (isset($_POST["login"])) {
  // Validate the user's credentials and fetch their account type from the database
  require_once "connection.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $stmt = $conn->prepare("SELECT * FROM employeetable WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user["password"])) {
    // Store the user's account type in the session
    $_SESSION["user"] = true;
    $_SESSION["account_type"] = $user["account_type"];

    // Redirect to the appropriate dashboard based on the user's account type
    if ($user["account_type"] == "Admin") {
      header("Location: dashboard_admin1.php");
    } else {
      header("Location: dashboard_user.php");
    }
    exit();
  } else {
    $error_msg = "Invalid username or password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
  <link rel="stylesheet" href="./styles/login.css" />
  <link rel="stylesheet" href="./styles/main.css" />
</head>

<body>
  <div class="container flex">
    <div class="left flex">
      <div class="signin flex">
        <div class="logo-container">
          <!-- <p class="logo">Logo</p> -->
          <img class="logo" src="./assets/img/logo.png" alt="" />
        </div>

        <form action="./login.php" method="post" class="form-container">
          <h1 class="form__title">Login</h1>

          <?php if (isset($error_msg)) : ?>
            <div class="error"><?php echo $error_msg; ?></div>
          <?php endif; ?>

          <div class="input-container">
            <label for="text">Username</label>
            <input type="text" class="text-input" name="username" id="username" required />
          </div>
          <div class="input-container">
            <label for="password">Password</label>
            <input type="password" class="text-input" name="password" id="password" required />
          </div>
          <div class="flex">
            <div class="remember">
              <input type="checkbox" value="lsRememberMe" id="rememberMe" />
              <label for="rememberMe">Remember me</label>
            </div>
            <div class="forgot">
              <a rel="noopener noreferrer" href="#" class="form__links">Forgot Password?</a>
            </div>
          </div>
          <div class="input-container">
            <input type="submit" class="primary-btn" value="Sign in" name="login" />
          </div>
        </form>
        <span class="bottom-text flex">
          <p>Already have an account?</p>
          <a href="./registration.php" class="form__links">Sign Up</a>
        </span>
      </div>
    </div>
    <div class="right">
      <div class="showcase-container">
        <div class="showcase-content">
          <p class="showcase__title">R 키스 해줘</p>
          <p class="showcase__desc">
            a dynamic and innovative organization that specializes in
            providing a wide range of products and services to its clients.
            With a strong focus on customer satisfaction, R Company has
            established itself as a leader in the industry by providing
            quality solutions that meet the unique needs of its clients.
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>