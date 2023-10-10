<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Details Form</title>
    <link rel="stylesheet" href="../css/adminmtform.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <header>
        <h1>Match Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#live-matches">Live Matches</a></li>
            <li><a href="#upcoming-matches">Upcoming Matches</a></li>
            <li><a href="#standings">Standings</a></li>

        </ul>
    </nav>

    <div class="container mt-5">
        <h2>Match Details Form</h2>
        <form action="matchupdateauth.php" method="post">
            <?php

            include 'conn.php';
            // Get the Match ID from the URL
            $matchId = $_GET['matchid'];

            // Define your SQL query to retrieve match data
            $sql = "SELECT * FROM matches WHERE id = $matchId";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                // Fetch the data from the result
                $row = mysqli_fetch_assoc($result);

                // Assign fetched values to variables
                $date = $row['date'];
                $time = $row['time'];
                $stadium = $row['stadium'];
                $leagueId = $row['leagueid'];
                $score1 = $row['score1'];
                $goals = $row['goals'];
                $possession = $row['possession'];
                $shotOnTarget = $row['shotontarget'];
                $fouls = $row['fouls'];
                $yellowCards = $row['yellowcards'];
                $redCards = $row['redcards'];
                $tid = $row['tid'];
                $secondScore1 = $row['secondscore1'];
                $secondGoals = $row['secondgoals'];
                $secondPossession = $row['secondpossession'];
                $secondShotOnTarget = $row['secondshotontarget'];
                $secondFouls = $row['secondfouls'];
                $secondYellowCards = $row['secondyellowcards'];
                $secondRedCards = $row['secondredcards'];
                $secondTid = $row['secondtid'];
                $status = $row['status'];
            } else {
                // Handle any errors here
                echo "Error: " . mysqli_error($connection);
            }
            ?>

            <div class="form-group col-md-2">
                <label for="match_id">Match ID</label>
                <input type="text" class="form-control" id="matchid" name="matchid" value="<?php echo $matchId; ?>">
            </div>

            <div class="form-row">


                <div class="form-group col-md-3">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" value="<?php echo $time; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="stadium">Stadium</label>
                    <input type="text" class="form-control" id="stadium" name="stadium" value="<?php echo $stadium; ?>">
                </div>
            </div>



            <div class="form-row">

                <div class="form-group col-md-2">
                    <label for="score1">Score 1</label>
                    <input type="text" class="form-control" id="score1" name="score1" value="<?php echo $score1; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="goals">Goals</label>
                    <input type="text" class="form-control" id="goals" name="goals" value="<?php echo $goals; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="possession">Possession</label>
                    <input type="text" class="form-control" id="possession" name="possession" value="<?php echo $possession; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="shotontarget">Shots on Target</label>
                    <input type="text" class="form-control" id="shotontarget" name="shotontarget" value="<?php echo $shotOnTarget; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="fouls">Fouls</label>
                    <input type="text" class="form-control" id="fouls" name="fouls" value="<?php echo $fouls; ?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="yellowcards">Yellow Cards</label>
                    <input type="text" class="form-control" id="yellowcards" name="yellowcards" value="<?php echo $yellowCards; ?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="redcards">Red Cards</label>
                    <input type="text" class="form-control" id="redcards" name="redcards" value="<?php echo $redCards; ?>">
                </div>

                <div class="form-group col-md-2">
                    <label for="score1">SeconScore 1</label>
                    <input type="text" class="form-control" id="secondscore1" name="secondscore1" value="<?php echo $secondScore1; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="secondgoals">Second Goals</label>
                    <input type="text" class="form-control" id="secondgoals" name="secondgoals" value="<?php echo $secondGoals; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="secondpossession">Second Possession</label>
                    <input type="text" class="form-control" id="secondpossession" name="secondpossession" value="<?php echo $secondPossession; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="secondshotontarget">second Shots on Target</label>
                    <input type="text" class="form-control" id="secondshotontarget" name="secondshotontarget" value="<?php echo $secondShotOnTarget; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="secondfouls">Second Fouls</label>
                    <input type="text" class="form-control" id="secondfouls" name="secondfouls" value="<?php echo $secondFouls; ?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="secondyellowcards">Second Yellow Cards</label>
                    <input type="text" class="form-control" id="secondyellowcards" name="secondyellowcards" value="<?php echo $secondYellowCards; ?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="secondredcards">Second Red Cards</label>
                    <input type="text" class="form-control" id="secondredcards" name="secondredcards" value="<?php echo $secondRedCards; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

</body>

</html>