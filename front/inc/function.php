<?php 
    require_once "constant.php";

    function getDataUrl($url, $data = []) {


        // Si le tableau $data n'est pas vide, on ajoute les paramètres à l'URL
        if (!empty($data)) {
            // Convertir le tableau associatif en chaîne de requête
            $queryString = http_build_query($data);

            // Ajouter la chaîne de requête à l'URL
            $url .= (strpos($url, '?') === false ? '?' : '&') . $queryString;
        }

        $url = JAVA_URL.$url;

        // Initialiser cURL
        $ch = curl_init();

        // Configurer l'URL de la requête
        curl_setopt($ch, CURLOPT_URL, $url);

        // Retourner le résultat au lieu de l'afficher directement
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

         // Vérifier si cURL a rencontré des erreurs
        if(curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            curl_close($ch);
            return null;
        }

        $data = json_decode($resp,true);
        //var_dump($data);

         // Vérifier si json_decode() a échoué
        if ($data === null) {
            // Obtenir l'erreur liée à json_decode
            $jsonError = json_last_error();
            $jsonErrorMsg = json_last_error_msg();

            // Afficher l'erreur pour le débogage
            echo "Erreur lors du décodage JSON : $jsonErrorMsg (code $jsonError)\n";

            // Retourner la réponse brute pour diagnostic
            return $resp;
        }

        // Fermer la session cURL
        curl_close($ch);

        return $data;

    }


    function postDataUrl($url, $data){
        $url = JAVA_URL.$url;

        // Initialiser cURL
        $ch = curl_init();
        // Définir l'URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Spécifier que c'est une requête POST
        curl_setopt($ch, CURLOPT_POST, true);

        // Attacher les données POST (encoder les données)
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // Retourner la réponse plutôt que de l'afficher
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Exécuter la requête et stocker la réponse
        $response = curl_exec($ch);

         // Vérifier si cURL a rencontré des erreurs
        if(curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            curl_close($ch);
            return null;
        }

        // Fermer la session cURL
        curl_close($ch);

        return $response;
    }

    // Fonction pour envoyer les données avec cURL
function postJsonDataUrl($url, $data) {
    $url = JAVA_URL . $url;

    // Encoder les données en JSON
    $jsonData = json_encode($data);

    // Initialiser cURL
    $ch = curl_init();

    // Définir l'URL
    curl_setopt($ch, CURLOPT_URL, $url);

    // Spécifier que c'est une requête POST
    curl_setopt($ch, CURLOPT_POST, true);

    // Spécifier le type de contenu JSON et attacher les données
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    // Retourner la réponse plutôt que de l'afficher
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Exécuter la requête et stocker la réponse
    $response = curl_exec($ch);

    // Vérifier si cURL a rencontré des erreurs
    if (curl_errno($ch)) {
        echo 'Erreur cURL: ' . curl_error($ch);
        curl_close($ch);
        return null;
    }

    // Fermer la session cURL
    curl_close($ch);

    return $response;
}

    function redirection($page, $data) {
        $url = PHP_URL . "?page=" . $page;
    

        $donnee = [ 'donne' => $data, 'filter' => "nice"];
        // Initialiser cURL pour envoyer les données
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($donnee));
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Rediriger ensuite l'utilisateur
        header("Location: " . $url);
        exit();
    }
    
    

?>