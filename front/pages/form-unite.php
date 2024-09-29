<main class="container mt-5">
    <h2 class="mb-4 text-center">Unite</h2>

    <form action="<?php echo INDEX_TO_BACK."/unity/ajout.php"; ?>" method="post">
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé"
                required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>