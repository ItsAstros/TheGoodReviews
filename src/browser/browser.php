<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../database/function_queries.php');
include('../database/db.php');

$searchTerm = isset($_GET['search-text']) ? $_GET['search-text'] : '';
$searchCategory = isset($_GET['search-categories']) ? $_GET['search-categories'] : '';

$categories = getCategories($conn);

if (!empty($searchTerm) && !empty($searchCategory)) {
    $games = searchGamesByTextAndCategory($conn, $searchTerm, $searchCategory);
} elseif (!empty($searchTerm) && empty($searchCategory)) {
    $games = searchGames($conn, $searchTerm);
} elseif (!empty($searchCategory) && empty($searchTerm))  {
    $games = getGamesByAnyCategory($conn, $searchCategory);
} else {
    $games = getAllGames($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>TheGoodReviews</title>
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
<section class="search-form">
        <form action="" method="GET" name="search" role="search" style="width: 70%;">
        <div class="form-group row">
            <p></p>
            </div>
            <div class="form-group row">
                <label for="search-field" class="col-sm-3 col-form-label">Games</label>
                <div class="col-sm-9">
                    <input type="search" name="search-text" id="search-field" class="form-control" placeholder="e.g. pizza, pet supplies" value="<?php echo htmlspecialchars($searchTerm); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="categories" class="col-sm-3 col-form-label">Categories</label>
                <div class="col-sm-9">
                    <select name="search-categories" id="categories" class="form-control">
                        <option value="">All Categories</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($categories)) {
                            $selected = ($searchCategory == $row['CategoryName']) ? 'selected' : '';
                            echo '<option value="' . $row['CategoryName'] . '" ' . $selected . '>' . $row['CategoryName'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button class="btn btn-primary btn-block">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </section> 
    <section id="Games">
        
        <div class="container">
            <div class="row row-cols-3 row-cols-md-3 justify-content space-between">
            <?php
                if (mysqli_num_rows($games) > 0) {
                    while ($game = mysqli_fetch_assoc($games)) {
            ?>
                        <div class="col">
                            <div class="card">
                            <a href="game_details.php?game_id=<?php echo $game['GameID']; ?>">
                                <img src="<?php echo $game['path'];?>" class="card-img-top" alt="<?php echo $game['path'];?>">
                                <div class="card__content">
                                    <p class="card__title"><?php echo $game['Title'];?></p>
                                    <p class="card__description"><?php echo $game['Description'];?></p>
                                </div>
                            </div>
                            </a>
                        </div>
            <?php
                    }
                } else {
                    echo "<div>No games available</div>";
                }
            ?>
            </div>
        </div>
    </section>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
