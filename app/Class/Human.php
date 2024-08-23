<?php

namespace App\Class;

class Human
{ 
    
    
    //properties
   public $color;
   public $name;
   public $age;

    public function __construct()
    {
        
    }
    public function info(){
        return "Name: $this->name, Age: $this->age, Color: $this->color";
    }

    public function setter(){
        $this->color = "blue";
        $this->name="waqas";
        $this->age = 25;
    }
}       
    

    // $human1 = new Human();
    // $human->setter();
    // echo $human->info();