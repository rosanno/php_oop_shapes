<?php
abstract class Shape {
    protected $name;
    abstract public function description();
}

interface IShape {
    public function getArea($length, $width);
    public function getPerimeter($length, $width);
}

class Square extends Shape implements IShape {
    private $length;
    
    public function __construct($length) {
        $this->name = "Square";
        $this->length = $length;
    }
    
    public function description() {
        return "Square has four equal sides.";
    }
    
    public function getArea($length, $width) {
        if ($length != $width) {
            return "invalid";
        }
        return $length * $width;
    }
    
    public function getPerimeter($length, $width) {
        if ($length != $width) {
            return "invalid";
        }
        return 4 * $length;
    }
}

class Rectangle extends Shape implements IShape {
    public function description() {
        return "Rectangle has two equal sides.";
    }
    
    public function getArea($length, $width) {
        return $length * $width;
    }
    
    public function getPerimeter($length, $width) {
        return 2 * ($length + $width);
    }
}

class Triangle extends Shape implements IShape {
    public function description() {
        return "Triangle has three sides.";
    }
    
    public function getArea($length, $width) {
        return ($length * $width) / 2;
    }
    
    public function getPerimeter($length, $width) {
        return $length + $width + func_get_arg(2);
    }
}

class Circle extends Shape implements IShape {
    private $radius;
    
    public function __construct($radius) {
        $this->name = "Circle";
        $this->radius = $radius;
    }
    
    public function description() {
        return "Circle has no sides, only a curve.";
    }
    
    public function getArea($length, $width) {
        return pi() * $this->radius * $this->radius;
    }
    
    public function getPerimeter($length, $width) {
        return 2 * pi() * $this->radius;
    }
}

$shape1 = new Square(4);
echo $shape1->description() . "<br>";
echo $shape1->getArea(4, 4) . "<br>";
echo $shape1->getArea(4, 3) . "<br>";
echo $shape1->getPerimeter(4, 4) . "<br>";
echo $shape1->getPerimeter(4, 3) . "<br>";

$shape2 = new Rectangle();
echo $shape2->description() . "<br>";
echo $shape2->getArea(4, 6) . "<br>";
echo $shape2->getPerimeter(4, 6) . "<br>";

$shape3 = new Triangle();
echo $shape3->description() . "<br>";
echo $shape3->getArea(4, 6) . "<br>";
echo $shape3->getPerimeter(4, 6, 7) . "<br>";

$shape4 = new Circle(5);
echo $shape4->description() . "<br>";
echo $shape4->getArea(0, 0) . "<br>";
echo $shape4->getPerimeter(0, 0) . "<br>";
