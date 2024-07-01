<?php
require_once("connection.php");
$emp_id = $_GET['updateid'];
$sql = "SELECT * FROM `employeetable` WHERE emp_id = '" . $emp_id . "'";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
  $account_type = $row['account_type'];
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $datehired = $row['date_hired'];
  $position = $row['position'];
  $salary = $row['salary'];
  $department = $row['department'];
  $username = $row['username'];
  $password = $row['password'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
  <link rel="stylesheet" href="./styles/main.css" />
  <link rel="stylesheet" href="./styles/register.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>

<body>
  <div class="container flex">
    <?php
    if (isset($_POST["submit"])) {
      // Retrieve form data and store in variables
      $accountType = $_POST["accountType"];
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $dateHired = $_POST["dateHired"];
      $position = $_POST["position"];
      $salary = $_POST["salary"];
      $department = $_POST["department"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $passwordRepeat = $_POST["passwordRepeat"];

      // Hash the password
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);

      // Initialize an empty array to store errors
      $errors = [];

      // Check if any field is empty
      if (empty($accountType) || empty($firstName) || empty($lastName) || empty($dateHired) || empty($position) || empty($salary) || empty($department) || empty($username) || empty($password) || empty($passwordRepeat)) {
        $errors[] = "All fields are required";
      }

      // Check if password is less than 8 characters
      if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
      }

      // Check if password and passwordRepeat do not match
      if ($password !== $passwordRepeat) {
        $errors[] = "Password does not match";
      }

      // Check if the username already exists in the database
      require_once "connection.php";
      $sql = "SELECT * FROM employeetable WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $rowCount = mysqli_num_rows($result);
      if ($rowCount > 0) {
        $errors[] = "Username already exists!";
      }

      // If errors array is not empty, loop through the errors and display each one, otherwise insert data into the database
      if (!empty($errors)) {
        foreach ($errors as $error) {
          // echo "<div class='errors'>$error</div>";
          $errors_msg = $error;
        }
      } else {
        // Prepare an SQL statement with placeholders for values and execute it using mysqli_stmt_bind_param() and mysqli_stmt_execute() functions
        $sql = "INSERT INTO `employeetable`(`emp_id`, `account_type`, `first_name`, `last_name`, `date_hired`, `position`, `salary`, `department`, `username`, `password`) VALUES (NULL,'$accountType','$firstName','$lastName','$dateHired','$position','$salary','$department','$username','$passwordHash')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
          // Display success message and redirect to login page after 3 seconds
          $success_msg = "You added account successfully. Redirecting to login page in 3 seconds... <meta http-equiv='refresh' content='3;url=dashboard_admin.php'>";
        } else {
          die("Something went wrong");
        }
      }
    }
    ?>
    <form action="./add_account.php" method="post" class="form">
      <p class="title">Add New</p>
      <p class="message">
        Lorem ipsum dolor amet, consectetur adipisicing elit.
      </p>

      <?php if (isset($success_msg)) : ?>
        <div class="success"><?php echo $success_msg; ?></div>
      <?php endif; ?>

      <?php if (isset($errors_msg)) : ?>
        <div class="errors"><?php echo $errors_msg; ?></div>
      <?php endif; ?>

      <label for="account-type" class="dropdown">
        <select name="accountType" id="accountType">
          <option value="">-- Account Type --</option>
          <option value="User">User</option>
          <option value="Admin">Admin</option>
        </select>
      </label>

      <div class="flex">
        <label>
          <input required="" placeholder="" type="text" name="firstName" class="input" />
          <span>Firstname</span>
        </label>
        <label>
          <input required="" placeholder="" type="text" name="lastName" class="input" />
          <span>Lastname</span>
        </label>
      </div>
      <label class="input-date">
        <input required="" placeholder="" type="date" name="dateHired" class="input" />
        <!-- <div class="material-icons-sharp date-icon">
          calendar_month
        </div> -->
        <!-- <span>Date Hired</span> -->
      </label>
      <div class="flex">
        <label>
          <input required="" placeholder="" type="text" name="position" class="input" />
          <span>Position</span>
        </label>
        <label>
          <input required="" placeholder="" type="number" name="salary" class="input" />
          <span>Salary</span>
        </label>
      </div>
      <div class="flex">
        <label>
          <input required="" placeholder="" type="text" name="department" class="input" />
          <span>Department</span>
        </label>
        <label>
          <input required="" placeholder="" type="username" name="username" class="input" />
          <span>Username</span>
        </label>
      </div>
      <div class="flex">
        <label>
          <input required="" placeholder="" type="password" name="password" class="input" />
          <span>Password</span>
        </label>
        <label>
          <input required="" placeholder="" type="password" name="passwordRepeat" class="input" />
          <span>Confirm password</span>
        </label>
      </div>
      <button class="submit" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>