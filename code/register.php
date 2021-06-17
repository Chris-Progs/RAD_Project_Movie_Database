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

            <form class="form" action="register_sql.php" method="post">

                <label>Register your email:</label><br>
                <input type="email" id="email" name="email"><br>

                <input type="submit" value="Register" style="margin-top: 10px;">
            </form>
        </div>
    </body>
</html>