<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fullupmatch.css">
    <link rel="icon" type="image/png" href="../images/football.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/upmatch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">

    <title>Full Upcoming</title>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="onmatch.php">Matches</a>
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

        <?php
if (isset($_GET['matchid'])) {
    $match_id = $_GET['matchid'];

    include 'conn.php';

    $sql = "SELECT matches.id AS matchid, matches.date AS date, matches.time AS time, t1.name AS team_one_name, t1.logo AS team_one_logo, t2.name AS team_two_name, t2.logo AS team_two_logo FROM matches JOIN team AS t1 ON matches.tid = t1.id JOIN team AS t2 ON matches.secondtid = t2.id WHERE matches.id = '$match_id' AND matches.date > CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Format the time and append "AM" or "PM"
        $formatted_time = date('h:i A', strtotime($row['time']));

        echo '<div class="match-banner">';
        echo '<a href="#" class="competition-link">La Liga</a>';
        echo '<div class="team">';
        echo '<div class="team-info">';
        echo '<span class="team-name">' . $row['team_one_name'] . '</span>';
        echo '<img src="../images/' . $row['team_one_logo'] . '" alt="" class="team-logo1">';
        echo '</div>';
        echo '<div class="vs">' . $formatted_time . '</div>';
        echo '<div class="team-info">';
        echo '<img src="../images/' . $row['team_two_logo'] . '" alt="" class="team-logo2">';
        echo '<span class="team-name">' . $row['team_two_name'] . '</span>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo 'Match not found.';
    }
} else {
    echo 'No match ID provided.';
}

mysqli_close($conn);
?>

    <div class="lineup">
        <h2>Potential Line-ups</h2>
        <div class="team-links">
            <a href="#barcelona">Barcelona</a>
            <a href="#real-madrid">Real Madrid</a>
        </div>



        <?php
        include 'conn.php';


        $teamId = 1;
        $position = 'Forward'; // 

        // Fetch players based on team ID and position
        $sql = "SELECT * FROM player WHERE tid = ? AND position = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $teamId, $position);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="football-ground">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#" class="player ' . strtolower($row['position']) . '">';
                echo '<img src="../uploads/' . $row['photo'] . '" alt="' . $row['name'] . '">';
                echo '<span>' . $row['name'] . '</span>';
                echo '</a>';
            }
            echo '</div>';
        }
        ?>
        <?php
        include 'conn.php';


        $teamId = 1;
        $position = 'Midfielder'; // 

        // Fetch players based on team ID and position
        $sql = "SELECT * FROM player WHERE tid = ? AND position = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $teamId, $position);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="football-ground">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#" class="player ' . strtolower($row['position']) . '">';
                echo '<img src="../uploads/' . $row['photo'] . '" alt="' . $row['name'] . '">';
                echo '<span>' . $row['name'] . '</span>';
                echo '</a>';
            }
            echo '</div>';
        } else {
            echo "No players found for the specified team and position.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>

        <?php
        include 'conn.php';


        $teamId = 1;
        $position = 'Defender'; // 

        // Fetch players based on team ID and position
        $sql = "SELECT * FROM player WHERE tid = ? AND position = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $teamId, $position);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="football-ground">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#" class="player ' . strtolower($row['position']) . '">';
                echo '<img src="../uploads/' . $row['photo'] . '" alt="' . $row['name'] . '">';
                echo '<span>' . $row['name'] . '</span>';
                echo '</a>';
            }
            echo '</div>';
        }
        ?>

        <?php
        include 'conn.php';


        $teamId = 1;
        $position = 'Goalkeeper'; // 

        // Fetch players based on team ID and position
        $sql = "SELECT * FROM player WHERE tid = ? AND position = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $teamId, $position);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="football-ground">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#" class="player ' . strtolower($row['position']) . '">';
                echo '<img src="../uploads/' . $row['photo'] . '" alt="' . $row['name'] . '">';
                echo '<span>' . $row['name'] . '</span>';
                echo '</a>';
            }
            echo '</div>';
        }
        ?>
        <div class="football-ground">

        </div>
    </div>



</body>

</html>f