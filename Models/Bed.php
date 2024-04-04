<?php
require_once('./Models/Product.php');
require_once('./Traits/Details.php');
class Bed extends Product
{

    use Details;
    
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
    
    public function __construct($name, $category, $price, $image, $material, $weight)
    {
        parent::__construct($name, $category, $price, $image, 'Cuccia');
        $this->material = $material;
        $this->weight = $weight;
    }
}
