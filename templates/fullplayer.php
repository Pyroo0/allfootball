<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Player Details</title>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teams.css">
    <link rel="icon" type="image/png" href="../images/football.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Players</title>

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

       
            .player-details-heading {
            background-color: green; /* Customize the background color */
            color: #fff; 
            padding: 10px; 
            text-align: center; 
            border-radius: 5px; 
        }

        .no-border {
            border: none;
        }
    </style>
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
                            <a class="nav-link" href="league.php">Competitions</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="player.php">Players</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <div class="container mt-5">
        <div class="player-details-heading">
            <h2 class="mb-0">Player Details</h2>
        </div>
        <?php
        include 'conn.php';

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $player_id = $_GET['id'];

            $sql = "SELECT * FROM player WHERE id = $player_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="row">';
                echo '<div class="col-md-4">';
                echo '<div class="card bg-dark text-white">';
                echo '<img src="../uploads/' . $row['photo'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<div class="card bg-dark text-white">';
                echo '<div class="card-body">';
                echo '<p class="card-text">Age: ' . $row['age'] . ' years</p>';
                echo '<p class="card-text">Height: ' . $row['height'] . ' cm</p>';
                echo '<p class="card-text">Position: ' . $row['position'] . '</p>';
                echo '<p class="card-text">Appearances: ' . $row['appearances'] . '</p>';
                echo '<p class="card-text">Goals: ' . $row['goals'] . '</p>';
                echo '<p class="card-text">Assists: ' . $row['assist'] . '</p>';
                echo '<p class="card-text">Country: ' . $row['country'] . '</p>';
                echo '<p class="card-text">Saves: ' . $row['saves'] . '</p>';
                echo '<p class="card-text">Clean Sheets: ' . $row['cleansheet'] . '</p>';
                echo '<p class="card-text">Shots on Target: ' . $row['shotontarget'] . '</p>';                
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p class="alert alert-danger mt-4">Player not found.</p>';
            }
        } else {
            echo '<p class="alert alert-danger mt-4">Invalid player ID.</p>';
        }

        $conn->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </body>

</html>