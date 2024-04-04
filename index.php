<?php
session_start();

$cartTotal = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0;

if (isset($_POST['registered_user']) && isset($_POST['username']) && isset($_POST['email'])) {

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['registered_user_discount'] = 20;
} else {

    unset($_SESSION['registered_user_discount']);
}

$registered_user_discount = isset($_SESSION['registered_user_discount']) ? $_SESSION['registered_user_discount'] : 0;

require('./Models/Payment.php');

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
    <div id="cart" class="d-flex">
        <div>
            <h3>Il Tuo Carrello<i class="fa-solid fa-cart-shopping"></i></h3>
            <p>Totale nel carrello: $<span id="cart-total"><?php echo $cartTotal; ?></span></p>
        </div>
        <div class="mx-4"><button class="btn btn-success" id="checkout-button" data-payment-approved="<?php echo $paymentApproved ? 'true' : 'false'; ?>" disabled>Effettua pagamento</button>
            <?php
            if ($error) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php
            }
            ?>
            <div id="payment-status"></div>
        </div>
    </div>
    
    </div>
    <div class="container">

        <div class="row">
            <?php
            require('./Traits/IsEdible.php');
            require('./Traits/Details.php');
            require('./Models/Category.php');
            require('./Models/Toy.php');
            require('./Models/Food.php');
            require('./Models/Bed.php');

            $toy1 = new Toy('Pallina Futuristica', $cani, 4, 'https://www.eurocali.com/42988-large_default/intergross-doggies-ball-palla-sonora-per-cani.jpg', 'Plastica', '40g', 'Si');
            $toy2 = new Toy('Topo-Laser', $gatti, 12, 'https://alimentianimalionline.it/2699-large_default/gioco-puntatore-laser-per-gatto-camon.jpg', 'Plastica', '20g', 'No');
            $toy3 = new Toy('Mysterious Egg', $cani, 6, 'https://ae01.alicdn.com/kf/Sa850f84e6e204a9386900339de4b0366l.jpg_640x640Q90.jpg_.webp', 'Plastica', '80g', 'Si');
            $catbed = new Bed('Cuccia Cane', $cani, 20, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcT9VcZ7C66TzBRbw8PEvFNTJrAOUsoj1EqvWHD6OC7ZD4UAvqWws2XH06q2ShB3iNwfqnzP4WHBTtaEZ9ofR3CtWjZc6UIwX6W3gV7iaX8h&usqp=CAc', 'Plastica', '10kg');
            $dogbed = new Bed('Cuccia Gattino', $gatti, 24, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQ3-mJ39mTuSPdzFRBnhJV8-FbVQyJ-MJYhrVsV6dGIF0o0Wc4u002pELIPXFNW4M2Kz76H2y_bvItMHhDGun6flQcTXIgi4wAt4M7V0KQ&usqp=CAc', 'Plastica', '10kg');
            $food1 = new Food('Croccantini', $cani, 6, 'https://www.ideashoppingcenter.it/files/archivio_Files/Foto/44645_2.JPG', 'Si');
            $food2 = new Food('Crocchette', $gatti, 6, 'https://www.cicalia.com/it/img/imgproducts/17563/l_17563.jpg', 'Si');
            $food3 = new Food('Scatolette', $cani, 8, 'https://i.ebayimg.com/thumbs/images/g/J04AAOSwksdjWkHL/s-l640.jpg', 'Si');
            $food4 = new Food('Scatolette', $gatti, 8, 'https://www.robinsonpetshop.it/26542-home_default/naturina-fresh-trancetti-di-tonno-in-salsa-per-gatti.jpg', 'Si');

            $products = array($toy1, $toy2, $toy3, $catbed, $dogbed, $food1, $food2, $food3, $food4);

            foreach ($products as $product) {
                echo '<div class="col-md-4 mt-4">';
                echo '<div class="card">';
                echo '<img src="' . $product->getImage() . '" class="card-img-top" alt="' . $product->getName() . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $product->getName() . '</h5>';
                echo '<p class="card-text product-price">Prezzo: $' . $product->getPrice() * (1 - ($registered_user_discount / 100)) . '</p>';
                echo '<p class="card-text">Categoria: ' . $product->getCategory()->getIcon() . ' ' . $product->getCategory()->getName() . '</p>';
                echo '<p class="card-text">Tipo: ' . $product->getType() . '</p>';
                if ($product instanceof Toy || $product instanceof Bed) {
                    echo '<p class="card-text">' . $product->getDetails() . '</p>';
                }
                echo '<p class="card-text">Tipo: ' . $product->getType() . '</p>';
                if ($product instanceof Toy || $product instanceof Food) {
                    echo '<p class="card-text">' . $product->getEdibility() . '</p>';
                }
                echo '<button class="btn btn-primary add-to-basket" data-name="' . $product->getName() . '" data-price="' . $product->getPrice() . '">Aggiungi al carrello</button>';
                echo '<button class="btn btn-danger remove-to-basket" data-name="' . $product->getName() . '">Rimuovi dal carrello</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addToBasket = document.querySelectorAll('.add-to-basket');
        const removeToBasket = document.querySelectorAll('.remove-to-basket');
        const total = document.getElementById('cart-total');
        const checkoutButton = document.getElementById('checkout-button');

        let cartTotal = <?php echo $cartTotal; ?>;

        addToBasket.forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.card');
                const priceText = card.querySelector('.card-body .product-price').innerText;
                const index = priceText.indexOf('$');
                if (index !== -1) {
                    const priceString = priceText.slice(index + 1);
                    const productPrice = parseFloat(priceString.replace(',', ''));
                    if (!isNaN(productPrice)) {
                        cartTotal += productPrice;
                        updateTotal();
                    } else {
                        inner.text('Prezzo non valido:', priceText);
                    }
                } else {
                    inner.text('Prezzo non valido:', priceText);
                }
            });
        });

        removeToBasket.forEach(button => {
            button.addEventListener('click', function() {
                if (cartTotal === 0) {
                    return;
                }

                const card = this.closest('.card');
                const priceText = card.querySelector('.card-body .product-price').innerText;
                const index = priceText.indexOf('$');
                if (index !== -1) {
                    const priceString = priceText.slice(index + 1);
                    const productPrice = parseFloat(priceString.replace(',', ''));
                    if (!isNaN(productPrice)) {
                        cartTotal -= productPrice;
                        updateTotal();
                    } else {
                        inner.text('Prezzo non valido:', priceText);
                    }
                } else {
                    inner.text('Prezzo non valido:', priceText);
                }
            });
        });

        function updateTotal() {
            total.textContent = cartTotal.toFixed(2);
            if (cartTotal > 0) {
                checkoutButton.removeAttribute('disabled');
            } else {
                checkoutButton.setAttribute('disabled', 'disabled');
            }
        }

        checkoutButton.addEventListener('click', function() {
            const cartTotal = parseFloat(document.getElementById('cart-total').textContent);
            const paymentStatus = document.getElementById('payment-status');

            const currentDate = new Date();
            const expiryDate = new Date("<?php echo $creditCardExpiry; ?>");

            if (currentDate <= expiryDate) {
                paymentStatus.textContent = 'Pagamento di €' + cartTotal.toFixed(2) + ' approvato.';
                paymentStatus.style.color = 'green';
                paymentStatus.style.backgroundColor = 'rgba(0, 128, 0, 0.2)';
                paymentStatus.style.borderRadius = '6px';
            } else {
                paymentStatus.innerHTML = 'Carta di credito scaduta!! <i class="fa-solid fa-triangle-exclamation"></i>';
                paymentStatus.style.color = 'red';
                paymentStatus.style.backgroundColor = 'rgba(255, 0, 0, 0.2)';
                paymentStatus.style.borderRadius = '6px';
            }
        });
    });
</script>

</html>