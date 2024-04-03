<?php
class Product
{
    public $name;
    public $category;
    public $price;
    public $image;
    public $type;

    public function __construct($name, $category, $price, $image, $type)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->image = $image;
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getType()
    {
        return $this->type;
    }
}
