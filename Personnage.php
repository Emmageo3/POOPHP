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


        //getters pour lire les valeurs des attributs
        public function degats(){
            return $this->degats;
        }

        public function id(){
            return $this->id;
        }

        public function nom(){
            return $this->nom;
        }


        //setters pour modifier les valeurs des attributs
        public function setDegats($degats){
             $degats = (int) $degats;

             if($degats >= 0 && $degats <= 100){
                 $this->degats = $degats;
             }
        }

        public function setId($id){
            $id = (int) $id;

            if($id > 0){
                $this->id = $id;
            }
        }

        public function setNom($nom){
            if(is_string($nom)){
                $this->nom = $nom;
            }
        }

    }

?>