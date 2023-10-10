<?php
// session_start();
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: signin.php");
//     exit;
// }


if (!isset($_GET["league_id"])) {
    echo "League ID not provided.";
    exit;
}

$league_id = $_GET["league_id"];


include 'conn.php';


$sql = "SELECT matches.id AS matchid, matches.score1 AS score1, matches.secondscore1 AS score2, t1.name AS team1_name, t1.logo AS team1_logo, t2.name AS team2_name, t2.logo AS team2_logo
        FROM matches
        INNER JOIN teams AS t1 ON matches.tid = t1.id
        INNER JOIN teams AS t2 ON matches.secondtd = t2.id
        WHERE matches.leagueid = $leagueid";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teams.css">
    <link rel="icon" type="image/png" href="../images/football.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>League Matches</title>

    <!-- Your CSS styles here -->

</head>

<body class="bg-dark">
    <!-- Your header code here -->

    <div class="container mt-4">
        <h2>Matches for Selected League</h2>
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['team1_name'] . ' vs ' . $row['team2_name'] . '</h5>';
                    echo '<img src="../uploads/' . $row['team1_logo'] . '" class="team-logo" alt="' . $row['team1_name'] . ' Logo">';
                    echo '<img src="../uploads/' . $row['team2_logo'] . '" class="team-logo" alt="' . $row['team2_name'] . ' Logo">';
                    echo '<p class="card-text">Match Date: ' . $row['match_date'] . '</p>';
                    echo '<p class="card-text">Score: ' . $row['team1_score'] . ' - ' . $row['team2_score'] . '</p>';
                    // Add more match details as needed
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-md-12">';
                echo '<p>No matches found for this league.</p>';
                echo '</div>';
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Your JavaScript and Bootstrap scripts here -->

</body>

</html>
