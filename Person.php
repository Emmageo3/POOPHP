<?php


    //creer une classe
   class Personnage{
       public $force = 100;
       private $degat;

       public function attaquer(){
           echo 'Je vais attaquer';
       }
   }

   //creer un objet
   $emma = new Personnage();

   //affichage
   var_dump($emma->force)

?>