<?php


    //creer une classe
   class Personnage{
       public $force = 100;
       private $degat;
       private $exp = 1;
       public $vie = 80;

       public $nom;

       public function __construct($nom){
           $this->nom = $nom;
       }

       public function regenerer(){
           $this->vie = 100;
       }
   }

   //creer un objet
   $emma = new Personnage("Emma");
   $ramata = new Personnage("Ramata");

   $emma->regenerer();

   echo 'vie de '. $emma->nom.' est '. $emma->vie;
   echo 'vie de '. $ramata->nom.' est '. $ramata->vie;

?>