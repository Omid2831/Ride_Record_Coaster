<?php

$name = "Omid";
$age = 25;
 echo "My name is $name and I am $age years old.";

 class Persoon 
 {
     public $voornaam;
     public $achternaam;

     public function __construct($voornaam = 'Remco', $achternaam = 'de Vries')
     {
         $this->voornaam = $voornaam;
         $this->achternaam = $achternaam;
     }
     public function outputname(){
        echo "My name is $this->voornaam $this->achternaam";
     }
 }

 $persoon1 = new Persoon();
 $persoon1->voornaam = "Bert";
 $persoon1->achternaam = "de Vries";

 // var_dump($persoon1);

 echo "Mijn naam is: " . $persoon1->voornaam . " " . $persoon1->achternaam . "<br>";

 $persoon2 = new Persoon('Harry', 'van Meteren');
 echo "Mijn naam is: " . $persoon2->voornaam . " " . $persoon2->achternaam . "<br>";

 $person3 = new Persoon();
 $person3->outputname();


?>