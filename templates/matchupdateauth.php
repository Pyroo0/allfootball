<?php
include 'conn.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['submit'])) {
    $matchid = $_POST['matchid']; 
    $date = $_POST['date'];
    $time = $_POST['time'];
    $stadium = $_POST['stadium'];
    $score1 = $_POST['score1'];
    $goals = $_POST['goals'];
    $possession = $_POST['possession'];
    $shotontarget = $_POST['shotontarget'];
    $fouls = $_POST['fouls'];
    $yellowcards = $_POST['yellowcards'];
    $redcards = $_POST['redcards'];
    $secondscore1 = $_POST['secondscore1'];
    $secondgoals = $_POST['secondgoals'];
    $secondpossession = $_POST['secondpossession'];
    $secondshotontarget = $_POST['secondshotontarget'];
    $secondfouls = $_POST['secondfouls'];
    $secondyellowcards = $_POST['secondyellowcards'];
    $secondredcards = $_POST['secondredcards'];

    
    $sql = "UPDATE matches SET
            date = '$date',
            time = '$time',
            stadium = '$stadium',
            score1 = '$score1',
            goals = '$goals',
            possession = '$possession',
            shotontarget = '$shotontarget',
            fouls = '$fouls',
            yellowcards = '$yellowcards',
            redcards = '$redcards',
            secondscore1 = '$secondscore1',
            secondgoals = '$secondgoals',
            secondpossession = '$secondpossession',
            secondshotontarget = '$secondshotontarget',
            secondfouls = '$secondfouls',
            secondyellowcards = '$secondyellowcards',
            secondredcards = '$secondredcards'
            WHERE id = '$matchid'";

    if ($conn->query($sql)) {
        echo "Match details updated successfully!";
        header('location : adminmatch.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
    $conn->close();
}
}
?>
