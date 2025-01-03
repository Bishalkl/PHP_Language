<?php

class Car {
    // Properties / Fields
    private $brand;
    private $color;
    public  $vehicleType = "car";

    // Constructor
    public function __construct($brand, $color="none")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Getter and Setter methods

    // get method
    public function getBrand() {
        return $this->brand;
    }

    public function getColor() {
        return $this->color;
    }

    // Set method
    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function setColor($color) {

        $allowedColors = [
            "red",
            "blue",
            "white",
            "black",
        ];
        
        if(in_array($color, $allowedColors)) {
            $this->color = $color;
        }
    }

    // Method
    public function getCarInfo() {
        return "Brand: " . $this->brand . ", Color: ". $this->color;
    }

};

