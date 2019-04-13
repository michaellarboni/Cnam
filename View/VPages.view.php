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

        $value ['ID_ITEM'] = isset($_GET['ID_ITEM']) ? $_GET['ID_ITEM'] : null ;
        $mpages = new MPages();
        $mpages ->SetValue($value);
        //$data['ITEM'] = $mpages->SelectAll();
//        $_data['ID_ITEM'] = $mpages->SelectAll();
        //array_walk($data, 'strip_xss');

//        global $aucun;

        $li      = '';
        $div     = '';
        $aucun   = isset($_data[0]['ID_CONTENU']) ? '' : 'Aucun contenu disponible' ;
        $nouveau = isset($_SESSION['ADMIN']) ? '<li class="tabs-title"><a class="admin" href="../Php/index.php?EX=form_contenu&amp;ID_ITEM='.$_REQUEST['ID_ITEM'].'&amp;ITEM='.$_REQUEST['ITEM'].'">Nouvelle fiche</a></li>' :'';

        // Boucle sur les tuples de la table contenus
        foreach ($_data as $val)
        {
            $id_contenu = $val['ID_CONTENU'];
            $titre      = $val['TITRE'];
            $texte      = $val['TEXTE'];
            $paragraphe = $val['PARAGRAPHE'];
            $classLi    = 'class="tabs-title"';
            $classDiv    = 'is-active';
            $div        .= '<div class="tabs-panel '.$classDiv.'" data-update-history="true" id="panel'.$id_contenu.'">
                                <h2>'.$titre.'</h2>
                                <p> '.$texte.'</p>
                                <p> '.$paragraphe.'</p>
                           </div>';

            if (isset($_SESSION['ADMIN']))
            {
                if ((MODIFICATION & $_SESSION['AUTORISATION']) == MODIFICATION)
                    {
                        $ex = 'form_contenu&amp;ID_CONTENU='.$id_contenu.'';}
                else
                    {
                        $ex= 'page&amp;ID_ITEM='.$_REQUEST['ID_ITEM'].'';
                    }

                $li .= '<li '.$classLi.'><a href="../Php/index.php?EX='.$ex.'&amp;ITEM='.$_REQUEST['ITEM'].'#'.$id_contenu.'">'.$titre.'</a></li>';

            }
            else
                {
                    $li .= '<li '.$classLi.'><a href="#panel'.$id_contenu.'">'.$titre.'</a></li>' ;
                }
        }

        echo<<<HERE
<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-tabs data-sticky data-options="marginTop:7;" id="example-tabs">
               $li
               $nouveau
               $aucun
            </ul>
        </div>
        <div class="cell medium-9">
            <div class="tabs-content" data-tabs-content="example-tabs">
                $div
                <h2>$aucun</h2>
             </div>
        </div>
    </div>
</div>
HERE;
        return;

    } // showPage
} // Vpages
