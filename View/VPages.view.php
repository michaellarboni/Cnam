<?php
/**
 * Affichage des pages
 */
class VPages
{
    public function __construct() {}
    public function __destruct()  {}

    /**
     * Affichage des pages
     * @param array données du contenu
     *
     * @return
     */
    public function showPage($_data)
    {
        $li  = '' ;
        $div = '' ;
        $nouveau = isset($_SESSION['ADMIN_CONTENU']) ? '<li class="tabs-title"><a style="color: orange" href="../Php/index.php?EX=formContenu&amp;ID_ITEM='.$_GET['ID_ITEM'].'&amp;ITEM='.$_GET['ITEM'].'">Nouvelle fiche</a></li>':'';

        // Boucle sur les tuples de la table contenus
        foreach ($_data['ITEM'] as $val)
        {
            $id_item    =  $val['ID_ITEM'];
            $item       =  $val['ITEM'];
            $id_contenu = $val['ID_CONTENU'];
            $titre      =  '<h2>'.$val['TITRE'].'</h2>';
            $texte      =  $val['TEXTE'];
            $p          = '<p>'.$texte.'</p>';
            $div       .= '<div class="tabs-panel is-active" id="panel'.$id_contenu.'">
                            '.$titre.$p.'
                           </div>';

            if (isset($_SESSION['ADMIN_CONTENU']))
            {
                $li .= '<li class="tabs-title"><a href="../Php/index.php?EX=formContenu&amp;ID_CONTENU='.$id_contenu.'&amp;ID_ITEM='.$id_item.'&amp;ITEM='.$item.'">'.$val['TITRE'].'</a></li>' ;
                $nouveau = '<li class="tabs-title"><a style="color: orange" href="../Php/index.php?EX=formContenu&amp;ID_ITEM='.$id_item.'&amp;ITEM='.$item.'">Nouvelle</a></li>';
            }
            else {$li .= '<li class="tabs-title"><a href="../Php/index.php?EX=page&amp;ID_CONTENU='.$id_contenu.'&amp;ID_ITEM='.$id_item.'">'.$val['TITRE'].'</a></li>' ;}}

        echo<<<HERE
        
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-tabs id="example-tabs">
               $li
               $nouveau
            </ul>
        </div>
        <div class="cell medium-9">
            <div class="tabs-content" data-tabs-content="example-tabs">
                $div
             </div>
        </div>
    </div>
</div>
HERE;
    } // showPage

    /**
     * Affichage du formulaire
     * @param array données du contenu
     *
     * @return
     */
    public function showForm($_data)
    {
        $id_item   = isset($_data['ID_ITEM']) ? $_data['ID_ITEM'] : '' ;

        if (isset($_data['ID_CONTENU']))
        {
            $ex   	    = 'update_contenu&ID_CONTENU='.$_data['ID_CONTENU'];
            $titre 	    = $_data['TITRE'];
            $texte 	    = $_data['TEXTE'];
            $id_contenu = $_data['ID_CONTENU'];
            $supprimer  = '<a href="../Php/index.php?EX=delete_contenu&amp;ID_CONTENU='.$_data['ID_CONTENU'].'"><button>Supprimer</button></a>';
        }
        else
        {
            $ex   	    = 'insert_contenu' ;
            $titre 	    = '' ;
            $texte 	    = '' ;
            $id_contenu = '' ;
            $supprimer  = '' ;
        }

        echo <<<HERE
<div style="text-align: center">
    <form action="../Php/index.php?EX=$ex" method="post">
     <fieldset>
      <legend style="color: white">Formulaire</legend>
       
       <div class="contactChamp">
            <input id="titre" name="TITRE" value="$titre" size="25" required="required" maxlength="50" />
            <label for="titre" id="champTitre" style="width: 20%;" class="erreurLab">Titre</label>
        </div>

        <div class="contactChamp">
            <textarea id="msg" name="TEXTE" placeholder="Tapez votre texte ici, pour ajouter un paragraphe entourez le avec des balises <p>Comme ceci </p>" class="erreurLab">$texte</textarea>
            <label for="sujet" id="champTexte" style="width: 20%;"  class="erreurLab">Paragraphe</label>
        </div>
         
         <input id="id_item" name="ID_ITEM" value="$id_item" size="25" maxlength="100" type="hidden"/>       
         <input id="id_contenu" name="ID_CONTENU" value="$id_contenu" size="25" maxlength="50" type="hidden"/>
              
     
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

} // Vpages
