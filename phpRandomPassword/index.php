<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Password Generator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Random Password Generator</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" class="p-4 border rounded bg-light">
                    <div class="form-group">
                        <label for="length">Password Length:</label>
                        <input type="number" id="length" name="length" class="form-control" min="8" max="20" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Generate Password</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $length = $_POST['length'];
                    $password = generatePassword($length);

                    echo "<div class='alert alert-success mt-3 text-center'><strong>Generated Password:</strong> $password</div>";
                }

                function generatePassword($length)
                {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>