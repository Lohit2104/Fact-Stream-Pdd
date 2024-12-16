<?php
session_start();  // Start the session at the very top, before any HTML output
include('conn.php');

if (!isset($_SESSION['id'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id']; // Get logged-in user's ID

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $category = $_POST['category'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Handle file upload
    $picture = $_FILES['picture']['name'];
    $target_dir = "uploads/"; // Corrected file path
    $target_file = $target_dir . basename($picture);
    $uploadOk = 1;

    // Check if file was uploaded and move it
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Insert data into the database if the upload was successful
    if ($uploadOk) {
        $sql = "INSERT INTO submissions (category, picture, title, content, user_id) 
                VALUES ('$category', '$target_file', '$title', '$content', '$user_id')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the success page (user's own uploads page)
            header("Location: adduploads.php"); // Changed to user's upload page
            exit(); // Ensure the script stops after the redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
        echo "Failed to upload your submission.";
    }
} else {
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
?>
