<?php

    //nombre del archivo donde se ejecuto el script
    //dirname para extraer la primera parte del enlace
    $folderPath = dirname($_SERVER['SCRIPT_NAME']);

    //trae la ruta completa de la url, la que estamos ubicados
    $urlPath = $_SERVER['REQUEST_URI'];

    // $url = substr($urlPath,11); 
    //substr muestra nombre apartir del numero(caracter) escrito
    //strlen, longitud de cadena de texto de  folderpath
    $url = substr($urlPath,strlen($folderPath));

    //define constante global llamada url se almacena $url
    define('URL',$url);
    define('URL_PATH',$folderPath);

    // echo '<PRE>';
    // var_dump($_SERVER);
    // echo '</PRE>';

    // echo $folderPath .'<br>';
    // echo $urlPath .'<br>';
    // echo $url .'<br>';


    
?>