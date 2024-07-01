<?php
require_once("connection.php");
$emp_id = $_GET['updateid'];
$sql = "SELECT * FROM `employeetable` WHERE emp_id = '" . $emp_id . "'";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $date_hired = $row['date_hired'];
  $position = $row['position'];
  $salary = $row['salary'];
  $department = $row['department'];
  $username = $row['username'];
  $password = $row['password'];
  $passwordRepeat = $row['password'];
}

?>


<?php
if (isset($_POST["update"])) {
  $account_Type2 = $_POST["account_type"];
  $fname2 = $_POST["fname"];
  $lname2 = $_POST["lname"];
  $date_hired2 = $_POST["date_hired"];
  $position2 = $_POST["position"];
  $salary2 = $_POST["salary"];
  $department2 = $_POST["department"];
  $username2 = $_POST["username"];
  $password2 = $_POST["password"];
  $passwordRepeat = $_POST["passwordRepeat"];

  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  $sql2 = "UPDATE `employeetable` SET `account_type`='$account_Type2', `first_name`='$fname2', `last_name`='$lname2', `date_hired`='$date_hired2', `position`='$position2', `salary`='$salary2', 
`department`='$department2', `username`='$username2', `password`='$passwordHash'  
WHERE `emp_id` = '$emp_id'";

  echo $sql;
  $result2 = mysqli_query($conn, $sql2);

  if ($result2) {
    header("location: dashboard_admin.php");
  } else {

    echo 'please check query';
  }
} else {
  echo '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/register.css">
  <link rel="stylesheet" href="./styles/main.css">
  <title>Admin</title>
</head>

<body class="bg-dark">
  <div class="container flex">
    <form action="#" method="post" class="form">
      <p class="title">Update</p>
      <p class="message">
        Lorem ipsum dolor amet, consectetur adipisicing elit.
      </p>

      <label for="account_type" class="dropdown">
        <select name="account_type" id="accountType">
          <option value="">-- Account Type --</option>
          <option value="User">User</option>
          <option value="Admin">Admin</option>
        </select>
      </label>

      <div class="flex">
        <label for="fname">
          <input type="text" class="input" name="fname" placeholder="First Name:" value="<?php echo $fname; ?>">
        </label>
        <label for="lname">
          <input type="text" class="input" name="lname" placeholder="Last Name:" value="<?php echo $lname; ?>">
        </label>
      </div>

      <label for="date_hired">
        <input type="date" class="input" name="date_hired" placeholder="Date Hired:" value="<?php echo $date_hired; ?>">
      </label>

      <div class="flex">
        <label for="position">
          <input type="text" class="input" name="position" placeholder="Position:" value="<?php echo $position; ?>">
        </label>
        <label for="salary">
          <input type="text" class="input" name="salary" placeholder="Salary:" value="<?php echo $salary; ?>">
        </label>
      </div>

      <div class="flex">
        <label for="department">
          <input type="text" class="input" name="department" placeholder="Department:" value="<?php echo $department; ?>">
        </label>
        <label for="username">
          <input type="text" class="input" name="username" placeholder="Username:" value="<?php echo $username; ?>">
        </label>
      </div>

      <label for="password">
        <input type="password" class="input" name="password" placeholder="Password:" value="<?php echo $password; ?>">
      </label>

      <label for="passwordRepeat">
        <input required="" class="input" placeholder="" type="password" name="passwordRepeat" value="<?php echo $passwordRepeat; ?>" class="input" />
        <span>Confirm password</span>
      </label>

      <button class="submit" name="update">Update</button>
    </form>
</body>

</html>