<?php
class Category {
    public $name;
    public $icon;

    /**
     * __construct
     *
     * @param  string $name
     * @param  string $icon
     */
    public function __construct($name, $icon) {
        $this->name = $name;
        $this->icon = $icon;
    }

    public function getName() {
        return $this->name;
    }

    public function getIcon() {
        return $this->icon;
    }
}

$icon_cane = '<i class="fas fa-dog"></i>';
$icon_gatto = '<i class="fas fa-cat"></i>';

$cani = new Category($icon_cane, 'Cani');
$gatti = new Category($icon_gatto, 'Gatti');
