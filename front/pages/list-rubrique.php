<main class="container mt-5">
    <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-12">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
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

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="index.php?page=f-rubrique" class="btn btn-success ms-2">Ajouter une charge</a>
        </div>
    </form>

        <table class="table table-borderless">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libellé</th>
                <th scope="col">Centre Concernée</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Achat Papiers</td>
                <td>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-1">Élément 1</li>
                        <li class="list-group-item py-1">Élément 2</li>
                        <li class="list-group-item py-1">Élément 3</li>
                    </ul>
                </td>
                <td class="d-flex gap-2">
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>

</main>