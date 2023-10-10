<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['submit'])) {
    
    $date = $_POST['date'];
    $time = $_POST['time'];
    $stadium = $_POST['stadium'];
    $leagueid = $_POST['leagueid'];
    $score1 = $_POST['score1'];
    $goals = $_POST['goals'];
    $possession = $_POST['possession'];
    $shotontarget = $_POST['shotontarget'];
    $fouls = $_POST['fouls'];
    $yellowcards = $_POST['yellowcards'];
    $redcards = $_POST['redcards'];
    $tid = $_POST['tid'];
    $secondscore1 = $_POST['secondscore1'];
    $secondgoals = $_POST['secondgoals'];
    $secondpossession = $_POST['secondpossession'];
    $secondshotontarget = $_POST['secondshotontarget'];
    $secondfouls = $_POST['secondfouls'];
    $secondyellowcards = $_POST['secondyellowcards'];
    $secondredcards = $_POST['secondredcards'];
    $secondtid = $_POST['secondtid'];
    $status = $_POST['status'];

        $sql = "INSERT INTO matches (date, time, stadium, leagueid, score1, goals, possession, shotontarget, fouls, yellowcards, redcards, tid, secondscore1, secondgoals, secondpossession, secondshotontarget, secondfouls, secondyellowcards, secondredcards, secondtid, status)
            VALUES ('$date', '$time', '$stadium', '$leagueid', '$score1', '$goals', '$possession', '$shotontarget', '$fouls', '$yellowcards', '$redcards', '$tid', '$secondscore1', '$secondgoals', '$secondpossession', '$secondshotontarget', '$secondfouls', '$secondyellowcards', '$secondredcards', '$secondtid', '$status')";

    if ($conn->query($sql)) {
        echo "Match details inserted successfully!";
        header('Location: addmatch.php'); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
}
