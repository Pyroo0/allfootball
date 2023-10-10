<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Player</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Player</h2>
        <form method="POST" action="playerauth.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="height">Height (in cm):</label>
                <input type="number" class="form-control" id="height" name="height" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="appearances">Appearances:</label>
                <input type="number" class="form-control" id="appearances" name="appearances" required>
            </div>
            <div class="form-group">
                <label for="goals">Goals:</label>
                <input type="number" class="form-control" id="goals" name="goals" required>
            </div>
            <div class="form-group">
                <label for="assist">Assists:</label>
                <input type="number" class="form-control" id="assist" name="assist" required>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="saves">Saves:</label>
                <input type="number" class="form-control" id="saves" name="saves" required>
            </div>
            <div class="form-group">
                <label for="cleansheet">Clean Sheets:</label>
                <input type="number" class="form-control" id="cleansheet" name="cleansheet" required>
            </div>
            <div class="form-group">
                <label for="news">News:</label>
                <textarea class="form-control" id="news" name="news" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="shotontarget">Shots on Target:</label>
                <input type="number" class="form-control" id="shotontarget" name="shotontarget" required>
            </div>
            <div class="form-group">
                <label for="photo">Player Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="tid">Team ID:</label>
                <input type="number" class="form-control" id="tid" name="tid" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Player</button>
        </form>
    </div>
</body>
</html>
