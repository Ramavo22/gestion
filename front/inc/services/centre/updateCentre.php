<?php 
    require_once "../../constant.php";
    require_once "../../function.php";

    $url = centre."/update";
    $data = ['id' => $_POST['id'],'label' =>  $_POST['libelle'], 'typeCentreId' => $_POST['type_centre']];

    $resp = postDataUrl($url,$data);
    
    var_dump($resp);
    //header("Location:".BACK_TO_INDEX_URL."?page=centres");

?>