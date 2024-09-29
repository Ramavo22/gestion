<?php 
    
    $datas = getDataUrl(rubrique."/list");
    $i = 1;

?>

<main class="container mt-5">
    <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-12">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
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
            </select>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="index.php?page=f-rubrique" class="btn btn-success ms-2">Ajouter une rubrique</a>
        </div>
    </form>

        <table class="table table-borderless">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libellé</th>
                <th scope="col">Type de charge</th>
                <th scope="col">Nature</th>
                <th scope="col">Centre Concernée</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($datas as $data){ ?>
                <tr>
                    <th scope="row"><?php  echo $i;?></th>
                    <td><?php echo $data['label']; ?></td>
                    <td scope="col"><?php echo $data['typeCharge']['label']; ?></td>
                    <td scope="col"><?php echo $data['nature']['label']; ?></td> 
                    <td>
                        <ul class="list-group list-group-flush">
                        <?php foreach($data['rubriqueCentre'] as $rubriqueCentre) { ?>
                            <li class="list-group-item py-1"><?php echo $rubriqueCentre['centre']['label'].": ".$rubriqueCentre['pourcentage'].'%'; ?></li>
                        <?php } ?>
                        </ul>
                    </td>
                    <td class="d-flex gap-2">
                        <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php $i++;} ?>

                
        </tbody>
    </table>

</main>