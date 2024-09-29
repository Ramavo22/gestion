<?php 

    require_once "../../function.php";
    $url = centre."/delete";
    $data = ['id' => $_GET['id'] ]; 

    $resp = postDataUrl($url,$data);

    header("Location:".BACK_TO_INDEX_URL."?page=centres");

    
?>