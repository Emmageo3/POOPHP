<?php

    //creer une classe personne  
    class Person
    {
        var $firstName = 'Emma';
        var $lastName = 'Kanfany';
        var $age = '20';

        public function __construct(){
            echo 'Je suis le constructeur';
        }
    }

    //instancier la classe 
    $emma = new Person;

    echo $emma->lastName;


?>