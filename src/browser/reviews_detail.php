<?php
include '../database/db.php';
include '../database/function_queries.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['ReviewID'])) {
    $reviewID = $_GET['ReviewID'];
    $reviews = getReviewsDetails($conn, $reviewID);
} else {
    echo 'No ReviewID provided';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $reviews['ReviewTitle'];?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
           <?php echo $reviews['ReviewTitle']; ?>
        </div>
</div>
<aside class="row" itempropr="itemReviewed" itemscope itemtype="http://schema.org/Review">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo $reviews['PathDetails']; ?>" class="img-fluid">
                    </div>
                    <div class="col-md-9 review-game-res">
                        <h1 itemprop="reviewBody"><?php echo $reviews['game_title']; ?></h1>
                        <p itemprop="reviewBody"><?php echo $reviews['game_description']; ?></p>
                        <p itemprop="author">By <?php echo $reviews['game_dev']; ?></p>
                        <p itemprop="datePublished"><?php echo $reviews['game_date']; ?></p>
                        <a class="btn btn-primary" href="../browser/game_details.php?game_id=<?php echo $reviews['GameID']; ?>">Learn more about <?php echo $reviews['game_title'];?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
        <div class="media">
            <div class="pull-left">
                <img class="media-object" src="<?php echo $reviews['user_icone']; ?>?s=64" alt="<?php echo $reviews['user_name']; ?>">
            </div>
            <div class="media-body">
                <h4 class="media-heading" itemprop="author"><?php echo $reviews['user_name']; ?></h4>
                <p itemprop="datePublished"><?php echo $reviews['ReviewDate']; ?></p>
                <p itemprop="reviewBody"><?php echo $reviews['ReviewText']; ?></p>
        </div>
    </div>
</div>
</div>
</body>
</html>