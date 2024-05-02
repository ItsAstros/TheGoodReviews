<?php
session_start();
session_destroy();
header("Location: /TheGoodReviews/index.php");
exit; // Ensure the script stops executing after the redirect
?>