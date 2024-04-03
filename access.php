<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 40px;
            background-image: url(https://www.chimicifisici.it/wp-content/uploads/2019/04/animali-da-reddito.jpg);
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover;
        }

        .container {
            max-width: 600px;
        }

        .splash-button:nth-child(3) {
            margin-left: 80px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1 class="mb-4">Benvenuto su My-AnimalShop</h1>
        <form action="index.php" method="post">
            <input type="hidden" name="guest_access" value="true">
            <button type="submit" class="btn btn-primary btn-lg splash-button">Accedi come Ospite</button>
        </form>
        <h4 class="mt-4 mb-4">Oppure, registrati e approfitta del 20% di sconto!!</h4>
        <form action="index.php" method="post" class="d-flex gap-2">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <input type="hidden" name="registered_user" value="true">
            <button type="submit" class="btn btn-success btn splash-button">Accedi</button>
        </form>
    </div>
</body>

</html>