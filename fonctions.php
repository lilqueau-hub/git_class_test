<?php
function getClients(PDO $pdo): array
{
    $sql = "SELECT * FROM client";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getVehiculesByClient(PDO $pdo, int $clientId): array
{
    $sql = "SELECT vehicule_id, immatriculation, marque, modele
            FROM vehicule
            WHERE client_id = :client_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['client_id' => $clientId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}