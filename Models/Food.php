<?php
require_once('./Models/Product.php');
require_once('./Traits/IsEdible.php');

class Food extends Product
{
    use IsEdible;

    public $calories;

    /**
     * __construct
     *
     * @param  string $name
     * @param  object $category
     * @param  int $price
     * @param  string $image
     * @param  int $calories
     */
    public function __construct($name, $category, $price, $image, $edible, $calories)
    {
        parent::__construct($name, $category, $price, $image, 'Cibo');
        $this->edible = $edible;
        $this->calories = $calories;
    }

    public function getCalories() {
        return $this->calories;
    }
}