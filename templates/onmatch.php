<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/football.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/onmatch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <title>Live Matches</title>
    <style>
        .navbar {
            background-color: grey;
            width: 80%;
            height: 12vh;
        }

        .navbar-light .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: black;
        }

        .jumbotron {
            background-color: grey;
            color: #003366;
        }

        .jumbotron a.btn-primary {
            background-color: #003366;
            border-color: #003366;
        }

        .jumbotron a.btn-primary:hover {
            background-color: #00234d;
            border-color: #00234d;
        }

        .no-matches-found {
            text-align: center;
            margin-top: 50px;
        }

        .no-matches-found p {
            font-size: 24px;
        }

        .match-buttons {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .match-buttons a {
            margin: 10px;
        }

        .live-matches-title {
            text-align: center;
            margin-top: 50px;
            color: #fff;
            margin-bottom: 40px;
        }

        .match-box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .match-box {
            margin-left: 35vw;
        }

        .match-box .team {
            text-align: center;
        }

        .match-box img {
            max-width: 100px;
            max-height: 100px;
        }

        .match-box .vs {
            font-size: 24px;
            text-align: center;
            margin: 10px 0;
        }

        .match-box .date-time {
            text-align: center;
        }

        .navbar-brand {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #003366;
            position: relative;
        }

        .navbar-brand::before {
            content: "⚽ ";
            display: inline-block;
            animation: spin 2s linear infinite;
            position: absolute;
            left: 190px;
            /* Adjust the left position to move the football to the side of "All Football" */
            top: 10%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-dark">

    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="home.php">All Football</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="onmatch.php">Matches</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="teams.php">Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="league.php">Competitions</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="player.php">Players</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>   

        <h2 class="live-matches-title">Live Matches</h2>
        <div class="match-buttons">
            <a href="upmatch.php" class="btn btn-primary">Upcoming Matches</a>
            <a href="recentmatch.php" class="btn btn-primary">Recent Matches</a>
        </div>
        </div>


        <?php

        include 'conn.php';


        $sql = "SELECT matches.id AS matchid, matches.score1 AS score1, matches.secondscore1 AS score2, t1.name AS team_one_name, t1.logo AS team_one_logo, t2.name AS team_two_name, t2.logo AS team_two_logo 
        FROM matches 
        JOIN team AS t1 ON matches.tid = t1.id 
        JOIN team AS t2 ON matches.secondtid = t2.id 
        WHERE matches.date = CURDATE()";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="match-box" onclick="location.href=\'fullonmatch.php?matchid=' . $row['matchid'] . '\'">';
                echo '<div class="team team-left">';
                echo '<span>' . $row['team_one_name'] . '</span>';
                echo '<img src="../uploads/' . $row['team_one_logo'] . '" alt="">';
                echo '</div>';
                echo '<div class="score">';
                echo '<span>' . $row['score1'] . ' - ' . $row['score2'] . '</span>';
                echo '</div>';
                echo '<div class="team team-right">';
                echo '<img src="../uploads/' . $row['team_two_logo'] . '" alt="">';
                echo '<span>' . $row['team_two_name'] . '</span>';
                echo '</div>';
                echo '<div class="date-time">';
                echo '<span>' . date('M j', strtotime($row['date'])) . '</span>';
                echo '<span class="live-time">' . $row['time'] . '</span>';
                echo '</div>';
                echo '</div>';            }
        } else {
            echo '<div class="no-matches-found">';
            echo '<p>No Live matches found.</p>';
            echo '</div>';
        }


        mysqli_close($conn);
        ?>


        <script>
            function updateLiveTime() {
                const matchBoxes = document.querySelectorAll(".match-box");

                matchBoxes.forEach((matchBox) => {
                    const liveTimeElement = matchBox.querySelector(".live-time");
                    const currentTime = new Date(); // Get the current time
                    const hours = currentTime.getHours().toString().padStart(2, "0");
                    const minutes = currentTime.getMinutes().toString().padStart(2, "0");
                    const liveTime = `${hours}:${minutes}`;
                    liveTimeElement.textContent = `Live Time: ${liveTime}`;
                });
            }


            setInterval(updateLiveTime, 60000);
        </script>

    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>