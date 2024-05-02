<?php
session_start(); // Start the session

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../login-register/database.php'; // Include the database connection file

try {
    // Check if a POST request is received
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception('POST request method required');
    }

    // Check if any files are uploaded
    if (empty($_FILES)) {
        throw new Exception('No files uploaded');
    }

    // Check for errors during file upload
    if ($_FILES["profileImage"]["error"] !== UPLOAD_ERR_OK) {
        // Handle different error cases
        switch ($_FILES["profileImage"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new Exception('Uploaded file exceeds the maximum file size limit');
                break;
            case UPLOAD_ERR_PARTIAL:
                throw new Exception('File upload was only partially completed');
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file was uploaded');
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                throw new Exception('Missing temporary folder for file uploads');
                break;
            case UPLOAD_ERR_CANT_WRITE:
                throw new Exception('Failed to write file to disk');
                break;
            case UPLOAD_ERR_EXTENSION:
                throw new Exception('A PHP extension stopped the file upload');
                break;
            default:
                throw new Exception('Unknown file upload error');
                break;
        }
    }

    // Reject files larger than 1MB
    if ($_FILES["profileImage"]["size"] > 1048576) {
        throw new Exception('Uploaded file exceeds the maximum file size (1MB)');
    }

    // Define the directory to store uploaded files
    $uploadDir = "../../assets/images/pp/";

    // Generate a unique filename to avoid overwriting existing files
    $uniqueFilename = uniqid() . '_' . basename($_FILES["profileImage"]["name"]);

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $uploadDir . $uniqueFilename)) {
        // File upload successful, update the user's profile image path in the database
        if (!isset($_SESSION["user_email"])) {
            throw new Exception('User email not found in session');
        }
        
        // Get the user's email from session
        $userEmail = $_SESSION["user_email"];

        // Update the user's profile image path in the database
        $stmt = $mysqli->prepare("UPDATE users SET icone = ? WHERE email = ?");

        // Store the values in variables
        $iconPath = $uploadDir . $uniqueFilename;

        // Now bind the variables by reference
        $stmt->bind_param("ss", $iconPath, $userEmail);
        $stmt->execute();

        $_SESSION['icone'] = $iconPath;

        $response = [
            'success' => true,
            'message' => 'File uploaded successfully',
            'fileName' => $uniqueFilename
        ];
    } else {
        // Error occurred during file move
        throw new Exception('Failed to move uploaded file to destination directory');
    }
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>