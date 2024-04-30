<?php
include 'db.php';

// Function to retrieve latest reviews with user information
function getLatestReviews($conn) {
    $sql = "
    SELECT r.ReviewID, r.ReviewText, r.Rating, r.ReviewDate, u.full_name
    FROM Reviews r
    JOIN users u ON r.User_email = u.email
    ORDER BY r.ReviewDate DESC
    LIMIT 10;
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error fetching latest reviews: " . mysqli_error($conn));
    }
    return $result;
}

// Function to find games by genre
function getGamesByGenre($conn, $genre) {
    $sql = "
    SELECT Title, Description, ReleaseDate, Developer
    FROM Games
    WHERE Genre = '$genre'
    ORDER BY ReleaseDate DESC;
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error fetching games by genre: " . mysqli_error($conn));
    }
    return $result;
}

// Function to count likes for a review
function countLikesForReview($conn, $reviewID) {
    $sql = "
    SELECT ReviewID, COUNT(*) AS LikeCount
    FROM Likes
    WHERE ReviewID = $reviewID
    GROUP BY ReviewID;
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error counting likes for review: " . mysqli_error($conn));
    }
    return $result;
}

// Function to retrieve comments for a review
function getCommentsForReview($conn, $reviewID) {
    $sql = "
    SELECT c.CommentID, c.CommentText, c.CommentDate, u.full_name
    FROM Comments c
    JOIN users u ON c.User_email = u.email
    WHERE c.ReviewID = $reviewID
    ORDER BY c.CommentDate DESC;
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error fetching comments for review: " . mysqli_error($conn));
    }
    return $result;
}

// Function to retrieve top rated games
function getTopRatedGames($conn) {
    $sql = "
    SELECT Title, AVG(rating) AS AverageRating
    FROM Reviews
    GROUP BY GameID
    ORDER BY AverageRating DESC
    LIMIT 10;
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error fetching top rated games: " . mysqli_error($conn));
    }
    return $result;
}

// Function to retrieve user's liked reviews
function getUserLikedReviews($conn, $userEmail) {
    $sql = "
    SELECT r.ReviewID, r.ReviewText, r.Rating, r.ReviewDate
    FROM Reviews r
    JOIN Likes l ON r.ReviewID = l.ReviewID
    WHERE l.User_email = '$userEmail';
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error fetching user's liked reviews: " . mysqli_error($conn));
    }
    return $result;
}



?>