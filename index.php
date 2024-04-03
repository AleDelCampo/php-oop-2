<?php
session_start();

if (isset($_POST['registered_user']) && isset($_POST['username']) && isset($_POST['email'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['registered_user_discount'] = 20;
}

else {
    unset($_SESSION['registered_user_discount']);
}

$registered_user_discount = isset($_SESSION['registered_user_discount']) ? $_SESSION['registered_user_discount'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-AnimalShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include "./Layout/navbar.php" ?>

    <div class="container">

        <div class="row">
            <?php
            require('./Models/Category.php');
            require('./Models/Toys.php');
            require('./Models/Food.php');
            require('./Models/Bed.php');

            $toys1 = new Toys('Pallina Futuristica', $cani, 4, 'https://www.eurocali.com/42988-large_default/intergross-doggies-ball-palla-sonora-per-cani.jpg');
            $toys2 = new Toys('Topo-Laser', $gatti, 12, 'https://alimentianimalionline.it/2699-large_default/gioco-puntatore-laser-per-gatto-camon.jpg');
            $catbed = new Bed('Cuccia', $cani, 20, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcT9VcZ7C66TzBRbw8PEvFNTJrAOUsoj1EqvWHD6OC7ZD4UAvqWws2XH06q2ShB3iNwfqnzP4WHBTtaEZ9ofR3CtWjZc6UIwX6W3gV7iaX8h&usqp=CAc');
            $dogbed = new Bed('Cuccia', $gatti, 24, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQ3-mJ39mTuSPdzFRBnhJV8-FbVQyJ-MJYhrVsV6dGIF0o0Wc4u002pELIPXFNW4M2Kz76H2y_bvItMHhDGun6flQcTXIgi4wAt4M7V0KQ&usqp=CAc');
            $food1 = new Food('Croccantini', $cani, 6, 'https://www.ideashoppingcenter.it/files/archivio_Files/Foto/44645_2.JPG');
            $food2 = new Food('Crocchette', $gatti, 6, 'https://www.cicalia.com/it/img/imgproducts/17563/l_17563.jpg');
            $food3 = new Food('Scatolette', $cani, 8, 'https://i.ebayimg.com/thumbs/images/g/J04AAOSwksdjWkHL/s-l640.jpg');
            $food4 = new Food('Scatolette', $gatti, 8, 'https://www.robinsonpetshop.it/26542-home_default/naturina-fresh-trancetti-di-tonno-in-salsa-per-gatti.jpg');

            $products = array($toys1, $toys2, $catbed, $dogbed, $food1, $food2, $food3, $food4);

            foreach ($products as $product) {
                echo '<div class="col-md-4 mt-4">';
                echo '<div class="card">';
                echo '<img src="' . $product->getImage() . '" class="card-img-top" alt="' . $product->getName() . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $product->getName() . '</h5>';
                echo '<p class="card-text">Prezzo: $' . $product->getPrice() * (1 - ($registered_user_discount / 100)) . '</p>';
                echo '<p class="card-text">Categoria: ' . $product->getCategory()->getIcon() . ' ' . $product->getCategory()->getName() . '</p>';
                echo '<p class="card-text">Tipo: ' . $product->getType() . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>