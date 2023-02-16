<?php
# Open Closed Principle
# => A class should be open for [Extension] & Closed for [Modification]. 
# => (class being extendable without modifying the class itself)
# => This means classes could be extended to change functionality 
# => Rather than being altered into something else.


class BMW
{
    public function getName(){
        return 'BMW';
    }
}

class Mercedes
{
    public function getName(){
        return 'Mercedes';
    }
}

class carStore{
    public function __construct(protected BMW $bmw, protected Mercedes $mercedes)
    {
        echo 'this store has only bmw & mercedes cars';
    }
}
// $m3   = new bmw();
// $benz = new Mercedes();
// $carObject = new carStore($m3, $benz);
// Now if we need to add a new car, it means we should modify carStore Class
// which violates the OCP principle.

# Solution : make carStore extensible.. 
# by making a car interface so carStore will wait for object of something implementing this interface.
# (interface type hinting)
interface CarInterface{
    public function getName();
}

class bmwCar implements CarInterface
{
    public $name; 
    public function getName(){
        return $this->name;   
    }
}

class kiaCar implements CarInterface
{
    public $name; 
    public function getName(){
        return $this->name;   
    }
}
class carStoreClass {
    public function __construct(CarInterface $c_1){
        echo  "We in home have " . $c_1->getName();
    }
}
$b = new bmwCar();
$b->name = 'bmw model car';
$h = new carStoreClass($b);
