<?php
require_once 'database.php';
require_once 'Vehicule.php';
require_once 'Client.php';
require_once 'fonctions.php';

// récuperer les données de la bdd


$clients = getClients($pdo);
$listClients = [];

foreach($clients as $dataClient) {
    $client = new Client (
       $dataClient['client_id'], 
       $dataClient['nom'], 
       $dataClient['prenom'], 
       $dataClient['email']
    );

    $vehicules = getVehiculesByClient($pdo, (int) $dataClient['client_id']);

    foreach($vehicules as $dataVehicule) {
        $vehicule = new Vehicule(
            $dataVehicule['marque'],
            $dataVehicule['modele'],
            $dataVehicule['immatriculation']
        );
        $client->vehicules[] = $vehicule;
    }

    $listClients[$dataClient['client_id']] = $client;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des clients</h1>
    <?php foreach($listClients as $client): ?>
        <h2>
            <?=  htmlspecialchars($client->prenom . ' ' . $client->nom) ?>
        </h2>
        <?php $client->afficherVehicules(); ?>
    <?php endforeach; ?>
</body>
</html>
