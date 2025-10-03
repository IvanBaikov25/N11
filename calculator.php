<?php
$result = '';
$number1 = '';
$number2 = '';
$operation = '';

// Проверяем, если форма была отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем значения из формы
    $number1 = isset($_POST['number1']) ? $_POST['number1'] : '';
    $number2 = isset($_POST['number2']) ? $_POST['number2'] : '';
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

    // Выполняем расчет в зависимости от выбранной операции
    if (is_numeric($number1) && is_numeric($number2)) {
        switch ($operation) {
            case '+':
                $result = $number1 + $number2;
                break;
            case '-':
                $result = $number1 - $number2;
                break;
            case '*':
                $result = $number1 * $number2;
                break;
            case '/':
                if ($number2 == 0) {
                    $result = 'Ошибка: деление на ноль';
                } else {
                    $result = $number1 / $number2;
                }
                break;
            default:
                $result = 'Ошибка: неверная операция';
        }
    } else {
        $result = 'Ошибка: введите корректные числа';
    }
} elseif (isset($_GET['number1']) && isset($_GET['number2']) && isset($_GET['operation'])) {
    // Получаем значения из GET-параметров
    $number1 = $_GET['number1'];
    $number2 = $_GET['number2'];
    $operation = $_GET['operation'];

    // Выполняем расчет
    if (is_numeric($number1) && is_numeric($number2)) {
        switch ($operation) {
            case '+':
                $result = $number1 + $number2;
                break;
            case '-':
                $result = $number1 - $number2;
                break;
            case '*':
                $result = $number1 * $number2;
                break;
            case '/':
                if ($number2 == 0) {
                    $result = 'Ошибка: деление на ноль';
                } else {
                    $result = $number1 / $number2;
                }
                break;
            default:
                $result = 'Ошибка: неверная операция';
        }
    } else {
        $result = 'Ошибка: введите корректные числа';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>

<body>
    <h1>Калькулятор</h1>
    <form method="post" action="calculator.php">
        <input type="text" name="number1" value="<?php echo htmlspecialchars($number1); ?>" placeholder="Первое число"
            required>
        <input type="text" name="number2" value="<?php echo htmlspecialchars($number2); ?>" placeholder="Второе число"
            required>
        <select name="operation" required>
            <option value="">Выберите операцию</option>
            <option value="+" <?php echo ($operation == '+') ? 'selected' : ''; ?>>+</option>
            <option value="-" <?php echo ($operation == '-') ? 'selected' : ''; ?>>-</option>
            <option value="*" <?php echo ($operation == '*') ? 'selected' : ''; ?>>*</option>
            <option value="/" <?php echo ($operation == '/') ? 'selected' : ''; ?>>/</option>
        </select>
        <button type="submit">Посчитать</button>
    </form>

    <?php if ($result !== ''): ?>
        <h2>Результат: <?php echo htmlspecialchars($result); ?></h2>
    <?php endif; ?>
</body>

</html>