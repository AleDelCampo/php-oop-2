<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-AnimalShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="container">

        <div class="row">
            <?php
            require('./Models/Category.php');   
            require('./Models/Toys.php');
            require('./Models/Food.php');
            require('./Models/Bed.php');

            $toys1 = new Toys('Pallina Futuristica', new Category('Cani'), 4, 'https://www.eurocali.com/42988-large_default/intergross-doggies-ball-palla-sonora-per-cani.jpg');
            $toys2 = new Toys('Topo-Laser', new Category('Gatti'), 12, 'https://alimentianimalionline.it/2699-large_default/gioco-puntatore-laser-per-gatto-camon.jpg');
            $catbed = new Bed('Cuccia', new Category('Cani'), 20, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcT9VcZ7C66TzBRbw8PEvFNTJrAOUsoj1EqvWHD6OC7ZD4UAvqWws2XH06q2ShB3iNwfqnzP4WHBTtaEZ9ofR3CtWjZc6UIwX6W3gV7iaX8h&usqp=CAc');
            $dogbed = new Bed('Cuccia', new Category('Gatti'), 20, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQ3-mJ39mTuSPdzFRBnhJV8-FbVQyJ-MJYhrVsV6dGIF0o0Wc4u002pELIPXFNW4M2Kz76H2y_bvItMHhDGun6flQcTXIgi4wAt4M7V0KQ&usqp=CAc');
            $food1 = new Food('Croccantini', new Category('Cani'), 6, 'https://www.ideashoppingcenter.it/files/archivio_Files/Foto/44645_2.JPG');
            $food2 = new Food('Crocchette', new Category('Gatti'), 6, 'https://www.cicalia.com/it/img/imgproducts/17563/l_17563.jpg');
            $food3 = new Food('Scatolette', new Category('Cani'), 8, 'https://i.ebayimg.com/thumbs/images/g/J04AAOSwksdjWkHL/s-l640.jpg');
            $food4 = new Food('Scatolette', new Category('Gatti'), 8, 'https://www.robinsonpetshop.it/26542-home_default/naturina-fresh-trancetti-di-tonno-in-salsa-per-gatti.jpg');

            $products = array($toys1, $toys2, $catbed, $dogbed, $food1, $food2, $food3, $food4);

            foreach ($products as $product) {
                echo '<div class="col-4 mt-4">';
                echo '<div class="card">';
                echo '<img src="' . $product->getImage() . '" class="card-img-top" alt="' . $product->getName() . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $product->getName() . '</h5>';
                echo '<p class="card-text">Prezzo: €' . $product->getPrice() . '</p>';
                echo '<p class="card-text">Categoria: ' . $product->getCategory()->getName() . '</p>';
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