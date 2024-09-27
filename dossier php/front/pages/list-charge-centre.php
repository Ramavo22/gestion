<main class="container mt-5">
    <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="id_charge" class="form-label">Charge</label>
            <select id="id_charge" class="form-select" name="id_charge">
                <option selected value="">Toutes les charges</option>
                <option value="1">Achat Papier</option>
                <option value="2">Achat Emballage</option>
                <option value="3">Assurances</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="id_centre" class="form-label">Centre</label>
            <select id="id_centre" class="form-select" name="id_centre">
                <option selected value="">Tous les centres</option>
                <option value="1">Usine</option>
                <option value="2">Administration</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="montant_min" class="form-label">Montant Min</label>
            <input type="number" class="form-control" id="montant_min" name="montant_min" placeholder="Montant minimum" step="0.01">
        </div>
        <div class="col-md-6">
            <label for="montant_max" class="form-label">Montant Max</label>
            <input type="number" class="form-control" id="montant_max" name="montant_max" placeholder="Montant maximum" step="0.01">
        </div>

        <div class="col-md-6">
            <label for="pourcentage_min" class="form-label">Pourcentage Min</label>
            <input type="number" class="form-control" id="pourcentage_min" name="pourcentage_min" placeholder="Pourcentage minimum" step="0.01">
        </div>
        <div class="col-md-6">
            <label for="pourcentage_max" class="form-label">Pourcentage Max</label>
            <input type="number" class="form-control" id="pourcentage_max" name="pourcentage_max" placeholder="Pourcentage maximum" step="0.01">
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="index.php?page=f-charges-centres" class="btn btn-success ms-2">Ajouter une affectation</a>
        </div>
    </form>

    <table class="table table-borderless">
        <thead class="table-light">
            <tr>
                <th scope="col">Charge</th>
                <th scope="col">Centre</th>
                <th scope="col">Montant</th>
                <th scope="col">Pourcentage</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Achat Papier</th>
                <td>Usine</td>
                <td>1000.00</td>
                <td>50%</td>
                <td>
                    <a href="#" cl0ass="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <tr>
                <th scope="row">Achat Emballage</th>
                <td>Usine</td>
                <td>2000.00</td>
                <td>75%</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
