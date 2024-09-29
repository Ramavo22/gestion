<main class="container mt-5">
    <h2 class="mb-4">Charge par centre</h2>
    <form action="#" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="id_charge" class="form-label">Charge</label>
            <select id="id_charge" class="form-select" name="id_charge" required>
                <option selected value="">Sélectionnez une charge</option>
                <option value="1">Achat Papier</option>
                <option value="2">Achat Emballage</option>
                <option value="3">Assurances</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="id_centre" class="form-label">Centre</label>
            <select id="id_centre" class="form-select" name="id_centre" required>
                <option selected value="">Sélectionnez un centre</option>
                <option value="1">Usine</option>
                <option value="2">Administration</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="montant" class="form-label">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" placeholder="Entrez le montant" step="0.01" required>
        </div>
        <div class="col-md-6">
            <label for="pourcentage" class="form-label">Pourcentage</label>
            <input type="number" class="form-control" id="pourcentage" name="pourcentage" placeholder="Entrez le pourcentage" step="0.01" required>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>
