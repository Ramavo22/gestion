<?php 
    require_once "../../function.php"; 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Récupérer le libellé
        $libelle = isset($_POST['libelle']) ? trim($_POST['libelle']) : '';
    
        // Récupérer l'ID du type de charge et l'ID de nature
        $id_type_charge = isset($_POST['id_type_charge']) ? intval($_POST['id_type_charge']) : null;
        $id_nature = isset($_POST['id_nature']) ? intval($_POST['id_nature']) : null;
    
        // Récupérer les centres et pourcentages (tableaux)
        $type_centres = isset($_POST['type_centre']) ? $_POST['type_centre'] : [];
        $pourcentages = isset($_POST['pourcentage']) ? $_POST['pourcentage'] : [];
    
        // Vérifier que le nombre d'éléments dans les deux tableaux est identique
        if (count($type_centres) !== count($pourcentages)) {
            // redirection
        }
    
         // Créer les données à envoyer
         $data = [
            'label' => $libelle,
            'typeChargeId' => $id_type_charge,
            'natureId' => $id_nature,
            'centres' => $type_centres,  // Centres envoyés comme un tableau
            'pourcentages' => $pourcentages  // Pourcentages envoyés comme un tableau
        ];


        $url = rubrique."/add";

        echo postJsonDataUrl($url,$data);
    }

?>


