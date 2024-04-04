<?php
trait IsEdible
{
    public $edible;

    public function getEdibility()
    {
        return "Commestibile: " . $this->edible;
    }
}
