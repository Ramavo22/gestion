<?php 
    $url = "http://localhost:8080/serveur_serv/Rest_service";

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Erreur cURL : ' . curl_error($ch);
    } else {
        // Convertir la réponse JSON en tableau PHP
        $data = json_decode($response, true);
    
        // Afficher les données reçues
        echo '<h1>Réponse du service web Java</h1>';
        echo '<p>Status : ' . $data['status'] . '</p>';
        echo '<p>Message : ' . $data['message'] . '</p>';
        echo '<p>Données : ' . $data['data'] . '</p>';
    }


    curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="function.php" method="post">
        <input type="text" name="name" id="">
        <input type="text" name="age" id="">
        <input type="submit" value="envoyer">
    </form>
</body>
</html>