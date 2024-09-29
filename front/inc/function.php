<?php 
    require_once "constant.php";

    function getDataUrl($url) {
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

?>