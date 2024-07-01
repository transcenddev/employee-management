<?php
include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
  <link rel="stylesheet" href="./styles/main.css">
  <link rel="stylesheet" href="./styles/dashboard_admin.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="dashboard flex">
      <div class="dashboard-content">
        <h1 class="dashboard__title">Welcome, Admin </h1>
        <a href="add_account.php" class="btn btn-primary">Add user</a>
        <a href="./logout.php" class="btn btn-primary">Logout</a>
        <table class="table">
          <thead class="table__header-container">
            <tr class="table-row">
              <th class="table__header" scope="col">#</th>
              <th class="table__header" scope="col">Roles</th>
              <th class="table__header" scope="col">First Name</th>
              <th class="table__header" scope="col">Last Name</th>
              <th class="table__header" scope="col">Datehired</th>
              <th class="table__header" scope="col">Position</th>
              <th class="table__header" scope="col">Salary</th>
              <th class="table__header" scope="col">Department</th>
              <th class="table__header" scope="col">Username</th>
              <th class="table__header" scope="col">Password</th>
              <th class="table__header" scope="col">Operations</th>
            </tr>
          </thead>
          <tbody class="table-body">
            <?php
            $sql = "SELECT * FROM `employeetable`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $emp_id = $row["emp_id"];
                $accountType = $row["account_type"];
                $firstName = $row["first_name"];
                $lastName = $row["last_name"];
                $dateHired = $row["date_hired"];
                $position = $row["position"];
                $salary = $row["salary"];
                $department = $row["department"];
                $username = $row["username"];
                $password = $row["password"];
                echo '<tr>
            <th scope="row">' . $emp_id . '</th>
            <td class="table__data">' . $accountType . ' </td>
            <td class="table__data">' . $firstName . '</td>
            <td class="table__data">' . $lastName . '</td>
            <td class="table__data">' . $dateHired . '</td>
            <td class="table__data">' . $position . '</td>
            <td class="table__data">' . $salary . '</td>
            <td class="table__data">' . $department . '</td>
            <td class="table__data">' . $username . '</td>
            <td class="table__data">' . $password . '</td>
            <td class="table__data">
            <button>
              <a href="update_account.php?updateid=' . $emp_id . '">
               <span class="material-icons-sharp update-icon">edit</span>
              </a>
            </button>
        
        
            <button>
              <a href="delete_account.php?deleteid=' . $emp_id . '">
                <span class="material-icons-sharp delete-icon">delete</span>
              </a>
            </button>
        
              </td>
            </tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>