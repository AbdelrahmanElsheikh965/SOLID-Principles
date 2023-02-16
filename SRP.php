<?php
/*

# Single Responsibility Principle
# => A class should have only 1 responsibility.
# => A class should have only 1 reason to change.

class CAR
{
    protected $model;
    
    public function move(){
        return 'this car can move';
    }

    public function payment($client){
        return 'this car is bought by ' . $client;
    }

}

// this class "CAR" has more than 1 responsibility.
// so we can split it into 2 classes instead.
class justCar
{
    protected $model;
    
    public function move(){
        return 'this car can move';
    }
}

class buyCar{

    public function payment($client){
        return 'this car is bought by ' . $client;
    }

}
/* 
    Now we have two separate classes each of which has its own role
    so when we have hundreds of lines of code class,
    we don't have to edit the whole class but choose a specific class doing certain task to edit.
*/ 