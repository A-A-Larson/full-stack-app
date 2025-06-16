<?php
require_once('database.php');

// Get all classes
$query = 'SELECT * FROM class
          ORDER BY class_ID';
$statement = $db->prepare($query);
$statement->execute();
$classes = $statement->fetchAll();
$statement->closeCursor();

// Get all assignments
$queryAssignment = 'SELECT * FROM assignment
                    ORDER BY grade_id';
$statement3 = $db->prepare($queryAssignment);
$statement3->execute();
$assignments = $statement3->fetchAll();
$statement3->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades Table</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
    <header><h1>Grades</h1></header>
    

    <section>
        <!-- display a table of assignments -->
        <?php foreach ($classes as $class) : ?>

        <h2><?php echo $class['course_name']; ?></h2>

        <table>

            <tr>
                <th>Assignment Description</th>
                <th>Points Earned</th>
                <th>Points Possible</th>
            </tr>


            <!-- initiate variables for overall grade -->
            <?php $pointsEarnedTotal = 0 ?>
            <?php $pointsPossibleTotal = 0 ?>

            <!-- foreach assignment in the assignments array do the following -->
            <?php foreach ($assignments as $assignment) : ?>
                
                <!-- if the class id for this assignment matches 
                the class id for this class then do the following -->
                <?php if ($assignment['class_id'] == $class['class_id']): ?>

                    <!-- create variables for each field for overall grade math -->                    
                    <?php $pointsEarned = $assignment['points_earned']; ?>
                    <?php $pointsPossible = $assignment['points_possible']; ?>
                
                    <tr>
                        <td><?php echo $assignment['task_name'] ?></td>
                        <td><?php echo $pointsEarned ?></td>                
                        <td><?php echo $pointsPossible ?></td>                
                    </tr>

                    <!-- add up points from each assignment to get overall grade -->
                    <?php $pointsEarnedTotal = $pointsEarnedTotal + $pointsEarned; ?>
                    <?php $pointsPossibleTotal = $pointsPossibleTotal + $pointsPossible; ?>

                <?php endif; ?>    

            <?php endforeach; ?>

            <!-- Math for overall grade. I found the round function in the php documentation:
            https://www.php.net/manual/en/function.round.php -->
            <?php $overallGrade = round(($pointsEarnedTotal / $pointsPossibleTotal) * 100, 2); ?>

            <tr >
                <th class="overall" >Overall Grade:</th> <td class="overall" ><?php echo $overallGrade ?>%</td>                                       
            </tr>

        </table>
        
        <?php endforeach; ?>      
    </section> 
    </main>
</body>
</html>