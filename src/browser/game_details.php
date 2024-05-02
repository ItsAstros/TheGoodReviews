<?php
include '../database/db.php';
include '../database/function_queries.php'; 
require_once("../static/header.php");   

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    <link rel="stylesheet" href="../../assets/css/browser-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div>
  <?php 
if (isset($_SESSION["user"])) {
    if ($_SESSION["isAdmin"]=="yes") {
        admin_header_template();
    } else {
        user_header_template();
    }
    } else {
    visitor_header_template();
    }
?>
</div>
<div class="main-container">
    <div class="main">
        <div class="gamepage-header">
            <div class="parallax-container">
                    <div class="parallax-background" style="background-image: url(<?php echo $gameDetails['PathDetails']; ?>);"></div>
                        <div class="header-title-details">
                            <div class="title-details">
                            <?php echo $gameDetails['Title']; ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="header-details">
                <div class="game-cover">
                    <img class="img-responsive cover_big" src=<?php echo $gameDetails['path']; ?> alt="<?php echo $gameDetails['Title']; ?>">
                </div>
                <div class="gampepage-summary">
                    <div class="game-title-container">
                        <div class="gamepage-title-wrapper">
                            <?php
                                $releaseDate = new DateTime($gameDetails['ReleaseDate']);
                                $currentDate = new DateTime();
                                $interval = $currentDate->diff($releaseDate);
                                $years = $interval->y;
                                $months = $interval->m;
                                $days = $interval->d;
                                $formattedReleaseDate = $releaseDate->format('M d Y');
                                if ($years > 1) {
                                echo "<p>{$formattedReleaseDate} - {$years} years ago</p>";
                                } elseif ($years == 1) {
                                echo "<p>{$formattedReleaseDate} - Last year</p>";
                                } elseif ($months > 0) {
                                echo "<p>{$formattedReleaseDate} - {$months} months ago</p>";
                                } else {
                                echo "<p>{$formattedReleaseDate} - {$days} days ago</p>";
                                }
                            ?>                
                            <p></p>
                            <p1><?php echo $gameDetails['Developer']; ?></p1>
                        </div>
                        <div class="gamepage-tabs"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="details-container">
    <div class="">
        <div class="image">
        </div>
        <div class="platform">
            <img src="<?php echo $gameDetails['Platform']; ?>" alt="<?php echo $gameDetails['Title']; ?>">
        </div>
    </div>
    <div class="content-details">
            <p><?php echo $gameDetails['Description']; ?></p>
    </div>
    <div class="footer-content-details">
        <p>Developed by <?php echo $gameDetails['Developer']; ?></p>
        <p></p>
        <p>Relesed on <?php echo $gameDetails['ReleaseDate']; ?></p>
        <p></p>
        <p class="card-price"><?php echo $gameDetails['Price']; ?> $</p>
    </div>
</div>
<div>
    <div class="Reviwes-section">
        <div class="header-title">
            <div class="title">
                Reviews
            </div>
        </div>
    </div>
<div class="container">
    <div class="row row-cols-3 row-cols-md-3 justify-content space-between">
        <?php
        if (mysqli_num_rows($reviews) > 0){
            while ($review = mysqli_fetch_assoc($reviews)){
        ?>
                <div class="col">
                    <div class="card">
                        <a href="reviews_detail.php?ReviewID=<?php echo $review['ReviewID']; ?>">
                            <div class="card__content">
                                <p class="card__title"><?php echo $review['ReviewTitle'];?></p>
                                <p class="card__description"><?php echo $review['Rating'];?></p>
                            </div>
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div>No games available</div>";
        }
        ?>
    </div>
</div>

</div>
</body>
</html>