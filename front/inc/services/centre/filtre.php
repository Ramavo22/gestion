<?php
    require_once "../../function.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $url = centre."/filter";

        // Récupérer les données du formulaire
        $libelle = isset($_GET['libelle']) ? trim($_GET['libelle']) : '';
        $type_centre = isset($_GET['type_centre']) ? trim($_GET['type_centre']) : '';

        // Vérifier si le formulaire a été complété
        $data = [];

        if(!empty($libelle)){
            $data['label'] = $libelle;
        }
        if(!empty($type_centre)){
            $data['typeCentreId'] = $type_centre;
        }
        
        $resp = getDataUrl($url,$data);

        
        
        redirection("centres",$data);

    }
?>