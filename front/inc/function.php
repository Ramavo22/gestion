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

        $data = json_decode($resp,true);

        return $data;

    }


    function postDataUrl($url, $data){
        
    }

?>