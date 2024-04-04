<?php
require_once('./Models/Product.php');
require_once('./Traits/IsEdible.php');
class Food extends Product
{

    use IsEdible;

    /**
     * __construct
     *
     * @param  string $name
     * @param  object $category
     * @param  int $price
     * @param  string $image
     */

    public function __construct($name, $category, $price, $image, $edible)
    {
        parent::__construct($name, $category, $price, $image, 'Cibo');
        $this->edible = $edible;
    }
}
