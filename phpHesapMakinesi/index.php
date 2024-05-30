<!DOCTYPE html>
<html>

<head>
    <title>Basit Hesap Makinesi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Basit Hesap Makinesi</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-inline mb-3">
            <input type="text" name="num1" class="form-control mr-2" placeholder="İlk sayı" required>
            <select name="operator" class="form-control mr-2" required>
                <option value="+" selected>+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" name="num2" class="form-control mr-2" placeholder="İkinci sayı" required>
            <button type="submit" class="btn btn-primary">Hesapla</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];

            switch ($operator) {
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
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        echo '<div class="alert alert-danger">Sıfıra bölme hatası!</div>';
                        exit();
                    }
                    break;
                default:
                    echo '<div class="alert alert-danger">Geçersiz operatör!</div>';
                    exit();
            }

            echo '<div class="alert alert-success">Sonuç: ' . $result . '</div>';
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>