<?php

// exécutée lorsque PHP cherche à utiliser une classe
function my_autoloader($class) {

    $path = $class . '.php';   
    
    $path = str_replace('\\', '/', $path);

    $path = str_replace('Oshop', __DIR__ . '/app', $path);
    
    echo "Fichier de classe à inclure : $path<br>";
    require $path;
}

spl_autoload_register('my_autoloader');
