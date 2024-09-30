<?php 
    $unities = getDataUrl(unity."/list");

    $i =1;

?>

<main class="container mt-5">
    <!-- <form action="#" method="get" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé">
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </div>
    </form> -->
    <div class="col-12 mb-2 text-center">
        <a href="index.php?page=f-unite" class="btn btn-outline-warning ms-2">Ajouter une unite</a>
    </div>
    
    <table class="table table-borderless">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libellé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($unities as $unity){ ?>
            <tr>
                <th scope="row"><?php echo $i; $i++ ?></th>
                <td><?php echo $unity['label']; ?></td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi-pencil-square"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="bi-trash2-fill"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</main>