<?php 
     require_once "../../function.php";

    $url = connection;
    $data = ['nom'=>$_POST["nom"],'password'=>$_POST["password"]];

    $resp = postDataUrl($url, $data);
    var_dump($resp);
    if ($resp != "Failed to connect") {
        header('Location:'.BACK_TO_INDEX_URL."?page=home");
    }else {
        $error = "Wrong Login or password";
        header('Location:'.BACK_TO_INDEX_URL."?page=f-connection&error=".$error);
    }
?>