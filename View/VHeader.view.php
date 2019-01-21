<?php

class VHeader
{
    public function __construct() {}
    public function __destruct()  {}
    public function showHeader()
    {
        global $li;
        global $nouveau;
        global $deconnexion;
        global $admin;

        // Récupération des données des items
        $mitems = new MItems();
        $data = $mitems->SelectAll();
        //strip_xss($data);

        // Boucle sur les tuples de la table ITEMS
        $li = '';
        $nouveau = '' ;
        $deconnexion = '' ;
        $admin =  '';

        foreach ($data as $val)
        {
            // Vérifie si l'on est en mode administration
            if (isset($_SESSION['ADMIN']))
            {
                $li .= '<li><a href="../Php/index.php?EX=form_item&amp;ID_ITEM='.$val['ID_ITEM'].'&amp;ITEM='.$val['ITEM'].'">'.$val['ITEM'].'</a></li>';
                $nouveau 	 = '<li><a href="../Php/index.php?EX=form_item">Nouveau</a></li>';
                $deconnexion = '<li><a href="../Php/index.php?EX=deconnect">Déconnexion</a></li>';
                $admin =  '';
            }
            else
            {
                //$li .= '<li><a href="../Php/index.php?EX=page&amp;ITEM='.$val['ITEM'].'">'.$val['ITEM'].'</a></li>';
                $li .= '<li><a href="../Php/index.php?EX=page&amp;ITEM='.$val['ITEM'].'">'.$val['ITEM'].'</a></li>';
                $nouveau .= '' ;
                $deconnexion .= '' ;
                $admin =  '<div id="admin"><a href="../Php/index.php?EX=admin">privé</a></div>';

            }
        }

        include ('../Html/header.html.php');

        return;
    }

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
       <input id="item" name="ITEM" value="$item" size="25" maxlength="50" />
      <p class="submit">
       <input type="submit" value="Ok" />
      </p>
     </fieldset>
    </form>
    $supprimer
</div>
HERE;

        return;

    }

}

