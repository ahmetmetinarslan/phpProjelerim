<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Age Calculator</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" class="p-4 border rounded bg-light">
                    <div class="form-group">
                        <label for="birthdate">Birthdate:</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Calculate Age</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $birthdate = $_POST['birthdate'];


                    $age = calculateAge($birthdate);

                    echo "<div class='alert alert-success mt-3 text-center'><strong>Your age is:</strong> $age years</div>";
                }

                function calculateAge($birthdate)
                {
                    $birthdate = new DateTime($birthdate);
                    $currentDate = new DateTime();
                    $age = $currentDate->diff($birthdate)->y;
                    return $age;
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</body>

</html>