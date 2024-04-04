<?php
require_once('./Models/Product.php');
require_once('./Traits/Details.php');

class Toy extends Product
{

    use Details;

    public function __construct($name, $category, $price, $image, $material, $weight)
    {
        parent::__construct($name, $category, $price, $image, 'Giochino');
        $this->material = $material;
        $this->weight = $weight;
    }
}
