<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <img src="./captcha.php" alt="" srcset=""> <br> <br>
        <label for="chaptcha">
            <span>captcha kodunu giriniz:</span><br><br>
            <input type="text" name="captcha" id="captcha"> <br><br>
            <input type="submit" value="Gönder"> <br><br>
        </label>
    </form>
    <?php
    if ($_POST) {
        $captcha = $_POST["captcha"];
        if (!$captcha) {
            echo '<span style="color: red;">captcha kodu boş bırakılamaz</span>';
        } else {
            if ($captcha == $_SESSION["captcha"]) {
                echo '<span style="color: green;">captcha doğru</span>';
            } else {
                echo '<span style="color: red;">captcha yanlış</span>';
            }
        }
    }
    ?>
</body>

</html>