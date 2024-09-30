<?php
require_once "inc/function.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        $pageTitle = "Accueil";
        $pageContent = 'pages/home.php';
        break;

    // LISTES
    case 'centres':
        $pageTitle = "Les Centres";
        $pageContent = 'pages/list-centre.php';
        break;
    case 'charges':
        $pageTitle = "Les Charges";
        $pageContent = 'pages/list-charge.php';
        break;
    case 'unites':
        $pageTitle = "Les Unites";
        $pageContent = 'pages/list-unite.php';
        break;
    case 'rubriques':
        $pageTitle = "Les Rubriques";
        $pageContent = 'pages/list-rubrique.php';
        break;

    // FORMULAIRES
    case 'f-centre':
        $pageTitle = "Formulaire Centre";
        $pageContent = 'pages/form-centre.php';
        break;
    case 'f-charge':
        $pageTitle = "Formulaire Charge";
        $pageContent = 'pages/form-charge.php';
        break;
    case 'f-rubrique':
        $pageTitle = "Formulaire rubrique";
        $pageContent = 'pages/form-rubrique.php';
        break;
    case 'f-unite':
        $pageTitle = "Formulaire Unite";
        $pageContent = 'pages/form-unite.php';
        break;

    // ELSE
    default:
        $pageTitle = "Page non trouvée";
        $pageContent = 'pages/404.php';
        break;
}

include 'inc/header.php';

include $pageContent;

?>

</body>

</html>
