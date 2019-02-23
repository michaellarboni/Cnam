<?php

// Constantes pour la Base de données
define('DEBUG', true);
define('DATABASE', 'mysql:host=localhost;dbname=cat_clinic;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', 'MLarboni');
define('CHARSET', 'utf8');

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

function strip_xss(&$val)
{
    // Teste si $val est un tableau
    if (is_array($val))
    {
        // Si $val est un tableau, on réapplique la fonction strip_xss()
        array_walk($val, 'strip_xss');
    }
    else if (is_string($val))
    {
        // Si $val est une string, on filtre avec strip_tags()

        //$val = strip_tags($val,'<p>');
        $val = strip_tags($val);
    }

    return;

} // strip_xss(&$val)

function debug($Tab)
{
    echo '<pre>Tab';
    print_r($Tab);
    echo '</pre>';

    return;

}
