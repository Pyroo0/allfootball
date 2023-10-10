<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Create New League</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Create a New League</h2>
        <form method="POST" action="leagueauth.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">League Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" class="form-control" id="region" name="region" required>
            </div>
            <div class="form-group">
                <label for="startdate">Start Date:</label>
                <input type="date" class="form-control" id="startdate" name="startdate" required>
            </div>
            <div class="form-group">
                <label for="enddate">End Date:</label>
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="logo">League Logo:</label>
                <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Create League</button>
        </form>
    </div>
</body>
</html>
