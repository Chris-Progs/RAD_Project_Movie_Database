<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
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
            <?php require "connect.php";

            try {
                $email = $_POST["email"];
                $sql = "SELECT * FROM registrations WHERE email = :email;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $emailExists = $stmt->fetch();

                if ($emailExists) {
                    echo "<p>That email has already been registered</p>";
                } else {
                    $sql = "INSERT INTO registrations (email) VALUES (:email);";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    echo "<p>You have been registered for email updates.</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Your email could not be registered.</p>";
            }

            $conn = null;

            ?>
        </div>
    </body>
</html>