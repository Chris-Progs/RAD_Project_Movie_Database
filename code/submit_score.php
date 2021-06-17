<?php

require("connect.php");

$score = $_POST["score"];
$movie = $_POST["movie"];

try {

    $sql = "UPDATE movies
            SET numScores = numScores+1
            WHERE title = '$movie';";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE movies
            SET totalScore = totalScore + $score
            WHERE title = '$movie';";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE movies
            SET avgScore = totalScore / numScores
            WHERE title = '$movie';";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);

} catch (PDOException $e) {
    echo "<p>Unable to update score</p>";
}