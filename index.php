<?php

$result = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num1 = (float) $_POST["num1"];
    $num2 = (float) $_POST["num2"];
    $operation = $_POST["operation"];

    switch ($operation) {
        case "+":
            $result = $num1 + $num2;
            break;

        case "-":
            $result = $num1 - $num2;
            break;

        case "*":
            $result = $num1 * $num2;
            break;

        case "/":
            if ($num2 == 0) {
                $result = "Ошибка: деление на ноль";
            } else {
                $result = $num1 / $num2;
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .calculator {
            width: 320px;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, select, button {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            background: black;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #333;
        }

        .result {
            margin-top: 15px;
            padding: 12px;
            background: #f2f2f2;
            border-radius: 8px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="calculator">

    <h1>Arsen</h1>

    <form method="POST">

        <input
            type="number"
            step="any"
            name="num1"
            placeholder="Первое число"
            required
        >

        <select name="operation">
            <option value="+">Сложение (+)</option>
            <option value="-">Вычитание (-)</option>
            <option value="*">Умножение (×)</option>
            <option value="/">Деление (÷)</option>
        </select>

        <input
            type="number"
            step="any"
            name="num2"
            placeholder="Второе число"
            required
        >

        <button type="submit">Посчитать</button>

    </form>

    <?php if ($result !== ""): ?>
        <div class="result">
            <?= htmlspecialchars((string)$result) ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
