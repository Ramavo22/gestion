<main class="container mt-5">
    <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
        </div>
        <div class="col-md-6">
            <label for="typeCentre" class="form-label">Type de Centre</label>
            <select id="typeCentre" class="form-select" name="type_centre">
                <option selected value="">Tous les types</option>
                <option value="1">Opérationnel</option>
                <option value="2">Structure</option>
            </select>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="index.php?page=f-centre" class="btn btn-success ms-2">Ajouter un centre</a>
        </div>
    </form>

    <!-- Tableau des données -->
    <table class="table table-borderless">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libellé</th>
                <th scope="col">Type de Centre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Usine</td>
                <td>Opérationnel</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Administration</td>
                <td>Structure</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <!-- Autres éléments... -->
        </tbody>
    </table>
</main>