<?php

class Archer extends Character
{   
    //ATTRIBUTS
    public $arrow = 10;
    //public $activateDoubleArrow = false;

    //METHODES
/*
    public function __construct($name) {
        parent::__construct($name);
    }

*/

    public function turn($target) {
        $rand = rand(1, 2);
        if ($this->arrow == 0) {
            $status = $this->daggerAttack($target);

        } else if($this->arrow >= 2 && $rand = 1) {
            $status = $this->shootDoubleArrows($target);

        } else if($this->arrow >= 1 && $rand = 2) {
            $status = $this-> shootArrow($target);
        }
        return $status;
    }
/*
    public function activateDoubleArrow() {
        $this->activateDoubleArrow = true;
        $status = "$this->name se prepare pour tirer 2 fleches !";
        return $status;
    }

    public function sethealthPoints($damage) {
        if (!$this->activateDoubleArrow) {
            //$target->healthPoints -= round($damage);
        }
        $this->activateDoubleArrow= false;
        return;
    }
*/

    //METHODE TIRER UNE FLECHE
    public function shootArrow($target) {
        $arrowCost = 1;
        if ($arrowCost <= $this->arrow) {
            $damage = $arrowCost * 10;
            $this->arrow -= $arrowCost;  
        } 
        
        else if ($arrowCost > $this->arrow) {
            $damage = $this->arrow;
            $this->arrow = 0;
        }
        $target->setHealthPoints($damage);
        $target->isAlive();
        $status = "$this->name tire une fleche à $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrow fléches à $this->name !";
        return $status;
    }

     //METHODE TIRER DEUX FLECHES
     public function shootDoubleArrows($target) {
        $arrowCost = 2;
        if ($arrowCost <= $this->arrow) {
            $damage = $arrowCost * 10;
            $this->arrow -= $arrowCost;
            
        } else if ($arrowCost > $this->arrow) {
            $damage = $this->arrow;
            $this->arrow = 0;
        }
        $target->setHealthPoints($damage);
        $target->isAlive();
        $status = "$this->name tire deux fleches à $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrow fléches à $this->name !";
        return $status;
    }


    //METHODE attaque dague
    public function daggerAttack($target) {
        $target->setHealthPoints($this->damage);
        $target->isAlive();
        return "$this->name n'a plus de fléches et donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
       
    }

}