<?php
session_start(); // Resume session

$_SESSION["loggedIn"] = false;
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

header("Location: index.php"); // Redirect to index page after logout
?>


