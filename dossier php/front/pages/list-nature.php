<main class="container mt-5">
    <form action=#" method="get" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="index.php?page=f-nature" class="btn btn-success ms-2">Ajouter une nature de charge</a>
        </div>
    </form>

    <table class="table table-borderless">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libellé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Fixe</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Variable</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>