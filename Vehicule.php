<?php
class Vehicule {
    public string $marque;
    public string $modele;
    public string $immatriculation;

    public function __construct(string $marque, string $modele, string $immatriculation) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->immatriculation = $immatriculation; 
    }
}