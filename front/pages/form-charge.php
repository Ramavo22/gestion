<?php 
    $rubriques = getDataUrl(rubrique."/list");
    $unities = getDataUrl(unity."/list");
?>

<main class="container mt-5">
    <h2 class="mb-4 text-center">Charge</h2>

    <form action="<?php echo INDEX_TO_BACK."/charges/ajout.php" ?>" method="post">
        <!-- Montant Total et Rubrique sur la même ligne -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="montant_total" class="form-label">Montant Total</label>
                <input type="number" class="form-control" id="montant_total" name="montant_total" required placeholder="Entrez le montant total" step="0.01">
            </div>
            <div class="col-md-6">
                <label for="id_rubrique" class="form-label">Rubrique</label>
                <select class="form-select" id="id_rubrique" name="id_rubrique" required>
                    <option selected disabled value="">Sélectionner une rubrique</option>
                    <?php foreach($rubriques as $rub) { ?>
                        <option value="<?php echo $rub['id'] ?>"><?php echo $rub['label']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!-- Unité et Date sur la même ligne -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="id_unity" class="form-label">Unité</label>
                <select class="form-select" id="id_unity" name="id_unity" required>
                    <option selected disabled value="">Sélectionner une unité</option>
                    <?php foreach($unities as $unity){ ?>
                        <option value="<?php echo $unity['id'] ?>"><?php echo $unity['label']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
        </div>

        <!-- Bouton de validation -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>