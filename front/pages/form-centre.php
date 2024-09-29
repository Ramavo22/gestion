<?php 


?>

<main class="container mt-5">
    <h2 class="mb-4 text-center">Centre</h2>

    <form action="#" method="post">
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé"
                required>
        </div>
        <div class="mb-3">
            <label for="typeCentre" class="form-label">Type de Centre</label>
            <select id="typeCentre" class="form-select" name="type_centre" required>
                <option selected disabled value="">Sélectionner un type</option>
                <option value="1">Opérationnel</option>
                <option value="2">Structure</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>