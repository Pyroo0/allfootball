<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Match Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container mt-5">
        <h2>Edit Match Details</h2>
        <form method="POST" action="adminmtupdate.php"> 
            <input type="hidden" name="id" id="id" value="">
            
            <!-- Add a field to input the ID -->
            <div class="form-group">
                <label for="input-id">Enter ID:</label>
                <input type="text" class="form-control" id="input-id" name="input-id">
            </div>
            
            <!-- Add a button to fetch data based on the entered ID -->
            <button type="button" class="btn btn-primary" onclick="fetchData()">Fetch Data</button>
            
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            
           <!-- Add other form fields and populate them with existing data as needed -->
<div class="form-group">
    <label for="stadium">Stadium</label>
    <input type="text" class="form-control" id="stadium" name="stadium" value="<?php echo isset($existingData['stadium']) ? $existingData['stadium'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="score1">Score 1</label>
    <input type="text" class="form-control" id="score1" name="score1" value="<?php echo isset($existingData['score1']) ? $existingData['score1'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="goals">Goals</label>
    <input type="text" class="form-control" id="goals" name="goals" value="<?php echo isset($existingData['goals']) ? $existingData['goals'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="possession">Possession</label>
    <input type="text" class="form-control" id="possession" name="possession" value="<?php echo isset($existingData['possession']) ? $existingData['possession'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="shotontarget">Shots on Target</label>
    <input type="text" class="form-control" id="shotontarget" name="shotontarget" value="<?php echo isset($existingData['shotontarget']) ? $existingData['shotontarget'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="fouls">Fouls</label>
    <input type="text" class="form-control" id="fouls" name="fouls" value="<?php echo isset($existingData['fouls']) ? $existingData['fouls'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="yellowcards">Yellow Cards</label>
    <input type="text" class="form-control" id="yellowcards" name="yellowcards" value="<?php echo isset($existingData['yellowcards']) ? $existingData['yellowcards'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="redcards">Red Cards</label>
    <input type="text" class="form-control" id="redcards" name="redcards" value="<?php echo isset($existingData['redcards']) ? $existingData['redcards'] : ''; ?>" required>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="completed" <?php if (isset($existingData['status']) && $existingData['status'] === 'completed') echo 'selected'; ?>>Completed</option>
        <option value="pending" <?php if (isset($existingData['status']) && $existingData['status'] === 'pending') echo 'selected'; ?>>Pending</option>
    </select>
</div>

<div class="form-group">
    <label for="tid">TID</label>
    <input type="text" class="form-control" id="tid" name="tid" value="<?php echo isset($existingData['tid']) ? $existingData['tid'] : ''; ?>" required>
</div>


</body>
</html>

<script>
function fetchData() {
    // Get the ID entered by the user
    var inputId = $("#input-id").val();

    // Make an AJAX request to your PHP script
    $.ajax({
        type: "POST",
        url: "adminmtupdate.php",
        data: { id: inputId },
        dataType: "json", // Assuming your PHP script returns JSON
        success: function(response) {
            // Populate the form fields with the retrieved data
            if (response.success) {
                var existingData = response.data;
                $("#stadium").val(existingData.stadium);
                $("#score1").val(existingData.score1);
                $("#goals").val(existingData.goals);
                $("#possession").val(existingData.possession);
                $("#shotontarget").val(existingData.shotontarget);
                $("#fouls").val(existingData.fouls);
                $("#yellowcards").val(existingData.yellowcards);
                $("#redcards").val(existingData.redcards);
                $("#status").val(existingData.status);
                $("#tid").val(existingData.tid);
            } else {
                // Handle the case where no data was found for the given ID
                alert("No data found for the provided ID.");
            }
        },
        error: function(xhr, status, error) {
            // Handle the AJAX request error
            alert("Error: " + error);
        }
    });
}
</script>

