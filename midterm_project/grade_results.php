<?php
    //pull variables from the post array
    $grade1 = filter_input(INPUT_POST, 'grade1', FILTER_VALIDATE_INT);
    $grade1_points_possible = filter_input(INPUT_POST, 'grade1_points_possible', FILTER_VALIDATE_INT);
    $grade2 = filter_input(INPUT_POST, 'grade2', FILTER_VALIDATE_INT);
    $grade2_points_possible = filter_input(INPUT_POST, 'grade2_points_possible', FILTER_VALIDATE_INT);
    $grade3 = filter_input(INPUT_POST, 'grade3', FILTER_VALIDATE_INT);
    $grade3_points_possible = filter_input(INPUT_POST, 'grade3_points_possible', FILTER_VALIDATE_INT);
    $grade4 = filter_input(INPUT_POST, 'grade4', FILTER_VALIDATE_INT);
    $grade4_points_possible = filter_input(INPUT_POST, 'grade4_points_possible', FILTER_VALIDATE_INT);
    $grade5 = filter_input(INPUT_POST, 'grade5', FILTER_VALIDATE_INT);
    $grade5_points_possible = filter_input(INPUT_POST, 'grade5_points_possible', FILTER_VALIDATE_INT);
    $grade6 = filter_input(INPUT_POST, 'grade6', FILTER_VALIDATE_INT);
    $grade6_points_possible = filter_input(INPUT_POST, 'grade6_points_possible', FILTER_VALIDATE_INT);

    //Calculate each grade
    $grade1_result = 100 * ($grade1 / $grade1_points_possible);
    $grade2_result = 100 * ($grade2 / $grade2_points_possible);
    $grade3_result = 100 * ($grade3 / $grade3_points_possible);
    $grade4_result = 100 * ($grade4 / $grade4_points_possible);
    $grade5_result = 100 * ($grade5 / $grade5_points_possible);
    $grade6_result = 100 * ($grade6 / $grade6_points_possible);

    //Calculate total grade
    $grade_sum = $grade1 + $grade2 + $grade3 + $grade4 + $grade5 + $grade6;
    $possible_grade_sum = $grade1_points_possible + $grade2_points_possible + $grade3_points_possible + $grade4_points_possible + $grade5_points_possible + $grade6_points_possible;

    $total_grade = 100 * ($grade_sum / $possible_grade_sum);
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
        <h1>Grade Results:</h1>

        <label>Grade 1 Earned:</label>
        <span><?php echo $grade1 ?></span><br>
        <label>Grade 1 Highest Possible Score:</label>
        <span><?php echo $grade1_points_possible ?></span><br>
        <label>Grade 1 Results:</label>
        <span><?php echo $grade1_result ?>%</span><br><br>

        <label>Grade 2 Earned:</label>
        <span><?php echo $grade2 ?></span><br>
        <label>Grade 2 Highest Possible Score:</label>
        <span><?php echo $grade2_points_possible ?></span><br>
        <label>Grade 2 Results:</label>
        <span><?php echo $grade2_result ?>%</span><br><br>

        <label>Grade 3 Earned:</label>
        <span><?php echo $grade3 ?></span><br>
        <label>Grade 3 Highest Possible Score:</label>
        <span><?php echo $grade3_points_possible ?></span><br>
        <label>Grade 3 Results:</label>
        <span><?php echo $grade3_result ?>%</span><br><br>

        <label>Grade 4 Earned:</label>
        <span><?php echo $grade4 ?></span><br>
        <label>Grade 4 Highest Possible Score:</label>
        <span><?php echo $grade4_points_possible ?></span><br>
        <label>Grade 4 Results:</label>
        <span><?php echo $grade4_result ?>%</span><br><br>

        <label>Grade 5 Earned:</label>
        <span><?php echo $grade5 ?></span><br>
        <label>Grade 5 Highest Possible Score:</label>
        <span><?php echo $grade5_points_possible ?></span><br>
        <label>Grade 5 Results:</label>
        <span><?php echo $grade5_result ?>%</span><br><br>

        <label>Grade 6 Earned:</label>
        <span><?php echo $grade6 ?></span><br>
        <label>Grade 6 Highest Possible Score:</label>
        <span><?php echo $grade6_points_possible ?></span><br>
        <label>Grade 6 Results:</label>
        <span><?php echo $grade6_result ?>%</span><br><br>

        <label><strong>Total Points Earned:</strong></label>
        <span><?php echo $grade_sum ?></span><br>

        <label><strong>Total Possible Points:</strong></label>
        <span><?php echo $possible_grade_sum ?></span><br>

        <label><strong>Total Grade:</strong></label>
        <span><?php echo $total_grade ?>%</span><br>
    </main>
</body>
</html>