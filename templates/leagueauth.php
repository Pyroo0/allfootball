<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include 'conn.php';

    // Get form data
    $name = $_POST['name'];
    $region = $_POST['region'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $status = $_POST['status'];

    // Check if a file was uploaded
    if ($_FILES['logo']['error'] === 0) {
        
        $uploadDir = 'C:/xampp/htdocs/Allfootball/uploads/';
        $uploadedFile = $uploadDir . $_FILES['logo']['name'];
        move_uploaded_file($_FILES['logo']['tmp_name'], $uploadedFile);
    } else {
        $uploadedFile = null; 
    }

    
    $sql = "INSERT INTO league (name, region, startdate, enddate, status, logo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $region, $startdate, $enddate, $status, $uploadedFile);

    if (mysqli_stmt_execute($stmt)) {
        echo "League created successfully!";
        header('Location: addleague.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
