<?php
class Client {
    public int $id;
    public string $nom;
    public string $prenom;
    public string $email;
    public $vehicules = [];

    public function __construct(int $id, string $nom, string $prenom, string $email)
    {
      $this->id = $id;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
    }

    public function afficherVehicules(): void 
    {
        // if(!empty($this->vehicules))
        if (count($this->vehicules) > 0) {
            foreach($this->vehicules as $vehicule) {
                echo "<p>";
                echo htmlspecialchars($vehicule->marque) . ' ';
                echo htmlspecialchars($vehicule->modele) . ' ';
                echo htmlspecialchars($vehicule->immatriculation);
                echo "</p>";
            }
        } else {
            echo "<p> Le client ne possède aucun véhicule.</p>";
        }
    }
}