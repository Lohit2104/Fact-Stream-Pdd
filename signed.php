<?php
// Include the database connection file
include('conn.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $username = $_POST['username'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    // Insert data into the 'user' table
    $insert = "INSERT INTO user (email_id, username, password) VALUES ('$email_id', '$username', '$password')";

    // Execute the query and check if it was successful
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo "Successfully added. You will be redirected to the login page shortly.";
        // JavaScript redirect after 3 seconds
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 3000);
              </script>";
    } else {
        echo "Error occurred: " . mysqli_error($conn);
    }
} else {
    echo "Form not submitted.";
}
?>
