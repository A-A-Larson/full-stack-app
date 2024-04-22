<?php 
    $grade1 = 0;
    $grade1_points_possible = 100;
    $grade2 = 0;
    $grade2_points_possible = 100;
    $grade3 = 0;
    $grade3_points_possible = 100;
    $grade4 = 0;
    $grade4_points_possible = 100;
    $grade5 = 0;
    $grade5_points_possible = 100;
    $grade6 = 0;
    $grade6_points_possible = 100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Grade Tracker</h1>
        <form action="grade_results.php" method="post">
            <label>Grade #1:</label>
            <input type="text" name="grade1">
            <label>Grade #1 Highest Possible Score:</label>
            <input type="text" name="grade1_points_possible"><br><br>
            <label>Grade #2:</label>
            <input type="text" name="grade2">
            <label>Grade #2 Highest Possible Score:</label>
            <input type="text" name="grade2_points_possible"><br><br>
            <label>Grade #3:</label>
            <input type="text" name="grade3">
            <label>Grade #3 Highest Possible Score:</label>
            <input type="text" name="grade3_points_possible"><br><br>
            <label>Grade #4:</label>
            <input type="text" name="grade4">
            <label>Grade #4 Highest Possible Score:</label>
            <input type="text" name="grade4_points_possible"><br><br>
            <label>Grade #5:</label>
            <input type="text" name="grade5">
            <label>Grade #5 Highest Possible Score:</label>
            <input type="text" name="grade5_points_possible"><br><br>
            <label>Grade #6:</label>
            <input type="text" name="grade6">
            <label>Grade #6 Highest Possible Score:</label>
            <input type="text" name="grade6_points_possible"><br><br>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Submit">
            </div>

        </form>
    </main>
</body>
</html>