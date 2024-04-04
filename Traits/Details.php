<?php
trait Details
{
    public $material;
    public $weight;

    public function getDetails()
    {
        return "Materiale: " . $this->material . "<br>Peso: " . $this->weight;
    }
}
