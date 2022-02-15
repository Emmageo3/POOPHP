<?php

    class Personnage {

        //attributs
        private $id;
        private $degats;
        private $nom;

        //trois constantes de classe renvoyées par la méthode 'frapper'
        //si on se frappe soi meme
        const CEST_MOI = 1;
        //si on a tué le personnage en le frappant
        const PERSONNAGE_TUE = 2;
        //si on a bien frappé le personnage
        const PERSONNAGE_FRAPPE = 3;

        //methode
        public function frapper(Personnage $perso){
            //renvoie la constante de classe CEST_MOI
        }

        //methode
        public function recevoirDegats(){
            //renvoie les constantes de classe PERSONNAGE_TUE et PERSONNAGE_FRAPPE
        }

    }

?>