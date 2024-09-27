<?php
// URL de la servlet Java qui recevra la requête
$url = 'http://localhost:8080/serveur_serv/Recepient_donne';

// Les données à envoyer à la servlet (nom et email)
$nom = $_POST["name"];
$age = $_POST["age"];


$data = array('name' => $nom, 'age' => $age);


// Initialiser cURL
$ch = curl_init($url);

// Configurer cURL pour envoyer une requête POST
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Encoder les données pour l'envoi
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Exécuter la requête
$response = curl_exec($ch);

// Vérifier si la requête a réussi
if ($response === false) {
    echo 'Erreur cURL : ' . curl_error($ch);
} else {
    // Afficher la réponse de la servlet (JSON)
    echo 'Réponse de la servlet : ' . $response;
}

// Fermer la session cURL
curl_close($ch);
?>
