<?php 
    
    $datas = getDataUrl(rubrique."/list");
    $i = 1;
    $centres = [];
    foreach ($datas as $data) {
        foreach ($data['rubriqueCentre'] as $rubriqueCentre) {
            if (!in_array($rubriqueCentre['centre']['label'], $centres)) {
                $centres[] = $rubriqueCentre['centre']['label'];
            }
        }
    }
?>

<main class="container mt-5">
    <!-- <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-12">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
        </div>
        <div class="col-md-4">
            <label for="id_type_charge" class="form-label">Type de Charge</label>
            <select id="id_type_charge" class="form-select" name="id_type_charge">
                <option selected value="">Tous les types</option>
                <option value="1">Incorporables</option>
                <option value="2">Non-incorporables</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="id_nature" class="form-label">Nature</label>
            <select id="id_nature" class="form-select" name="id_nature">
                <option selected value="">Toutes les natures</option>
                <option value="1">Fixes</option>
                <option value="2">Variables</option>
            </select>
        </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>

    </form> -->
        <div class="col-12 mb-2 text-center">
            <a href="index.php?page=f-rubrique" class="btn btn-outline-warning ms-2">Ajouter une rubrique</a>
        </div>

    <div class="table-responsive"> <!-- Activer le défilement horizontal -->
        <table class="table table-borderless">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Type de charge</th>
                    <th scope="col">Nature</th>
                    <!-- Colonnes dynamiques pour chaque centre -->
                    <?php foreach($centres as $centre): ?>
                        <th scope="col"><?php echo $centre; ?></th>
                    <?php endforeach; ?>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($datas as $data){ ?>
                <tr>
                    <th scope="row"><?php echo $i; $i++ ?></th>
                    <td><?php echo $data['label']; ?></td>
                    <td><?php echo $data['typeCharge']['label']; ?></td>
                    <td><?php echo $data['nature']['label']; ?></td>
                    <!-- Afficher les pourcentages par centre -->
                    <?php foreach($centres as $centre): ?>
                        <td>
                            <?php 
                                $pourcentage = '';
                                foreach($data['rubriqueCentre'] as $rubriqueCentre) {
                                    if ($rubriqueCentre['centre']['label'] == $centre) {
                                        $pourcentage = $rubriqueCentre['pourcentage'].'%';
                                        break;
                                    }
                                }
                                echo $pourcentage ?: '-';  // Afficher '-' si aucun pourcentage pour ce centre
                            ?>
                        </td>
                    <?php endforeach; ?>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="bi-trash2-fill"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</main>