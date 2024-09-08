<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_number = isset($_POST["first_number"]) ? (float)$_POST["first_number"] : 0;
    $second_number = isset($_POST["second_number"]) ? (float)$_POST["second_number"] : 0;
    $operation = isset($_POST["operation"]) ? $_POST["operation"] : "add";

    if ($operation == "add") {
        $result = $first_number + $second_number;
    } else if ($operation == "subtract") {
        $result = $first_number - $second_number;
    } else if ($operation == "multiply") {
        $result = $first_number * $second_number;
    } else {
        if ($second_number != 0) {
            $result = $first_number / $second_number;       
        } else {
            $result = "Cannot divide by zero";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-sclae=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Calculator</title>
    <link rel="stylesheet" href="assets/styles/calculator.css" />
</head>
<body>
    <header>
        <h1>Calculator</h1>
    </header>

    <div id="calculator">
        <form id="calculator-form" action="calculator.php" method="post">
            <input type="number" name="first_number" id="input-first-number" required />
            <select name="operation" id="calculator-operation">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="second_number" id="input-second-number" required />
            <button type="submit">Calculate</button>
        </form>
    </div>

    <div id="result">
        <?php if (!empty($result)): ?>
            <h2>Result: <?php echo htmlspecialchars($result); ?></h2>
        <?php endif; ?>
    </div>
</body>
</html>