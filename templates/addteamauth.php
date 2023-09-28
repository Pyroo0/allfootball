<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    include 'conn.php';

    // Retrieve the form data
    $name = $_POST["name"];
    $coach = $_POST["coach"];
    $history = $_POST["history"];
    $stadium = $_POST["stadium"];
    $ranking = $_POST["ranking"];

    // Upload the logo file
    $logo = $_FILES["logo"]["name"];
    $logo_tmp = $_FILES["logo"]["tmp_name"];
    $logo_destination = 'C:/xampp/htdocs/Allfootball/uploads/' . $logo;

    if (move_uploaded_file($logo_tmp, $logo_destination)) {
       
                $sql = "INSERT INTO team(name, coach, history, stadium, ranking, logo)
                VALUES ('$name', '$coach', '$history', '$stadium', '$ranking', '$logo_destination')";

        if ($conn->query($sql) === TRUE) {
            echo "New record added successfully";
            header('Location: addteam.php'); 
            exit; 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else { 
        echo "Error uploading the logo file.";
    }

    
    $conn->close();
}

?>