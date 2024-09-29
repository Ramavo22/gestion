<?php 
    require_once "../constant.php";
    require_once "../function.php";

    echo $_POST['libelle']." ".$_POST['type_centre'];

    $url = centre."/add";
    $data = ['label' =>  $_POST['libelle'], 'typeCentreId' => $_POST['type_centre']];

    $resp = postDataUrl($url,$data);

    header("Location:".BACK_TO_INDEX_URL."?page=centres");

?>