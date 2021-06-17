<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8" />
        <title>Movie Rental</title>
        <link rel="stylesheet" href="movies.css">
    </head>

    <body>
        <div id="top">
            <h1>Movie Rental</h1>
        </div>
        
        <div id="searchBar">
            <ul id="ul">
                <li><a href="search.php">Search Movie</a></li>
                <li><a href="top_movies.php">Top 10</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>

        <div id="content">
            <?php require "connect.php";?>

		
        <div>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</div>    
        </div>
    </body>
</html>