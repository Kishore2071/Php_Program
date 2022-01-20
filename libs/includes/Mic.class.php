<?php

/**
 * Access Specifiers
 * -----------------
 * pubic
 * private
 * protected
 */

class Mic
{
    private $brand;
    public $color;
    public $usb_port;
    public $model;
    private $light;
    public $price;

    public function __construct($brand)
    {
        printf("Constructing object...");
        $this->brand = ucwords($brand);
    }

    public function setLight($light)
    {
        $this->light = $light;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function add($a, $b)
    {
        return $a+$b;
    }

    private function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = ucwords($model);
    }

    public function getModelProxy()
    {
        return $this->getModel();
    }
}
