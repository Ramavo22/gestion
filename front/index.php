<?php
require_once "inc/function.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$header = 'inc/header.php';

switch ($page) {
    case 'home':
        $pageTitle = "Accueil";
        $pageContent = 'pages/home.php';
        break;
    case 'dashboard':
        $pageTitle = "Tableau de bord";
        $pageContent = 'pages/dashboard.php';
        break;
    case 'centres':
        $pageTitle = "Les Centres";
        $pageContent = 'pages/list-centre.php';
        break;
    case 'demande':
        $pageTitle = "Demande";
        $pageContent = 'pages/Demande.php';
        break;
    case 'listdemande':
        $pageTitle = "List de mes Demandes";
        $pageContent = 'pages/list-demande.php';
        break;
    case 'stock':
        $pageTitle = "Etat de stock";
        $pageContent = 'pages/stock.php';
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
    case 'message':
        $pageTitle = "Message board";
        $pageContent = 'pages/message.php';
        break;
    case 'connection':
        $pageTitle = "Connect";
        $pageContent = 'pages/connection.php';
        $header = 'inc/header2.php';
        break;
    default:
        $pageTitle = "Page non trouvée";
        $pageContent = 'pages/404.php';
        break;
}

include $header;

include $pageContent;

?>

</body>

</html>