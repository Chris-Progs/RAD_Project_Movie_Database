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
        <ul>
            <li><a href="search.php">Search Movie</a></li>
            <li><a href="top_movies.php">Top 10</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </div>

    <?php
        require("connect.php");
        try {

            $sql = "SELECT title, avgScore
            FROM movies 
            ORDER BY avgScore DESC
            LIMIT 10;";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //$rank = $stmt->fetchAll(PDO::PDO::FETCH_ASSOC);

            $entry = "";

            foreach ($stmt as $row) {
                $entry .= "['".$row['title']."',".$row['avgScore'].",'".$row['title']."'],";
                // $entry .= "['".$row['title']."',".$row['avgScore']."],";
            }
        } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
        }
        ?>

        <div id="chart_div" style="width: 75%; height: 500px;"></div>

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
        
            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(drawChart);

            function drawChart() {
                // Define the chart to be drawn.
                var data = google.visualization.arrayToDataTable([
                    ['Title', 'Average Score', { role: 'annotation' } ],
                    <?php echo $entry ?>
                ]);

                // var view = new google.visualization.DataView(data);
                // view.setColumns([0, 1,
                //                 { calc: "stringify",
                //                     sourceColumn: 0,
                //                     type: "string",
                //                     role: "annotation" }
                //                 ]);

                var options = {
                    title: 'Top 10 movies by average score',
                    legend: { position: 'none'},
                    vAxis: { textPosition: 'none' }
                }; 

                // Instantiate and draw the chart.
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }

        </script>

</body>
</html>