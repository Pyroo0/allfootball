<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Prepare and bind SQL statement to insert data
    $sql = "INSERT INTO team (name, coach, history, stadium, ranking, logo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Get form data
    $name = $_POST["name"];
    $coach = $_POST["coach"];
    $history = $_POST["history"];
    $stadium = $_POST["stadium"];
    $ranking = $_POST["ranking"];
    
    // Check if a file was uploaded
    if ($_FILES['logo']['error'] === 0) {
        $uploadDir = 'C:/xampp/htdocs/Allfootball/uploads/';
        $logo_tmp = $_FILES['logo']['tmp_name']; // Temporary file path
        $logo_name = $_FILES['logo']['name']; // Original file name
        $logo_destination = $uploadDir . $logo_name; // Destination path
        move_uploaded_file($logo_tmp, $logo_destination);
    } else {
        $logo_destination = null; // Set to null if no file was uploaded
    }

    // Bind parameters
    $stmt->bind_param("ssssss", $name, $coach, $history, $stadium, $ranking, $logo_destination);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record added successfully";
        header('Location: addteam.php'); 
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
