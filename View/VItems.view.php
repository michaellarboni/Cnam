<?php
/**
 * Affichage du header
 */
class VItems
{
    public function __construct() {}
    public function __destruct()  {}

    /**
     * Affichage des items
     * @param array données items
     *
     * @return
     */
    public function showItems()
    {
        global $li;
        global $contact;
        global $nouveau;
        global $deconnexion;
        global $admin;
        global $admin_fiche;
        global $active;
        global $id;

        // Récupération des données des items

        $mitems = new MItems();
        $data   = $mitems->SelectAll();
        array_walk($data, 'strip_xss');

        $li          = '' ;
        $nouveau     = '' ;
        $deconnexion = '' ;
        $admin       = '' ;
        $admin_fiche = '' ;
        $active      = '' ;
        $id          = '' ;

        // Boucle sur les tuples de la table ITEMS

        foreach ($data as $val) {
            // Supprime les espaces pour l'attribut 'id' conforme au w3c
            $_id = str_replace(' ', '_', $val['ITEM']);

            if (isset($_REQUEST['ITEM']) and $_REQUEST['ITEM'] == $val['ITEM']) {
                $id = 'active';
            } else {
                $id = $_id;
            }

            $class = isset($_SESSION['ADMIN_CONTENU']) ? 'class="adminContenu"' : '';
            $class = isset($_SESSION['ADMIN'])         ? 'class="admin"'        : $class;

            //$_val= str_replace(' ', '_', $val['ITEM']);

            // Vérifie si l'on est en mode administration
            if (isset($_SESSION['ADMIN']))
            {
                $li .= '<li id="' . $id . '"><a '.$class.' href="../Php/index.php?EX=form_item&amp;ID_ITEM='.$val['ID_ITEM'].'&amp;ITEM='.$val['ITEM'].'">'.$val['ITEM'].'</a></li>';
                $contact = '';
                $nouveau = '<li class="is-active"><a href="../Php/index.php?EX=form_item">Nouveau</a></li>';
                $deconnexion = '<li class="is-active"><a href="../Php/index.php?EX=deconnect">Déconnexion</a></li>';
                $admin = '';
                $admin_fiche = '';
            }
            else
                {
                    //$li .= '<li class="' . $val['ITEM'] . '" id="' . $id . '"><a href="../Php/index.php?EX=page&amp;ID_ITEM=' . $val['ID_ITEM'] . '">' . $val['ITEM'] . '</a></li>';
                    $li .= '<li '.$class.' id="' . $id . '"><a '.$class.' href="../Php/index.php?EX=page&amp;ID_ITEM='.$val['ID_ITEM'].'&amp;ITEM='.$val['ITEM'].'">' . $val['ITEM'] . '</a></li>';
                    $contact = !isset($_SESSION['ADMIN_CONTENU']) ? '<li><a href="../Php/index.php?EX=contact">Contact</a></li>' : '';
                    $nouveau .= '';
                    $deconnexion .= '';
                    $admin = '<li id=""><a href="../Php/index.php?EX=admin">AI</a></li>';

                    if (isset($_GET['ID_ITEM']) AND !isset($_SESSION['ADMIN_CONTENU']))
                    {
                        $admin_fiche ='<li id=""><a href="../Php/index.php?EX=adminContenu">AF</a></li>' ;
                    }
                    else if (isset($_SESSION['ADMIN_CONTENU']) OR isset($_SESSION['ADMIN']))
                    {
                        $admin_fiche = '<li id=""><a href="../Php/index.php?EX=deconnect">Deconnexion</a></li>' ;
                    }
            }
        }

        include ('../Html/header.html.php');

        return;
    } // showItems

    /**
     * Affichage du formulaire items
     * @param array données des items
     *
     * @return
     */
    public function showForm($_data)
    {
        if (isset($_data['ID_ITEM']))
        {
            $ex   	   = 'update_item&ID_ITEM='.$_data['ID_ITEM'];
            $item 	   = $_data['ITEM'];
            $supprimer = '<a href="../Php/index.php?EX=delete_item&amp;ID_ITEM='.$_data['ID_ITEM'].'"><button>Supprimer</button></a>';
        }
        else
        {
            $ex   	   = 'insert_item' ;
            $item 	   = '' ;
            $supprimer = '' ;
        }

        echo <<<HERE
<div style="text-align: center">
    <form action="../Php/index.php?EX=$ex" method="post">
     <fieldset>
      <legend>Formulaire</legend>
      <p>
       <label for="item">Item</label>
       <input id="item" name="ITEM" value="$item" size="25" required="required" maxlength="50" />
      <p class="submit">
       <input type="submit" value="Ok" />
      </p>
     </fieldset>
    </form>
    $supprimer
</div>
HERE;
        return;
    } // showForm

} // VItems
