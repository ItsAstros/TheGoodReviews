<?php
include 'db.php';
// Function to retrieve categories
function getCategories($conn) {
    $sql = "SELECT CategoryName FROM Categories";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error fetching categories: " . mysqli_error($conn));
    }
    return $result;
}

// Function to get games by category
function getGamesByAnyCategory($conn, $category) {
    $stmt = $conn->prepare("SELECT g.Title, g.Description, g.ReleaseDate, g.Developer
                            FROM Games g
                            INNER JOIN GameCategories gc ON g.GameID = gc.GameID
                            INNER JOIN Categories c ON gc.CategoryID = c.CategoryID
                            WHERE c.CategoryName =?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


function getAllGames($conn) {
    $stmt = $conn->prepare("SELECT Title, Developer, ReleaseDate, CoverImage, path FROM Games");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


?>