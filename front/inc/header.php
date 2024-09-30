<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/submenu.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.jfif" alt="" width="40" height="40" class="d-inline-block align-text-top rounded-5">
                    Gestion Analytique
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=home">Starter Page</a>
                        </li>
                        <li class="nav-item">
                            <!-- Mbola tsisy io page io fa mbola mila foronona sy configurena redirection any -->
                            <a class="nav-link active" href="index.php?page=dashboard">Dashboard</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="overviewDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Overview</a>
                            <ul class="dropdown-menu" aria-labelledby="overviewDropdown">
                                <li><a class="dropdown-item" href="#">Charges</a></li>
                                <li><a class="dropdown-item" href="#">Coûts par centre</a></li>
                                <li><a class="dropdown-item" href="#">Coûts unitaires</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Tables</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Types</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="index.php?page=type-charges">Charges</a></li>
                                        <li><a class="dropdown-item" href="index.php?page=type-centres">Centre</a></li>
                                    </ul>
                            
                                </li> -->
                                <li><a class="dropdown-item" href="index.php?page=unites">Unites</a></li>
                                <li><a class="dropdown-item" href="index.php?page=centres">Centres</a></li>
                                <li><a class="dropdown-item" href="index.php?page=rubriques">Rubriques</a></li>
                                <li><a class="dropdown-item" href="index.php?page=charges">Charges</a></li>
                                <!-- <li><a class="dropdown-item" href="index.php?page=charges-centres">Charges par Centre</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>