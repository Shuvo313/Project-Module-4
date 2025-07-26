<?php

abstract class VehicleBase {
    protected $id;
    protected $type;    
    protected $price;
    protected $image;

    public function __construct($id, $type, $price, $image) 
    {
        $this->id = $id;
        $this->type = $type;
        $this->price = $price;
        $this->image = $image;
    }
    abstract public function getDetails();

}
