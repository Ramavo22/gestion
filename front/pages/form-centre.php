<?php 

    $entity = null;
    if(isset($_GET['action'])){
        $url = centre."/find-by-id";
        $entity = getDataUrl($url,['id' => $_GET['id']]);
    }

    $typeCentres = getDataUrl(typeCentre."/list")

?>

<main class="container mt-5">
    <h2 class="mb-4 text-center">Centre</h2>

    <form action="<?php echo $entity == null ?  INDEX_TO_BACK."/centre/ajoutCentre.php" : INDEX_TO_BACK."/centre/updateCentre.php"?>" method="post">
    <?php if($entity!=null){ ?>
        <input type="hidden" name = "id" value="<?php echo $entity['id'] ?>">
    <?php } ?>
        

        <div class="mb-3">
            <label for="libelle" class="form-label" >Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé"
                required value="<?php if($entity!=null) echo $entity['label'] ?>">
        </div>
        <div class="mb-3">
            <label for="typeCentre" class="form-label">Type de Centre</label>
            <select id="typeCentre" class="form-select" name="type_centre" required>
                <option selected disabled value="">Sélectionner un type</option>
            <?php foreach ($typeCentres as $typeCentre){ ?>
                <option value="<?php echo $typeCentre['id']?>"<?php if($entity!=null)if($entity['centre']['id']==$typeCentre['id']) echo "selected" ?>><?php echo $typeCentre['label']; ?></option>
            <?php }?>    
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>