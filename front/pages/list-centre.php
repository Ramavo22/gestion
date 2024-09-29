<?php
    
    $datas = getDataUrl(centre."/list");
    // Action Filtre
    if(isset($_POST['filter'])){
        $datas = $_POST['donne'];
    } 
    $typeCentres = getDataUrl(typeCentre."/list");
    $i = 1;
?>

<main class="container mt-5">
    <form action="<?php echo INDEX_TO_BACK."/centre/filtre.php" ?>" method="get" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
        </div>
        <div class="col-md-6">
            <label for="typeCentre" class="form-label">Type de Centre</label>
            <select id="typeCentre" class="form-select" name="type_centre">
                <option selected value="">Tous les types</option>
            <?php foreach ($typeCentres as $typeCentre){ ?>
                <option value="<?php echo $typeCentre['id']?>"><?php echo $typeCentre['label'] ?></option>
            <?php }?>
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
                <th scope="col">Actions hehe</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($datas as $data){ ?>
            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $data['label'] ?></td>
                <td><?php echo $data['centre']['label'] ?></td>
                <td>
                    <a href="index.php?page=f-centre&id=<?php echo $data['id'];  ?>&action=update" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="<?php echo INDEX_TO_BACK."/centre/supprimerCentre.php?id=".$data['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>

        <?php $i++;} ?>
        </tbody>
    </table>
</main>