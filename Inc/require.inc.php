<?php

// Constantes pour la Base de données
define('DEBUG', true);
define('DATABASE', 'mysql:host=localhost;dbname=cat_clinic');
define('LOGIN', 'root');
define('PASSWORD', 'makaveliofmars13');

spl_autoload_register('my_autoload');

function my_autoload($class)
{
    switch ($class[0])
    {
        // Inclusion des class de type View
        case 'V' : require_once('../View/'.$class.'.view.php') ; break;
        // Inclusion des class de type Mod
        case 'M' : require_once ('../Mod/' .$class.'.mod.php') ; break;

    }

    return;

} // __autoload($class)

function debug($Tab)
{
    echo '<pre>Tab';
    print_r($Tab);
    echo '</pre>';

    return;

}
