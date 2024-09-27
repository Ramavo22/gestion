<main class="container mt-5">
    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="display-4">Starter Page</h1>
        <p class="lead">Gérez vos données comptables et faites des analyses détaillées.</p>

        <!-- Formulaire d'insertion de fichier CSV -->
        <form action="#" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="formFile" class="form-label">Importer vos données CSV</label>
                <input class="form-control" type="file" id="formFile" name="csvFile" accept=".csv">
            </div>
            <button type="submit" class="btn btn-primary">Importer des données</button>
            <a href="#" class="btn btn-secondary ms-2">Commencer autrement</a>
        </form>
    </div>
</main>