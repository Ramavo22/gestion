<main class="container mt-5">
    <h2 class="mb-4 text-center">Charge</h2>

    <form action="#" method="post">
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé"
                required>
        </div>
        <div class="mb-3">
                <label for="montant_total" class="form-label">Montant Total</label>
                <input type="number" class="form-control" id="montant_total" name="montant_total" required placeholder="Entrez le montant total" step="0.01">
            </div>

            <div class="mb-3">
                <label for="id_unity" class="form-label">Unité</label>
                <select class="form-select" id="id_unity" name="id_unity" required>
                    <option selected disabled value="">Sélectionner une unité</option>
                    <option value="1">Kg</option>
                    <option value="2">Nb</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_type_charge" class="form-label">Type de Charge</label>
                <select class="form-select" id="id_type_charge" name="id_type_charge" required>
                    <option selected disabled value="">Sélectionner un type de charge</option>
                    <option value="1">Non-incorporables</option>
                    <option value="2">Incorporables</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_nature" class="form-label">Nature</label>
                <select class="form-select" id="id_nature" name="id_nature" required>
                    <option selected disabled value="">Sélectionner une nature</option>
                    <option value="1">Fixe</option>
                    <option value="2">Variable</option>
                    <option value="3">None</option>
                </select>
            </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>