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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teams.css">
    <link rel="icon" type="image/png" href="../images/football.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>League</title>

    <style>
        .navbar {
            background-color: grey;
            width: 80%;
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
            margin: 10px;
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
            font-family: 'Your Desired Font', sans-serif;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #003366;
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
            right: -35px;
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
                            <a class="nav-link" href="onmatch.php">Matches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teams.php">Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="league.php">Competitions</a>
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

        <div class="container mt-4">
            <div class="row">
                <?php

                include 'conn.php';
                $sql = "SELECT * FROM league WHERE id =$leagueid";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<div class="col-md-4">';
                        echo '<div class="card mb-4">';
                        
                        // Add the anchor tag here with the onclick function
                        echo '<a href="league_matches.php?league_id=' . $row['id'] . '" class="match-box-link">';
                        
                        echo '<img src="../uploads/' . $row['logo'] . '" class="card-img-top" alt="' . $row['name'] . ' Logo">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                        echo '</div>';
                        
                        // Close the anchor tag
                        echo '</a>';
                        
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-md-12">';
                    echo '<p>No leagues found.</p>';
                    echo '</div>';
                }


                mysqli_close($conn);
                ?>
            </div>
        </div>


    </body>

</html>