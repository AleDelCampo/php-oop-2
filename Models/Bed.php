<?php
require_once('./Models/Product.php');

class Bed extends Product
{
    public function __construct($name, $category, $price, $image)
    {
        parent::__construct($name, $category, $price, $image, 'Cuccia');
    }
}
