<?php
include '../database/db.php';
include '../database/function_queries.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if game_id is provided in the URL
if (isset($_GET['game_id'])) {
    $gameId = $_GET['game_id'];
    $gameDetails = getGameById($conn, $gameId);
    $reviews = getReviewsByGameId($conn, $gameId);
} else {
    echo 'No game ID provided';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $gameDetails['Title'];?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="glassmorphism-nav">
    <ul>
        <li><a href="../dashboards/user_dashboard.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="../browser/browser.php">Browse</a></li>
        <li><a href="../user/profil.php">Profil</a></li>
    </ul>
</div>
<div class="header">
        <div class="title">
           <?php echo $gameDetails['Title']; ?>
        </div>
</div>
<div class="details-container">
    <div class="image">
        <img src="<?php echo $gameDetails['PathDetails']; ?>" alt="<?php echo $gameDetails['Title']; ?>">
    </div>
    <div class="platform">
        <img src="<?php echo $gameDetails['Platform']; ?>" alt="<?php echo $gameDetails['Title']; ?>">
    </div>
    <div class="price">
        <p class="card-price"><?php echo $gameDetails['Price']; ?> $</p>
    </div>
    <div class="content-details">
            <p><?php echo $gameDetails['Description']; ?></p>
    </div>
    <div class="footer-content-details">
        <p>Developed by <?php echo $gameDetails['Developer']; ?></p>
        <p></p>
        <p>Relesed on <?php echo $gameDetails['ReleaseDate']; ?></p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-md-12">
            <h2>Reviews</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Review Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($reviews)) {
                        echo '<tr>';
                        echo '<td>' . $row['ReviewText'] . '</td>';
                        echo '<td>' . $row['ReviewRating'] . '</td>';
                        echo '<td>' . $row['ReviewDate'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>