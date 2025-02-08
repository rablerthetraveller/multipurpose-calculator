<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>Multipurpose Calculator</h1>
        <form method="post" action="">
            <input type="number" name="num1" step="any" required placeholder="Enter first number">
            <input type="number" name="num2" step="any" placeholder="Enter second number">
            <select name="operation" required>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (×)</option>
                <option value="divide">Division (÷)</option>
                <option value="power">Exponentiation (^)</option>
                <option value="percentage">Percentage (%)</option>
                <option value="sqrt">Square Root (√)</option>
                <option value="log">Logarithm (log)</option>
            </select>
            <button type="submit" name="calculate">Calculate</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'] ?? null; // Optional for some operations
            $operation = $_POST['operation'];
            $result = '';

            // Validate inputs
            if (!is_numeric($num1) || ($operation != 'sqrt' && $operation != 'log' && !is_numeric($num2))) {
                $result = "Invalid input!";
            } else {
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'divide':
                        $result = ($num2 != 0) ? $num1 / $num2 : "Undefined (Division by zero)";
                        break;
                    case 'power':
                        $result = pow($num1, $num2);
                        break;
                    case 'percentage':
                        $result = ($num1 / 100) * $num2;
                        break;
                    case 'sqrt':
                        $result = ($num1 >= 0) ? sqrt($num1) : "Invalid (Negative number)";
                        break;
                    case 'log':
                        $result = ($num1 > 0) ? log($num1) : "Invalid (Log of non-positive)";
                        break;
                    default:
                        $result = "Invalid operation!";
                }
            }
            echo "<div class='result'>Result: $result</div>";
        }
        ?>
    </div>
</body>
</html>