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
//session_name('cat_clinic');
session_name('AUTORISATION');
session_start();

// Récupération de l'identifiant de l'utilisateur
$ID_USER = isset($_REQUEST['ID_USER']) ?  $_REQUEST['ID_USER'] : '';

// variable de contrôle
$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

// Contrôleur
switch($EX)
{
    case 'home'            : home();            break;
    case 'forbidden'       : forbidden();       break;
    case 'interdit'        : interdit();        exit;
    case 'page'            : page();            exit;

    case 'connect'         : connect();         break;
    case 'admin'           : admin();           break;
    case 'deconnect'       : deconnect();       break;

    case 'form_item'       : form_item();       exit;
    case 'insert_item'     : insert_item();     break;
    case 'update_item'     : update_item();     break;
    case 'delete_item'     : delete_item();     break;

    case 'form_contenu'    : form_contenu();    break;
    case 'insert_contenu'  : insert_contenu();  break;
    case 'update_contenu'  : update_contenu();  break;
    case 'delete_contenu'  : delete_contenu();  break;

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
    $arg = 'home';

    if (isset($_SESSION['AUTORISATION']))
        {
            $_SESSION['ADMIN'] = true ;
            $arg = 'admin';
        }

    else
        {
            $arg = 'home';
        }

    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg']    = '../Html/'.$arg.'.html.php' ;

    return;

} // home()

/*
 * page saffichant lorsque les autorisations sont requises
 */
function interdit()
{
    $vhtml = new VHtml();
    $vhtml->showHtml('../Html/interdit.html.php');

    return;
} //interdit()


function forbidden()
{
    global $content;

    $content['title']  = 'Cat Clinic';
    $content['class']  = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg']    = '../Html/forbidden.html.php' ;

    return;
} //forbidden()

function page($id_item = null)
{

    $value ['ID_ITEM'] = isset($_REQUEST['ID_ITEM']) ? $_REQUEST['ID_ITEM'] : $id_item ;
    $mpages = new MPages();
    $mpages ->SetValue($value);
    $data    = $mpages->SelectAll();
//    array_walk($data, 'strip_xss');

    $vpages = new VPages();
    $vpages->showPage($data);

    return;

} //page

function connect()
{
    global $content;
    $content['title'] = 'Connexion';
    $content['class'] = 'VForm';
    $content['method'] = 'showFormConnect';
    $content['arg'] = '';

    return;

} // admin()

function admin()
{
    if (isset($_POST['LOGIN']) & isset($_POST['PASSWORD']))
    {
        $musers = new MUsers();
        $value = $musers->VerifUser($_POST);

        global $ID_USER;
        $ID_USER = $value['ID_USER'];

        global $_SESSION;

        $_SESSION['ID_USER'] = $value['ID_USER'];
        $_SESSION['NOM'] = $value['NOM'];
        $_SESSION['PRENOM'] = $value['PRENOM'];
        $_SESSION['AUTORISATION'] = $value['AUTORISATION'];

        home();
    }
    else
        {
            forbidden();
        }

    return;

} // admin()

/**
 * Déconnexion
 *
 * @return
 */
function deconnect()
{
//    // Vide le tableau des sessions
//    session_unset();

    // Détruit la session
    session_destroy();
    // Détruit les variables de session
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
    if (isset($_SESSION['ADMIN']))
    {
        // Test si le parametre ID_ITEM existe
        if (isset($_REQUEST['ID_ITEM'])) {
            $mitems = new MItems($_REQUEST['ID_ITEM']);
            $data = $mitems->Select();
            array_walk($data, 'strip_xss');
        } else {
            $data = '';
        }

        $vform = new VForm();
        $vform->showFormItem($data);
    }
    else
        {
            forbidden();
        }
    return;

} // form_item()

/**
 * Insertion d'un item
 *
 * @return
 */
