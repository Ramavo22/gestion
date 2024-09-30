<?php 
    require_once "../../function.php";

    $data = ['id' => $_POST['id']];
    
    $url = unity."/delete";

    postDataUrl($url,$data);
?>