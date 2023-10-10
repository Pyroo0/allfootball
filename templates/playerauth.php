<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include 'conn.php';

    // Get form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $position = $_POST['position'];
    $appearances = $_POST['appearances'];
    $goals = $_POST['goals'];
    $assist = $_POST['assist'];
    $country = $_POST['country'];
    $saves = $_POST['saves'];
    $cleansheet = $_POST['cleansheet'];
    $news = $_POST['news'];
    $shotontarget = $_POST['shotontarget'];
    $tid = $_POST['tid'];

    // Check if a file was uploaded
    if ($_FILES['photo']['error'] === 0) {
        
        $uploadDir = 'C:/xampp/htdocs/Allfootball/uploads/';
        $uploadedFile = $uploadDir . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadedFile);
    } else {
        $uploadedFile = null; 
    }

    
    $sql = "INSERT INTO player (name, age, height, position, appearances, goals, assist, country, saves, cleansheet, news, shotontarget, photo, tid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $name, $age, $height, $position, $appearances, $goals, $assist, $country, $saves, $cleansheet, $news, $shotontarget, $uploadedFile, $tid);

    if (mysqli_stmt_execute($stmt)) {
        echo "Player added successfully!";
        header('Location: addplayer.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>