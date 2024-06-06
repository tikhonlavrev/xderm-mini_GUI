<?php
function ceklogin(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if it's not already started
    }

    // Check if the user is logged in and the session has not expired
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 1 || 
        (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 9500))) {
        
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
        header("Location: login.php"); // Redirect to login page
        exit(); // Exit to ensure no further code is executed
    }

    $_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time stamp
}
