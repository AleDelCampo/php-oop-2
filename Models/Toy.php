<?php
require_once('./Models/Product.php');
require_once('./Traits/Details.php');
require_once('./Traits/IsEdible.php');
class Toy extends Product
{

    use Details;
    use IsEdible;

    /**
     * __construct
     *
     * @param  string $name
     * @param  object $category
     * @param  int $price
     * @param  string $image
     * @param  string $material
     * @param  string $weight
     */
    
    public function __construct($name, $category, $price, $image, $material, $weight, $edible)
    {
        parent::__construct($name, $category, $price, $image, 'Giochino');
        $this->material = $material;
        $this->weight = $weight;
        $this->edible = $edible;
    }
}
