<?php
include 'conn.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['submit'])) {
    $match_id = $_POST['match_id']; 
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

    
    $sql = "UPDATE matches SET
            date = '$date',
            time = '$time',
            stadium = '$stadium',
            leagueid = '$leagueid',
            score1 = '$score1',
            goals = '$goals',
            possession = '$possession',
            shotontarget = '$shotontarget',
            fouls = '$fouls',
            yellowcards = '$yellowcards',
            redcards = '$redcards',
            tid = '$tid',
            secondscore1 = '$secondscore1',
            secondgoals = '$secondgoals',
            secondpossession = '$secondpossession',
            secondshotontarget = '$secondshotontarget',
            secondfouls = '$secondfouls',
            secondyellowcards = '$secondyellowcards',
            secondredcards = '$secondredcards',
            secondtid = '$secondtid',
            status = '$status'
            WHERE id = '$match_id'";

    if ($conn->query($sql)) {
        echo "Match details updated successfully!";
        // header('location : adminmtupdate.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
    $conn->close();
}
}
?>
