<?php 
    // Récupérer les données des centres, types de charge et natures
    $typeCharges = getDataUrl(typeCharge."/list");
    $natures = getDataUrl(nature."/list");
    $centres = getDataUrl(centre."/list");
?>

<main class="container mt-5">
    <h2 class="mb-4 text-center">Rubrique</h2>

    <form action="<?php echo INDEX_TO_BACK."/rubriques/ajout.php" ?>" method="post">
        <!-- Champ de libellé -->
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé" required>
        </div>

        <!-- Champ de type de charge -->
        <div class="mb-3">
            <label for="id_type_charge" class="form-label">Type de Charge</label>
            <select class="form-select" id="id_type_charge" name="id_type_charge" required>
                <option selected disabled value="">Sélectionner un type de charge</option>
                <?php foreach($typeCharges as $typeCharge){ ?>
                    <option value="<?php echo $typeCharge['id'] ?>"><?php echo $typeCharge['label'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Champ de nature -->
        <div class="mb-3">
            <label for="id_nature" class="form-label">Nature</label>
            <select class="form-select" id="id_nature" name="id_nature" required>
                <option selected disabled value="">Sélectionner une nature</option>
                <?php foreach($natures as $nature){ ?>
                    <option value="<?php echo $nature['id'] ?>"><?php echo $nature['label'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Section où les champs de type centre et pourcentage seront ajoutés dynamiquement -->
        <div id="centre-container">
            <!-- Champ centre et pourcentage côte à côte (modèle initial) -->
            <div class="row mb-3 centre-row">
                <div class="col-md-5">
                    <label for="typeCentre" class="form-label">Type de Centre</label>
                    <select id="typeCentre" class="form-select" name="type_centre[]">
                        <option selected value="">Tous les centres</option>
                        <?php foreach ($centres as $centre){ ?>
                            <option value="<?php echo $centre['id']?>"><?php echo $centre['label'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="pourcentage" class="form-label">Pourcentage</label>
                    <input type="number" class="form-control" name="pourcentage[]" placeholder="Pourcentage" min="1" max="100">
                </div>
                <!-- Bouton pour supprimer la ligne -->
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-centre-btn">Supprimer</button>
                </div>
            </div>
        </div>

        <!-- Bouton pour ajouter un nouveau centre et pourcentage -->
        <div class="mb-3">
            <button type="button" id="add-centre-btn" class="btn btn-secondary">Ajouter un centre</button>
        </div>

        <!-- Bouton de validation -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>

<!-- Script JavaScript pour ajouter et supprimer dynamiquement des champs -->
<script>
    // Ajouter un nouveau groupe de champs
    document.getElementById('add-centre-btn').addEventListener('click', function() {
        // Sélectionner l'élément qui contient les champs
        var container = document.getElementById('centre-container');

        // Créer une nouvelle div pour les nouveaux champs
        var newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-3', 'centre-row');

        // Ajouter le champ "Type de Centre" et "Pourcentage"
        newRow.innerHTML = `
            <div class="col-md-5">
                <label for="typeCentre" class="form-label">Type de Centre</label>
                <select class="form-select" name="type_centre[]">
                    <option selected value="">Tous les centres</option>
                    <?php foreach ($centres as $centre){ ?>
                        <option value="<?php echo $centre['id']?>"><?php echo $centre['label'] ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-5">
                <label for="pourcentage" class="form-label">Pourcentage</label>
                <input type="number" class="form-control" name="pourcentage[]" placeholder="Pourcentage" min="1" max="100">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-centre-btn">Supprimer</button>
            </div>
        `;

        // Ajouter la nouvelle ligne de champs au conteneur
        container.appendChild(newRow);

        // Attacher l'événement pour supprimer la ligne
        attachRemoveEvent(newRow);
    });

    // Fonction pour attacher l'événement "supprimer" à une ligne
    function attachRemoveEvent(row) {
        row.querySelector('.remove-centre-btn').addEventListener('click', function() {
            row.remove();
        });
    }

    // Attacher l'événement "supprimer" aux lignes existantes
    document.querySelectorAll('.centre-row').forEach(function(row) {
        attachRemoveEvent(row);
    });
</script>
