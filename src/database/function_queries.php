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
    $stmt = $conn->prepare("SELECT g.Title, g.path, g.Description, g.ReleaseDate, g.Developer, g.GameID
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
    $stmt = $conn->prepare("SELECT Title, Developer, GameID,Description, ReleaseDate, path FROM Games");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function searchGames($conn, $searchTerm) {
    $stmt = $conn->prepare("SELECT Title, Developer, GameID,Description, ReleaseDate, path FROM Games WHERE Title LIKE ?");
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function searchGamesByTextAndCategory($conn, $searchTerm, $categoryName) {
    $searchTerm = '%' . $searchTerm . '%';
    $stmt = $conn->prepare("SELECT g.Title, g.path, g.GameID, g.Description, g.ReleaseDate, g.Developer
                            FROM Games g
                            INNER JOIN GameCategories gc ON g.GameID = gc.GameID
                            INNER JOIN Categories c ON gc.CategoryID = c.CategoryID
                            WHERE c.CategoryName = ? AND g.Title LIKE ?");
    $stmt->bind_param("ss", $categoryName, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function getGameById($conn, $id) {
    $stmt = $conn->prepare("SELECT Title, Developer,PathDetails,Price, Platform, Description, ReleaseDate, path FROM Games WHERE GameID = ?");
    $stmt->bind_param("i", $id); 
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getReviewsByGameId($conn, $gameId) {
    $stmt = $conn->prepare("SELECT * FROM Reviews WHERE GameID = ?");
    $stmt->bind_param("i", $gameId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


?>