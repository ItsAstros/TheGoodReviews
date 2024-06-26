<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../database/db.php';
require_once("../static/header.php");   

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login-register/login.php");
    exit();
}

function formatDaysPassed($days) {
    if ($days == 0) {
        return "Member since today";
    } elseif ($days == 1) {
        return "Member since 1 day";
    } else {
        return "Member since $days days";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "POST request received";
    $userEmail = $_SESSION['user_email']; 

    if (isset($_POST['deletePhoto']) && $_SESSION['icone'] !== "../../assets/images/pp/defaultpp.png") {
        $defaultIcon = "../../assets/images/pp/defaultpp.png";
        $query = "SELECT *, DATEDIFF(NOW(), datecreation) AS days_passed FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $user = mysqli_fetch_assoc($result); 
        $deletedIcon = "../../assets/images/pp/" . basename($user['icone']);                
        if (file_exists($deletedIcon) && unlink($deletedIcon)) {
            $query = "UPDATE users SET icone = ? WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ss", $defaultIcon, $userEmail);
            mysqli_stmt_execute($stmt);
            $_SESSION['icone'] = $defaultIcon;

            header("Location: profil.php");
            exit();
        } else {
            echo "Error deleting the photo.";
        }
    }
    if (isset($_POST['name']) && $_POST['name'] !== $user['full_name']) {
        $newName = $_POST['name'];
        $query = "UPDATE users SET full_name = ? WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $newName, $userEmail);
        mysqli_stmt_execute($stmt);
    }

    if (isset($_POST['password']) && strlen($_POST['password']) >= 8) {
        $newPassword = $_POST['password'];
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = ? WHERE email = ?"; 
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $userEmail);
        mysqli_stmt_execute($stmt);
    }
    if (isset($_POST['X']) && $_POST['X'] !== $user['X']) {
        $newX = $_POST['X'];
        $query = "UPDATE users SET X = ? WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $newX, $userEmail);
        mysqli_stmt_execute($stmt);
    }
    if (isset($_POST['Discord']) && $_POST['Discord'] !== $user['Discord']) {
        $newDiscord = $_POST['Discord'];
        $query = "UPDATE users SET Discord = ? WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $newDiscord, $userEmail);
        mysqli_stmt_execute($stmt);
    }


    header("Location: profil.php");
    exit();
}

$userEmail = $_SESSION['user_email']; 
$query = "SELECT *, DATEDIFF(NOW(), datecreation) AS days_passed FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $userEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

$user['days_passed'] = $user['days_passed'] > 0 ? $user['days_passed'] : 0;
$userID = $_SESSION['userID'];

$queryCountReviews = "SELECT COUNT(*) as review_count FROM Reviews WHERE UserID = ?";
$stmtCountReviews = mysqli_prepare($conn, $queryCountReviews);
mysqli_stmt_bind_param($stmtCountReviews, "i", $userID); 
mysqli_stmt_execute($stmtCountReviews);
$resultCountReviews = mysqli_stmt_get_result($stmtCountReviews);
$rowCountReviews = mysqli_fetch_assoc($resultCountReviews);
$reviewCount = $rowCountReviews['review_count'];


