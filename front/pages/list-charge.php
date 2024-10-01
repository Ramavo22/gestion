<?php 
    $charges = getDataUrl("/charge/list2");
    $listeByCentre = getDataUrl("/charge/listByCentreForYear");
    $totalMontant = getDataUrl("/charge/TotalChargeForYear"); // Total pour la colonne Montant Total

    $i = 1;

    $totauxParCentre = calculerTotalParCentre($charges);

    // Collecter tous les centres dans une liste unique
    $centres = [];
    foreach ($charges as $charge) {
        foreach ($charge['chargeCentres'] as $chargeCentre) {
            if (!in_array($chargeCentre['centre']['label'], $centres)) {
                $centres[] = $chargeCentre['centre']['label'];
            }
        }
    }
?>

<main class="container mt-5">
    <div class="col-12 mb-2 text-center">
            <a href="index.php?page=f-charge" class="btn btn-outline-warning ms-2">Ajouter une charge</a>
        </div>

    <div class="table-responsive"> <!-- Activer le défilement horizontal -->
        <table class="table table-borderless">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Montant Total</th>
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
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $charge['rubrique']['label']; ?></td>
                        <td><?php echo number_format($charge['montantTotalCumule'], 2); ?></td>
                        <td><?php echo $charge['rubrique']['typeCharge']['label']; ?></td>
                        <td><?php echo $charge['rubrique']['nature']['label']; ?></td>
                        <!-- Valeurs par centre -->
                        <?php foreach ($centres as $centre): ?>
                            <td>
                                <?php
                                $montant = '-';
                                foreach ($charge['chargeCentres'] as $chargeCentre) {
                                    if ($chargeCentre['centre']['label'] == $centre) {
                                        $montant = number_format($chargeCentre['montantTotalCumule'], 2);
                                        break;
                                    }
                                }
                                echo $montant;
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
                    <th colspan="2"></th>
                    <!-- Affichage des totaux par centre -->
                    <?php foreach ($centres as $centre): ?>
                        <th>
                            <?php echo isset($totauxParCentre[$centre]) ? number_format($totauxParCentre[$centre], 2) : '-'; ?>
                        </th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</main>
