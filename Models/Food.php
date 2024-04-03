<?php
require_once('./Models/Product.php');

class Food extends Product
{
    public function __construct($name, $category, $price, $image)
    {
        parent::__construct($name, $category, $price, $image, 'Cibo');
    }
}
