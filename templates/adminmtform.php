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
        <form action="adminmtauth.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="stadium">Stadium</label>
                    <input type="text" class="form-control" id="stadium" name="stadium" value="campnou" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="leagueid">League Id</label>
                    <input type="text" class="form-control" id="leagueid" name="leagueid" required>
                </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="score1">Score 1</label>
                    <input type="text" class="form-control" id="score1" name="score1" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="goals">Goals</label>
                    <input type="text" class="form-control" id="goals" name="goals" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="possession">Possession</label>
                    <input type="text" class="form-control" id="possession" name="possession" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="shotontarget">Shots on Target</label>
                    <input type="text" class="form-control" id="shotontarget" name="shotontarget" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="fouls">Fouls</label>
                    <input type="text" class="form-control" id="fouls" name="fouls" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="yellowcards">Yellow Cards</label>
                    <input type="text" class="form-control" id="yellowcards" name="yellowcards" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="redcards">Red Cards</label>
                    <input type="text" class="form-control" id="redcards" name="redcards" required>
                </div>

                <div class="form-group col-md-1">
                    <label for="tid">TID</label>
                    <input type="text" class="form-control" id="tid" name="tid" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="score1">SeconScore 1</label>
                    <input type="text" class="form-control" id="secondscore1" name="secondscore1" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="secondgoals">Second Goals</label>
                    <input type="text" class="form-control" id="secondgoals" name="secondgoals" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="secondpossession">Second Possession</label>
                    <input type="text" class="form-control" id="secondpossession" name="secondpossession" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="secondshotontarget">second Shots on Target</label>
                    <input type="text" class="form-control" id="secondshotontarget" name="secondshotontarget" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="secondfouls">Second Fouls</label>
                    <input type="text" class="form-control" id="secondfouls" name="secondfouls" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="secondyellowcards">Second Yellow Cards</label>
                    <input type="text" class="form-control" id="secondyellowcards" name="secondyellowcards" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="secondredcards">Second Red Cards</label>
                    <input type="text" class="form-control" id="secondredcards" name="secondredcards" required>
                </div>

                <div class="form-group col-md-1">
                    <label for="tid">Second TID</label>
                    <input type="text" class="form-control" id="secondtid" name="secondtid" required>
                </div>

                <div class="form-group col-md-1">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Select</option>
                        <option value="Upcoming">Upcoming</option>
                        <option value="ongoing">Ongoing</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>