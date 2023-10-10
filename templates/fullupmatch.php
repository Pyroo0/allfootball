<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fullupmatch.css">
    <link rel="icon" type="image/png" href="../images/football.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Full Upcoming</title>
</head>

<body>

    <header class="header">
        <p><a href="home.php">All Football</a></p>
        <nav>
            <ul>
                <li><a href="#">Matches</a></li>
                <li><a href="#">Teams</a></li>
                <li><a href="#">Competitions</a></li>
                <li><a href="#">Extra</a></li>
            </ul>
            <div class="reg">
                <ul>
                    <li><a href="#"><i class="fa fa-fw fa-search"></i></a></li>
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
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

            echo '<div class="match-banner">';
            echo '<a href="#" class="competition-link">La Liga</a>';
            echo '<div class="team">';
            echo '<div class="team-info">';
            echo '<span class="team-name">' . $row['team_one_name'] . '</span>';
            echo '<img src="../images/' . $row['team_one_logo'] . '" alt="" class="team-logo1">';
            echo '</div>';
            echo '<div class="vs">' . $row['time'] . '</div>';
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