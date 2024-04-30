<?php 
include('../database/function_queries.php');
include('../database/db.php');

// Check if search term is provided
$searchTerm = isset($_GET['search-term']) ? $_GET['search-term'] : '';

// Fetch categories
$categories = getCategories($conn);

// Fetch games based on search term
if (!empty($searchTerm)) {
    // Fetch games based on search term
    $games = searchGames($conn, $searchTerm);
} else {
    // Fetch all games
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
<section class="search-form">
    <form action="" method="GET" name="search" role="search">
        <div class="form-group row">
            <label for="search-field" class="col-sm-3 col-form-label">Games</label>
            <div class="col-sm-9">
                <input type="search" name="search-term" id="search-field" class="form-control" placeholder="e.g. pizza, pet supplies">
            </div>
        </div>
        <div class="form-group row">
            <label for="categories" class="col-sm-3 col-form-label">Categories</label>
            <div class="col-sm-9">
                <select name="search categories" id="categories" class="form-control">
                    <?php
                    while ($row = mysqli_fetch_assoc($categories)) {
                        echo '<option value="' . $row['CategoryName'] . '">' . $row['CategoryName'] . '</option>';
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
            while ($game = mysqli_fetch_assoc($games)) {
      ?>
                <div class="col">
                    <div class="card">
                        <img src="<?php echo $game['path'];?>" class="card-img-top" alt="<?php echo $game['path'];?>">
                        <div class="card__content">
                            <p class="card__title"><?php echo $game['Title'];?></p>
                            <p class="card__description"><?php echo $game['Description'];?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
      ?>
        </div>
    </div>
</section>


<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
