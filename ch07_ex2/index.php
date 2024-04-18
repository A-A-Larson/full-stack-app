<?php 
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = '10000'; } 
    if (!isset($interest_rate)) { $interest_rate = '5'; } 
    if (!isset($years)) { $years = '5'; } 
    $total = 0;
    $count = 10000;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" href="main.css"/>
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>

            <select name="investment">
                <?php while ($investment <= 50000) { ?>
                    <option value="<?php echo $investment; ?>"><?php echo $investment; ?></option>
                <?php $investment += 5000  ?>
                <?php } ?>
            </select><br>
        
            <!-- <input type="text" name="investment"
                   value=""/> -->

            
            <label>Yearly Interest Rate:</label>


            <select name="interest_rate">
                <?php while ($interest_rate <= 12) { ?>
                    <option value="<?php echo $interest_rate; ?>"><?php echo $interest_rate; ?></option>
                <?php $interest_rate += .5 ?>
                <?php } ?>
            </select><br>
        

            <!-- <input type="text" name="interest_rate"
                   value=""/> -->

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
</body>
</html>