function insert_item()
{
    if (isset($_SESSION['ADMIN']))
    {
        $mitems = new MItems();
        $mitems->SetValue($_POST);
        $mitems->Insert();

        home();
    }

    else
    {
        forbidden();
    }

    return;

} // insert_item()

/**
 * Mise à jour d'un item
 *
 * @return
 */
function update_item()
{
    if (isset($_SESSION['ADMIN']))
    {
        $mitems = new MItems($_GET['ID_ITEM']);
        $mitems->SetValue($_POST);
        $mitems->Update();


    $value ['ID_ITEM'] = isset($_REQUEST['ID_ITEM']) ? $_REQUEST['ID_ITEM'] : $id_item ;
    $mpages = new MPages();
    $mpages ->SetValue($value);
    $data    = $mpages->SelectAll();

    global $content;

    $content['title']  = 'Page Clinique';
    $content['class']  = 'VPages';
    $content['method'] = 'showPage';
    $content['arg']    = $data;
    }

    else
        {
            forbidden();
        }

    return;

} // update_item()

/**
 * Suppression d'un item
 *
 * @return
 */
function delete_item()
{
    if (isset($_SESSION['ADMIN']))

    {
        $data = $_REQUEST['ID_ITEM'];

        $mitems = new MItems($data);
        $mitems->SetValue($_POST);
        $mitems->Delete();

        home();
    }

    else
        {
            forbidden();
        }
    return;

} // delete_item()


/* Formulaire de Contenu
 *
 * */
function form_contenu()
{
    if (isset($_SESSION['ADMIN']))
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
        $content['class']  = 'VForm';
        $content['method'] = 'showFormContenu';
        $content['arg']    = $data;

    }
    else
        {
            forbidden();
        }

    return;

} // formContenu()

function insert_contenu()
{
    if (isset($_SESSION['ADMIN']))
    {
        $mpages = new MPages();
        $mpages->SetValue($_POST);
        $mpages->Insert();

        $value ['ID_ITEM'] = isset($_REQUEST['ID_ITEM']) ? $_REQUEST['ID_ITEM'] : $id_item ;
        $mpages = new MPages();
        $mpages ->SetValue($value);
        $data    = $mpages->SelectAll();

        global $content;

        $content['title']  = 'Page Clinique';
        $content['class']  = 'VPages';
        $content['method'] = 'showPage';
        $content['arg']    = $data;
    }
    else
        {
            forbidden();
        }

    return;

} // insert_contenu()

/**
 * Mise à jour du contenu
 *
 * @return
 */
function update_contenu()
{
    if (isset($_SESSION['ADMIN']))
    {
        $mpages = new MPages($_GET['ID_CONTENU']);
        $mpages->SetValue($_POST);
        $mpages->Update();

        $value ['ID_ITEM'] = isset($_REQUEST['ID_ITEM']) ? $_REQUEST['ID_ITEM'] : $id_item ;
        $mpages = new MPages();
        $mpages ->SetValue($value);
        $data    = $mpages->SelectAll();

        global $content;

        $content['title']  = 'Page Clinique';
        $content['class']  = 'VPages';
        $content['method'] = 'showPage';
        $content['arg']    = $data;
    }
    else
        {
            forbidden();
        }

    return;

} // update_contenu()

/**
 * Suppression d'un contenu
 *
 * @return
 */
function delete_contenu()
{
    if (isset($_SESSION['ADMIN']))
    {
        $mpages = new MPages($_GET['ID_CONTENU']);
        $mpages->SetValue($_POST);
        $mpages->Delete();

        $value ['ID_ITEM'] = isset($_REQUEST['ID_ITEM']) ? $_REQUEST['ID_ITEM'] : $id_item ;
        $mpages = new MPages();
        $mpages ->SetValue($value);
        $data    = $mpages->SelectAll();

        global $content;

        $content['title']  = 'Page Clinique';
        $content['class']  = 'VPages';
        $content['method'] = 'showPage';
        $content['arg']    = $data;
    }
    else
    {
        forbidden();
    }

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
