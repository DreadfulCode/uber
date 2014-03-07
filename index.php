<?php
/*
Description:Quickly Pass properties to Constructor with the Uber Abstract Class, test with PHP 5.2+
Author: Fred Haegele 
Date: March 7th, 2014
*/

abstract class Uber
{
    public $id = null;
    
    
    public function __construct($properties = array())
    {
        foreach (get_class_vars(get_called_class()) as $name => $value) {
            
            if (!array_key_exists($name, $properties)) {
                $properties[$name] = $value;
            }
            $this->$name = $properties[$name];
        }
    }
}


/* Example Usage: Generic Example        */

Class yourClass extends Uber
{
    public $property = null;
    public $second_property = null;
    
}

$output                  = new yourClass();
$output->property        = "This object's property";
$output->second_property = "This object's second property";

print_r($output);

?>
