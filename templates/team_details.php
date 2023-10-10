<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teams.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Team Details</title>
    <style>
       
        .jumbotron {
            background-color: #003366;
            color: #fff;
            padding: 20px;
        }

        .team-logo {
            max-width: 200px;
        }
        .navbar {
            background-color: grey;
            width: 80%;
            align-items: center;
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
                        <li class="nav-item">
                            <a class="nav-link" href="onmatch.php">Matches</a>
                        </li>
                        <li class="nav-item active">
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

    <div class="container mt-5">
        <?php
        // Include your database connection file (conn.php) here
        include 'conn.php';

        // Check if the team ID is provided in the URL
        if (isset($_GET['team_id']) && is_numeric($_GET['team_id'])) {
            $team_id = $_GET['team_id'];

            // Query to retrieve team details based on team_id
            $sql = "SELECT * FROM team WHERE id = $team_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Display team details
                echo '<div class="jumbotron">';
                echo '<h2 class="display-4">' . $row['name'] . '</h2>';
                echo '<hr class="my-4">';
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo '<img src="../uploads/' . $row['logo'] . '" alt="' . $row['name'] . ' Logo" class="team-logo">';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<p><strong>Coach:</strong> ' . $row['coach'] . '</p>';
                echo '<p><strong>Stadium:</strong> ' . $row['stadium'] . '</p>';
                echo '<p><strong>About:</strong> ' . $row['history'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Add more details as needed

            } else {
                echo '<p class="alert alert-danger">Team not found.</p>';
            }

            // Close the database connection
            $conn->close();
        } else {
            echo '<p class="alert alert-danger">Invalid request. Please provide a valid team ID.</p>';
        }

        ?>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
