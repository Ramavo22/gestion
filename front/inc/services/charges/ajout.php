<?php 
    require_once "../../function.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Récupérer les données du formulaire
        $montant_total = isset($_POST['montant_total']) ? floatval($_POST['montant_total']) : null;
        $id_rubrique = isset($_POST['id_rubrique']) ? intval($_POST['id_rubrique']) : null;
        $id_unity = isset($_POST['id_unity']) ? intval($_POST['id_unity']) : null;
        $date = isset($_POST['date']) ? $_POST['date'] : '';

        // Créer un tableau associatif avec les données
        $data = [
            'montant_total' => $montant_total,
            'rubriqueId' => $id_rubrique,
            'unityId' => $id_unity,
            'date' => $date
        ];

        // URL vers laquelle envoyer les données
        $url = charge."/add";

        // Envoyer les données via postDataUrl
        $response = postDataUrl($url, $data);

        // Afficher la réponse pour vérifier l'envoi (débogage)
        echo $response;
    }
?>