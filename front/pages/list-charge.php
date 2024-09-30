<?php 
    $charges = getDataUrl(charge."/list");

    $i = 1;

    $centres = [];
    foreach ($charges as $charge) {
        foreach ($charge['chargeCentre'] as $chargeCentre) {
            if (!in_array($chargeCentre['centre']['label'], $centres)) {
                $centres[] = $chargeCentre['centre']['label'];
            }
        }
    }

$totalMontant = 15000000; // Exemple de total pour la colonne Montant Total
$totauxCentres = [
    'Impression' => 2000000, 
    'Administration' => 3000000, 
    'Assemblage et reliure' => 5000000,
    'Approvisionnement' => 5000000,
];
?>

<main class="container mt-5">
    <!-- <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-12">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
        </div>
        <div class="col-md-6">
            <label for="montant_min" class="form-label">Montant Total Min</label>
            <input type="number" class="form-control" id="montant_min" name="montant_min" placeholder="Montant minimum" step="0.01">
        </div>
        <div class="col-md-6">
            <label for="montant_max" class="form-label">Montant Total Max</label>
            <input type="number" class="form-control" id="montant_max" name="montant_max" placeholder="Montant maximum" step="0.01">
        </div>
        <div class="col-md-4">
            <label for="id_unity" class="form-label">Unité</label>
            <select id="id_unity" class="form-select" name="id_unity">
                <option selected value="">Toutes les unités</option>
                <option value="1">Kg</option>
                <option value="2">Nb</option>
            </select>
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
                <option value="3">None</option>
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Filtrer</button>
    </form> -->
        <div class="col-12 mb-2 text-center">
            <a href="index.php?page=f-charge" class="btn btn-outline-warning ms-2">Ajouter une charge</a>
        </div>

    <div class="table-responsive"> <!-- Défilement horizontal activé -->
        <table class="table table-borderless">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Montant Total</th>
                    <th scope="col">Unité</th>
                    <th scope="col">Type de Charge</th>
                    <th scope="col">Nature</th>
                    <!-- Colonnes dynamiques pour chaque centre -->
                    <?php foreach ($centres as $centre): ?>
                        <th scope="col"><?php echo $centre; ?></th>
                    <?php endforeach; ?>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($charges as $charge) { ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                        $i++ ?></th>
                        <td><?php echo $charge['rubrique']['label']; ?></td>
                        <td><?php echo number_format($charge['montant_total'], 2); ?></td>
                        <td><?php echo $charge['unity']['label']; ?></td>
                        <td><?php echo $charge['rubrique']['typeCharge']['label']; ?></td>
                        <td><?php echo $charge['rubrique']['nature']['label'] ?> </td>
                        <!-- Valeurs par centre -->
                        <?php foreach ($centres as $centre): ?>
                            <td>
                                <?php
                                $montant = '';
                                foreach ($charge['chargeCentre'] as $chargeCentre) {
                                    if ($chargeCentre['centre']['label'] == $centre) {
                                        $montant = number_format($chargeCentre['montant'], 2) . ' (' . $chargeCentre['pourcentage'] . '%)';
                                        break;
                                    }
                                }
                                echo $montant ?: '-';  // Affiche '-' si aucun montant pour ce centre
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
            <tfoot>
                <tr>
                    <th colspan="2" class="text-end">Total :</th>
                    <th><?php echo number_format($totalMontant, 2); ?></th>
                    <th colspan="3"></th>
                    <?php foreach ($centres as $centre): ?>
                        <th>
                            <?php echo isset($totauxCentres[$centre]) ? number_format($totauxCentres[$centre], 2) : '-'; ?>
                        </th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</main>