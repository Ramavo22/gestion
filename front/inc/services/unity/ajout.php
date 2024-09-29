<?php 
    require_once "../../function.php";

    $data = ['label' => $_POST['libelle']];

    $resp = postDataUrl(unity."/add",$data);

    
    header("location: ".BACK_TO_INDEX_URL."?page=unites");

?>