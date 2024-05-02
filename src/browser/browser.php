<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../database/function_queries.php');
include('../database/db.php');
require_once("../static/header.php");   

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
    <link rel="stylesheet" href="../../assets/css/browser-style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/svg+xml">
    <style>

    </style>
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
    <div class="header-title">
        <div class="title">
            Browse your favorite games
        </div>
    </div>
    <section class="search-form">
        <form action="" method="GET" name="search" role="search">
            <div class="form-group">
                <label for="search-field">Games</label>
                <input type="search" name="search-text" id="search-field" class="form-control" placeholder="League of legends , Dofus , ..." value="<?php echo htmlspecialchars($searchTerm); ?>">
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
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
            <div class="form-group">
                <button class="btn" type="submit">Search</button>
            </div>
        </form>
    </section> 
    <section id="Games">
        <div class="container">
            <div class="row">
                <?php
                $count = 0;
                if (mysqli_num_rows($games) > 0) {
                    while ($game = mysqli_fetch_assoc($games)) {
                        ?>
                        <div class="col">
                            <div class="game-card">
                                <a href="game_details.php?game_id=<?php echo $game['GameID']; ?>">
                                    <img src="<?php echo $game['path'];?>" class="card-img-top" alt="<?php echo $game['path'];?>">
                                    <div class="game-card__content">
                                        <p class="game-card__title"><?php echo $game['Title'];?></p>
                                        <p class="game-card__description"><?php echo $game['Description'];?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        $count++;
                        if ($count % 3 == 0) {
                            echo '</div><div class="row">';
                        }
                    }
                } else {
                    echo "<div>No games available</div>";
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
