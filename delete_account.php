<?php
// Include the database connection file
include('./connection.php');

// Check for a valid connection and retrieve the ID of the record to delete
if (isset($_GET['deleteid'])) {
    $empId = $_GET['deleteid'];

    // Construct and execute the SQL query to delete the record
    $result = mysqli_query($conn, "DELETE FROM employeetable WHERE emp_id = $empId");

    // Check if the query was successful or display an error message
    if ($result) {
        // Redirect the user to the dashboard_admin.php page
        header('location: dashboard_admin.php');
    } else {
        // Display the error message and stop executing the script
        die(mysqli_error($conn));
    }
}
