<?php
/**
 * Affichage du header
 */
class VHeader
{
    public function __construct() {}
    public function __destruct()  {}

    /**
     * Affichage des items
     * @param array données items
     *
     * @return
     */
    public function showHeader()
    {
        global $li;
        global $contact;
        global $nouveau;
        global $deconnexion;
        global $active;
        global $id;

        // Récupération des données des items

        $mitems = new MItems();
        $data   = $mitems->SelectAll();
        array_walk($data, 'strip_xss');

        $li          = '' ;
        $nouveau     = '' ;
        $deconnexion = '' ;
        $id          = '' ;

        // Boucle sur les tuples de la table ITEMS

        foreach ($data as $val)
        {
            // Supprime les espaces pour l'attribut 'id' conforme au w3c
            $_id = str_replace(' ', '_', $val['ITEM']);

            if (isset($_REQUEST['ITEM']) and $_REQUEST['ITEM'] == $val['ITEM']) {
                $id = 'active';
            } else {
                $id = $_id;
            }

            $id_item = '';
            $item ='';

            $id_item .= $val['ID_ITEM'];
            $item    .= $val['ITEM'];

//            $_val= str_replace(' ', '_', $val['ITEM']);

            // Vérifie si l'on est en mode administration

            if (isset($_SESSION['ADMIN']))
            {
                if ($_SESSION['AUTORISATION'] >= MODIFICATION)
                {
                    $ex = 'form_item' ;
                }
                if ($_SESSION['AUTORISATION'] <= INSERTION)
                {
                    $ex = 'interdit' ;
                }

                // Affichage des éléments <li> du Header en session ADMIN

                $li .= '<li><button class="admin" onclick="changeContent(\'content\', \'../Php/index.php\', \'EX='.$ex.'&ID_ITEM='.$id_item.'\')">'.$item.'</button></li>';
                $contact = '';
                $nouveau = '<li class="is-active"><button onclick="changeContent(\'content\', \'../Php/index.php\', \'EX=form_item\')">Ajouter un item</button></li>';
                $deconnexion = '<li class="is-active"><a href="../Php/index.php?EX=deconnect">Déconnexion</a></li>';

            }
            else
            {
                // Affichage des éléments <li> du Header en consultation

                $li .= '<li><button onclick="changeContent(\'content\', \'../Php/index.php\', \'EX=page&ID_ITEM='.$id_item.'\')">'.$item.'</button></li>';
                $contact = '<li><a data-toggle="contact-panel">Contact</a></li>';
                $nouveau .= '';
                $deconnexion .= '';
            }

        }

        echo<<<NOW

<div data-sticky-container>

    <div class="title-bar" data-sticky data-options="marginTop:0;" style="width:100%">

        <div class="title-bar">
            <div id="logo">
                <a href="../Php/index.php"><img src="../Img/logoTitre.png" alt="logoCatClinic"></a>
            </div>
            <div id="logoAccueil">
                <a href="../Php/index.php"><img src="../Img/logoAccueil.png" alt="logoAccueil"></a>
            </div>
        </div>

        <div class="title-bar-right">
            <ul class="menu align-center">
                $li
                $contact
            </ul>
                $nouveau
                $deconnexion
        </div>

     </div>
</div>
NOW;

        return;
    } // showHeader
} // VHeader
