<?php
    $listeByCentre=getDataUrl("/compta/repartition");

function calculateTotals($data)
{
    $totalCoutDirect = 0;
    $totalAdministration = 0;
    $totalCoutTotal = 0;

    for ($i = 0; $i < count($data['repartition_structure']); $i++) {
        // Ajouter les coûts directs
        $totalCoutDirect += $data['operationnels'][$i]['montant'];

        // Ajouter les coûts d'administration
        $totalAdministration += $data['repartition_structure'][$data['operationnels'][$i]['centre']['label']];

        // Ajouter les coûts totaux
        $totalCoutTotal += $data['repartition'][$i]['montant'];
    }

    return [
        'totalCoutDirect'     => $totalCoutDirect,
        'totalAdministration' => $totalAdministration,
        'totalCoutTotal'      => $totalCoutTotal,
    ];
}

$simuleNombre = isset($_POST['simule_nombre']) ? $_POST['simule_nombre'] : 0;
function calculatePrixUnitaire($coutTotal, $simuleNombre) {
    return $simuleNombre > 0 ? $coutTotal / $simuleNombre : 0;
}

// Appel de la fonction et récupération des totaux
$totals = calculateTotals($listeByCentre);
?>
<main>
    <div class="container mt-5 ">
        <div class="card">
            <!-- <div class="card-header">
                <h4></h4>
            </div> -->
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th><h4>Repartition Administrative</h4></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th class="col">Repartition</th>
                        <th class="col">Cout direct</th>
                        <th class="col">Cle</th>
                        <th class="col">Administration</th>
                        <th class="col">Cout Total</th>
                    </tr>
             <?php for ($i=0; $i <count($listeByCentre['repartition_structure']) ; $i++) { ?>
             <tr>
                 <td><?php echo $listeByCentre['operationnels'][$i]['centre']['label'] ?></td>
                 <td><?php echo number_format($listeByCentre['operationnels'][$i]['montant'],2).'AR'  ?></td>
                 <td><?php echo number_format($listeByCentre['pourcent'][$listeByCentre['operationnels'][$i]['centre']['label']], 2)?>%</td>
                 <td><?php echo number_format($listeByCentre['repartition_structure'][$listeByCentre['operationnels'][$i]['centre']['label']], 2).'AR' ?></td>
                 <td><?php echo number_format ($listeByCentre['repartition'][$i]['montant'],2).'AR' ?></td>
                </tr>
                <?php } ?>
                 <tr>
                        <th>Total</th>
                        <th><?php echo number_format($totals['totalCoutDirect'], 2) . ' AR' ?></th>
                    <th></th>
                    <th><?php echo number_format($totals['totalAdministration'], 2) . ' AR' ?></th>
                    <th><?php echo number_format($totals['totalCoutTotal'], 2) . ' AR' ?></th>
                </tr>
                    
                  
                </table>
            </div>
        </div>
       
        <div class="row mt-5 mb-5">
            <div class="col-6">
                <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>COUT DU CAHIER (A4, 80 pages, 0.50g)</th>
                        <th class="text-end">
                            <!-- Bouton pour ouvrir le modal -->
                            <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <b>Simuler</b>
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <td>Unité d'oeuvre</td>
                        <td class="text-end">Nombre de cahiers crees</td>
                    </tr>
                    <tr>
                        <td>Nombre de centres</td>
                        <td class="text-end"><?php echo count($listeByCentre['operationnels']); ?></td>
                            </tr>
                        </table>
                
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Simulation du Prix Unitaire</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="">
                        <div class="modal-body">
                            <input type="number" class="form-control" name="simule_nombre" placeholder="Nombre de produits entrants" value="<?php echo $simuleNombre; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                
                        <!-- Affichage des centres et simulation du coût -->
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Centre</th>
                                    <th>Cout direct (par kg)</th>
                                    <!-- <th>Coût simulé</th> -->
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php foreach ($listeByCentre['operationnels'] as $index => $centre) { ?>
                                    <tr>
                                        <td><?php echo $centre['centre']['label']; ?></td>
                                        <td class="text-end"><?php echo number_format($centre['montant'], 2) . ' AR'; ?></td>
                                        <!-- <td class="text-end" id="simuleCout-<?php echo $index; ?>">0 AR</td> -->
                                    </tr>
                                <?php } ?>
                                 <tr>
                                <td>Prix unitaire simulé</td>
                                <td class="text-end">
                                    <?php echo number_format(calculatePrixUnitaire($totals['totalCoutTotal'], $simuleNombre), 2) . ' AR'; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                
                <script>
                    // Fonction pour mettre à jour les coûts simulés
                    document.getElementById('validerSimulation').addEventListener('click', function () {
                        // Récupérer la valeur entrée par l'utilisateur
                        var nombreProduit = document.getElementById('simule_nombre').value;

                        // Récupérer toutes les lignes du tableau des centres
                        var centres = <?php echo json_encode($listeByCentre['operationnels']); ?>;

                        centres.forEach(function (centre, index) {
                            // Calculer le coût simulé pour chaque centre
                            var coutSimule = nombreProduit * centre['montant'];

                            // Afficher le coût simulé dans le tableau
                            document.getElementById('simuleCout-' + index).innerHTML = coutSimule.toFixed(2) + ' AR';
                        });

                        // Fermer le modal après validation
                        var modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
                        modal.hide();
                    });
                </script>
            <!-- <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>COUT EN DEVISE</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>Euro</td>
                                <td class="text-end">0.91</td>
                            </tr>
                            <tr>
                                <td>Dollar</td>
                                <td class="text-end">0.61</td>
                            </tr>
                        </table>
                    </div>
                </div>
               
            </div> -->
            
        </div>
    </div>
</main>