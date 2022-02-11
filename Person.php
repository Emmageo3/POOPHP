
<?php

    //creer une classe personne  
    class Person
    {
        var $firstName;
        var $lastName;
        var $age;

        public function __construct($firstName, $lastName, $age){
            $this->firstname = $firstName;
            $this->lastname = $lastName;
            $this->age = $age;
        }

        public function fullName(){
            echo $this->firstname . ' ' . $this->lastname;
        }
    }

    //instancier la classe 
    $emma = new Person('Emma', 'Kanfany', 21);
    $seyna = new Person('Seynabou', 'Dione', 22);
    $seyna->fullName();


?>