if ($reviewCount > 44) {
    $status = "Nerd";
} elseif ($reviewCount > 24) {
    $status = "Introvert";
} elseif ($reviewCount > 9) {
    $status = "Gaming enjoyer";
} elseif ($reviewCount > 4) {
    $status = "Gamer";
} elseif ($reviewCount > 1) {
    $status = "Enthusiast";
} else {
    $status = "Random";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BDDIHM Website Project">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/svg+xml">
    <title>TheGoodReviews - User Profile</title>
    <link rel="stylesheet" href="../../assets/css/profil-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="main-body">
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
        <div class="row gutters-sm">
            <div class="col-md-12" style="margin-top: 55px; margin-bottom: 5px;">
                <button type="button" class="btn btn-primary" id="editProfileButton">Edit Profile</button>
            </div>
            <div class="col-md-4 mb-3">
            <div class="card">
            <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?php echo $user['icone']; ?>" id="profileImage" alt="<?php echo $user['full_name']; ?>" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4><?php echo $user['full_name']; ?></h4>
                            <p class="text-secondary mb-1"><?php echo $status;?></p>
                            <div class="d-flex justify-content-between align-items-center">
                            <form method="post" action="profil.php">
                                <button type="submit" name="deletePhoto" class="btn btn-danger mr-2" id="deletePhotoButton">Delete Photo</button>
                            </form>
                            <input type="file" style="position:absolute;left:-99999px;" id="fileInput" name="profileImage" />
                            <button id="changePhotoButton">Change Photo</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                        <a <?php if ($user['X'] !== null){ ?> href="https://X.com/<?php echo $user['X']; ?>" <?php } else { ?> href="https://X.com/" <?php } ?> class='target'>
                            <img src="../../assets/images/socialmedia/logo-black.png" width="24" height="24" class="mr-2 icon-inline text-info">
                            <span class="text-secondary" style="text-decoration: none; color: inherit;">X</span>
                        </a>
                    </h6>
                    <span class="text-secondary" id="XDisplay">
                        <?php if ($user['X'] == null){
                            echo "Not set";
                        } else {
                            echo $user['X'];
                        } ?>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                        <a href="https://discord.com" class='target'>
                            <img src="../../assets/images/socialmedia/discord.png" width="24" height="24" class="mr-2 icon-inline text-info">
                            <span class="text-secondary" style="text-decoration: none; color: inherit;">Discord</span>
                        </a>
                    </h6>
                    <span class="text-secondary" id="DiscordDisplay">
                        <?php if ($user['Discord'] == null){
                            echo "Not set";
                        } else {
                            echo $user['Discord'];
                        } ?>
                    </span>
                </li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Status Hierarchy</h6>
                        <span class="text-secondary">It depends on the Reviews posted</span>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0">Nerd</h6>
                        <span class="text-secondary">44+ Reviews - Edge Master </span>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0">Introvert</h6>
                        <span class="text-secondary">24+ Reviews - Silent Sage </span>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0">Gaming Enjoyer</h6>
                        <span class="text-secondary">9+ Reviews - Joystick Junkie </span>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0">Gamer</h6>
                        <span class="text-secondary">4+ Reviews - Pixel Prodigy </span>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0">Enthusiast</h6>
                        <span class="text-secondary">1+ Review - Curious Critic </span>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0">Random</h6>
                        <span class="text-secondary">No Reviews - Mystery Maven</span>
                    </li>
                </ul>
            </div>
            </div>
            <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                <form id="profileForm" method="post" enctype="multipart/form-data" action="profil.php">
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <span id="fullNameDisplay"><?php echo $user['full_name']; ?></span>
                        <input type="text" class="form-control" id="newFullName" name="name" style="display: none;" value="<?php echo $user['full_name']; ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $user['email']; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <span id="passwordDisplay"><?php echo str_repeat("*", strlen($user['password'])); ?></span>
                            <input type="password" class="form-control" id="newPassword" name="password" style="display: none;" value="">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $status; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Member Since</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo formatDaysPassed($user['days_passed']); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Reviews</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $reviewCount; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">X</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <span id="XDisplay"><?php echo $user['X']; ?></span>
                            <input type="text" class="form-control" id="newX" name="X" style="display: none;" value="<?php echo $user['X']; ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Discord</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <span id="DiscordDisplay"><?php echo $user['Discord']; ?></span>
                            <input type="text" class="form-control" id="newDiscord" name="Discord" style="display: none;" value="<?php echo $user['Discord']; ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" id="saveChangesButton" disabled>
                            <button class="btn btn-primary px-4" id="Logout">Logout</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
const editProfileButton = document.getElementById('editProfileButton');
const newFullNameInput = document.getElementById('newFullName');
const newPasswordInput = document.getElementById('newPassword');
const newXInput = document.getElementById('newX');
const newDiscordInput = document.getElementById('newDiscord');
const saveChangesButton = document.getElementById('saveChangesButton');

function toggleEditMode() {
    if (newFullNameInput.style.display !== 'none') {
        newFullNameInput.style.display = 'none';
        document.getElementById('fullNameDisplay').style.display = 'block';
    } else {
        newFullNameInput.style.display = 'block';
        document.getElementById('fullNameDisplay').style.display = 'none';
    }

    if (newPasswordInput.style.display !== 'none') {
        newPasswordInput.style.display = 'none';
        document.getElementById('passwordDisplay').style.display = 'block';
    } else {
        newPasswordInput.style.display = 'block';
        document.getElementById('passwordDisplay').style.display = 'none';
    }

    if (newXInput.style.display !== 'none') {
        newXInput.style.display = 'none';
        document.getElementById('XDisplay').style.display = 'block';
    } else {
        newXInput.style.display = 'block';
        document.getElementById('XDisplay').style.display = 'none';
    }

    if (newDiscordInput.style.display !== 'none') {
        newDiscordInput.style.display = 'none';
        document.getElementById('DiscordDisplay').style.display = 'block';
    } else {
        newDiscordInput.style.display = 'block';
        document.getElementById('DiscordDisplay').style.display = 'none';
    }

    saveChangesButton.disabled = !saveChangesButton.disabled;
}

editProfileButton.addEventListener('click', toggleEditMode);

document.getElementById('profileForm').addEventListener('submit', function(event) {
    if (newFullNameInput.value === '') {
        event.preventDefault();
        alert('Please fill in all fields except password.');
    }
});
fileInput.addEventListener('change', function() {
    const file = fileInput.files[0];
    if (file) {
        console.log("File selected:", file.name)
        const formData = new FormData();
        formData.append('profileImage', file);
        fetch('upload.php', {
            method: 'POST',
            body: formData
        })
       .then(response => response.json())
       .then(data => {
            if (data.success) {
                const imagePath = '../../assets/images/pp/' + data.fileName;
                document.getElementById('profileImage').src = imagePath;
            } else {
                console.error('File upload failed');
            }
        })
       .catch(error => {
            console.error('Error occurred while uploading file:', error);
        });
    }
});


editProfileButton.addEventListener('click', function() {
    if (fullNameDisplay.style.display !== 'none') {
        fullNameDisplay.style.display = 'none';
        newField.style.display = 'block';
        newField.value = fullNameDisplay.innerText;
        newField.focus();
    } else {
        passwordDisplay.style.display = 'none';
        newField.style.display = 'block';
        newField.type = 'password';
        newField.value = '';
        newField.focus();
    }
});
document.getElementById('changePhotoButton').addEventListener('click', function() {
    fileInput.click(); 
});
document.getElementById("Logout").addEventListener("click", function(event) {
    event.preventDefault(); 
    window.location.href = "../login-register/logout.php";
});
</script>

</body>
</html>
