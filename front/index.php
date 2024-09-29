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
    case 'charges-centres':
        $pageTitle = "Les Charges par centre";
        $pageContent = 'pages/list-charge-centre.php';
        break;
    case 'natures':
        $pageTitle = "Les Natures (Charges)";
        $pageContent = 'pages/list-nature.php';
        break;
    case 'unites':
        $pageTitle = "Les Unites";
        $pageContent = 'pages/list-unite.php';
        break;
    case 'type-centres':
        $pageTitle = "Les Types de Centres";
        $pageContent = 'pages/list-type-centre.php';
        break;
    case 'type-charges':
        $pageTitle = "Les Types de Charges";
        $pageContent = 'pages/list-type-charge.php';
        break;
    case 'rubrique':
        $pageTitle = "Les rubriques";
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
    case 'f-charges-centres':
        $pageTitle = "Formulaire Charges par centre";
        $pageContent = 'pages/form-charge-centre.php';
        break;
    case 'f-unite':
        $pageTitle = "Formulaire Unite";
        $pageContent = 'pages/form-unite.php';
        break;
    case 'f-nature':
        $pageTitle = "Formulaire Nature (Charges)";
        $pageContent = 'pages/form-nature.php';
        break;
    case 'f-type-centre':
        $pageTitle = "Formulaire Type de Centre";
        $pageContent = 'pages/form-type-centre.php';
        break;
    case 'f-type-charge':
        $pageTitle = "Formulaire Type de Charge";
        $pageContent = 'pages/form-type-charge.php';
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
