<?php
/**
 * Contrôleur
 * @author Michael Larboni
 * @version 1.0
 * @package Projet Cnam NFA021
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
    case 'home'            : home();            break;
    case 'page'            : page();            break;
    case 'contact'         : contact();         break;
    case 'admin'           : admin();           break;
    case 'adminForm'       : adminForm();       break;
    case 'adminContenu'    : adminContenu();    break;
    case 'adminFormContenu': adminFormContenu();break;      // non utilisé
    case 'verifAdmin'      : verifAdmin();      break;
    case 'deconnect'       : deconnect();       break;
    case 'form_item'       : form_item();       break;
    case 'insert_item'     : insert_item();     break;
    case 'update_item'     : update_item();     break;
    case 'delete_item'     : delete_item();     break;
    case 'formContenu'     : formContenu();     break;
    case 'insert_contenu'  : insert_contenu();  break;
    case 'update_contenu'  : update_contenu();  break;
    case 'delete_contenu'  : delete_contenu();  break;
    case 'read'            : read();            break;
    case 'sendMail'        : sendMail();        break;
    default                : home();
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
    //$arg = isset($_SESSION['ADMIN']) ? $_SESSION['ADMIN'] : 'home' ;

    if (isset($_SESSION['ADMIN']))
    {$arg = 'admin';}
    elseif (isset($_SESSION['ADMIN_CONTENU']))
    {$arg = 'admin_contenu';}
    else {$arg = 'home';}

    /*switch ($arg)
    {
        case 'home'           : 'home';          break;
        case 'ADMIN'          : 'admin';         break;
        case 'ADMIN_CONTENU'  : 'admin_contenu'; break;
    }
    */
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg']    = '../Html/'.$arg.'.html.php' ;

    return;

} // home()

/**
 * Affichage de la page d'accueil
 *
 * @return
 */
function contact()
{
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VContact';
    $content['method'] = 'showFormContact';
    $content['arg']    = '';

    return;

} // contact()

/**
 * Affichage de la page d'accueil
 * en mode administration des items
 *
 * @return
 */
function page($id_item = null)
{
        $_SESSION['ID_ITEM']    = isset($_GET['ID_ITEM'])    ? $_GET['ID_ITEM']    : $id_item ;
        $_SESSION['ID_CONTENU'] = isset($_GET['ID_CONTENU']) ? $_GET['ID_CONTENU'] : $id_item ;

        //$_SESSION['ITEM']       = isset($_GET['ITEM'])       ? $_GET['ITEM']       : $id_item ;
        //$_SESSION['CONTENU']    = isset($_GET['CONTENU'])    ? $_GET['CONTENU']    : $id_item ;

        $value ['ID_ITEM'] = $_SESSION['ID_ITEM'];
        $mpages = new MPages();
        $mpages ->SetValue($value);
        $data['ITEM']    = $mpages->SelectAll();
        //array_walk($data, 'strip_xss');

        global $content;

        $content['title'] = 'Page Clinique';
        $content['class'] = 'VPages';
        $content['method'] = 'showPage';
        $content['arg'] = $data;

        return;

} //page

function adminForm()
{
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VAdmin';
    $content['method'] = 'adminForm';
    $content['arg']    = '';

    return;

} // adminForm()

function adminFormContenu()
{
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VAdmin';
    $content['method'] = 'adminForm';
    $content['arg']    = '';

    return;

} // adminContenu

function verifAdmin()
{
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VAdmin';
    $content['method'] = 'verifAdmin';
    $content['arg']    = '';

    return;

} // verifAdmin()

function admin()
{
    $_SESSION['ADMIN'] = true;
    home();

    return;

} // admin()

function adminContenu()
{
    unset($_SESSION['ADMIN']);

    $_SESSION['ADMIN_CONTENU'] = true;

    home();

    return;

} // adminContenu()

/**
 * Déconnexion
 *
 * @return
 */
function deconnect()
{
    // Suppression des ssessions
    session_unset();

    // Réinitialisation de la variable $_SESSION
    $_SESSION = array();

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
    if (isset($_GET['ID_ITEM']))
    {
        $mitems = new MItems($_GET['ID_ITEM']);
        $data = $mitems->Select();
        array_walk($data, 'strip_xss');
    }
    else
    {
        $data = '';
    }

    global $content;

    $content['title']  = 'Formulaire';
    $content['class']  = 'VItems';
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


/* Formulaire de Contenu
 *
 * */
function formContenu()
{
    // Test si le parametre ID_CONTENU existe
    if (isset($_GET['ID_CONTENU']))
    {
        $mpages = new MPages($_GET['ID_CONTENU']);
        $data = $mpages->Select();
        $data['ITEM'] = $_GET['ITEM'];
    }

    else
    {
        $data['ID_ITEM'] = $_GET['ID_ITEM'];
        $data['ITEM'] = $_GET['ITEM'];
    }

    global $content;

    $content['title']  = 'Formulaire';
    $content['class']  = 'VPages';                  // pourquoi VPages != Vpages erreur sur raspbian class sensible a la casse
    $content['method'] = 'showForm';
    $content['arg']    = $data;

    return;

} // formContenu()

function insert_contenu()
{
    $mpages = new MPages();
    $mpages->SetValue($_POST);
    $mpages->Insert();

    home();

    return;

} // insert_contenu()

/**
 * Mise à jour du contenu
 *
 * @return
 */
function update_contenu()
{
    $mpages = new MPages($_GET['ID_CONTENU']);
    $mpages->SetValue($_POST);
    $mpages->Update();

    home();

    return;

} // update_contenu()

/**
 * Suppression d'un item
 *
 * @return
 */
function delete_contenu()
{
    $mpages = new MPages($_GET['ID_CONTENU']);
    $mpages->SetValue($_POST);
    $mpages->Delete();

    home();

    return;

} // delete_contenu()

function sendMail()
{
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VMail';
    $content['method'] = 'sendMail';
    $content['arg']    = '';

    return;
}
