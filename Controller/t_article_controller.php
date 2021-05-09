<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//
$id_t_article=filter_input(INPUT_POST, 'id_t_article', FILTER_SANITIZE_NUMBER_INT);
$libelle=filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);

$btn_valide=filter_input(INPUT_POST, 'submit_btn', FILTER_SANITIZE_NUMBER_INT);

$btn_suppr=filter_input(INPUT_POST, 'btn_suppr', FILTER_SANITIZE_NUMBER_INT);



if($btn_valide){

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,'http://localhost:8089/t_articles/creer/'.$id_t_article.'/'.$libelle.'');
    curl_setopt($ch, CURLOPT_POST, 1);

    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

	echo '<script language="JavaScript">
	window.location.replace("../View/type_article.php");//joue le role de header(php) en java
	</script>';
    // Further processing ...
    #if ($server_output == "OK") { ... } else { ... }
}
else if($btn_suppr){
    echo($btn_suppr);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,'http://localhost:8089//t_articles/supprimer/'.$btn_suppr.'');
    curl_setopt($ch, CURLOPT_POST, 1);

    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);


    echo '<script language="JavaScript">
	window.location.replace("../View/type_article.php");//joue le role de header(php) en java
	</script>';
    
    // Further processing ...
    #if ($server_output == "OK") { ... } else { ... }
}

?>