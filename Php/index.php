<?php
/**
 * Contrôleur
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXAM-CNAM
 */

// Inclusion des constantes et des fonctions de l'application
// en particulier l'Autoload
require('../Inc/require.inc.php');

// Crée une session nommée
session_name('cat_clinic');
session_start();

// variable de contrôle
$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

// Contrôleur
switch($EX)
{
    case 'home'         : home();           break;
    case 'admin'        : admin();          break;
    case 'deconnect'    : deconnect();      break;
    case 'form_item'    : form_item();      break;
    case 'insert_item'  : insert_item();    break;
    case 'update_item'  : update_item();    break;
    case 'delete_item'  : delete_item();    break;
    case 'page'         : page();           break;

    default             : home();
}

// mise en page
require ('../View/layout.view.php');

/**
 * Affichage de la page d'accueil
 *
 * @return
 */
function home()
{

    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg']    = '../Html/home.html';

    return;
} // home()

/**
 * Affichage de la page d'accueil
 * en mode administration des items
 *
 * @return
 */
function admin()
{
    $_SESSION['ADMIN'] = true;
    home();

    return;

} // admin()

/**
 * Déconnexion
 *
 * @return
 */

function deconnect()
{
    session_unset();
    home();

    return;

} // deconnect()

/**
 * Formulaire d'item
 *
 * @return
 */
function form_item()
{
    // Test si le parametre ID_ITEM existe

    // Test si le parametre ID_ITEM existe
    if (isset($_GET['ID_ITEM']))
    {
        $mitems = new MItems($_GET['ID_ITEM']);
        $data = $mitems->Select();
    }
    else
    {
        $data = '';
    }

    global $content;

    $content['title']  = 'Formulaire';
    $content['class']  = 'VHeader';
    $content['method'] = 'showForm';
    $content['arg']    = $data;

    return;

} // form_item()

/**
 * Insertion d'un item
 *
 * @return
 */
function insert_item()
{
    $mitems = new MItems();
    $mitems->SetValue($_POST);
    $mitems->Insert();

    home();

    return;

} // insert_item()

/**
 * Mise à jour d'un item
 *
 * @return
 */
function update_item()
{
    $mitems = new MItems($_GET['ID_ITEM']);
    $mitems->SetValue($_POST);
    $mitems->Update();

    home();

    return;
} // update_item()

/**
 * Suppression d'un item
 *
 * @return
 */
function delete_item()
{
    $mitems = new MItems($_GET['ID_ITEM']);
    $mitems->SetValue($_POST);
    $mitems->Delete();

    home();

    return;
} // delete_item()

/**
 * Affichage de la liste des messages par item
 *
 * @return
 */


function page()
{
    $data = isset($_GET['ITEM']) ? $_GET['ITEM'] : 'home' ;

    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg']    = '../Html/'.$data.'.html';

    return;
}

