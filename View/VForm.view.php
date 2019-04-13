<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 26/03/2019
 * Time: 23:22
 */

class VForm
{
    public function __construct() {}
    public function __destruct()  {}

    /**
     * Affichage du formulaire de connexion
     */
    public function showFormConnect()
    {
        echo<<<HERE
<div class="connect-panel" id="connect-panel" data-toggler=".is-active">
    <a class="connect-panel-button" data-toggle="connect-panel">Accès membre</a>
    
    <form id="formConnect" name="formulaire_envoi_message" action="../Php/index.php" method="post">
        <input type="hidden" name="EX" value="admin" />
        <div class="row">
            <label>Login *
                <input type="text" id="login" name="LOGIN" placeholder="Login" required="required" value="" size="10" maxlength="10" />
            </label>
        </div>
        <div class="row">
            <label>Mot de passe *
                <input type="password" id="pwd" name="PASSWORD" placeholder="Mot de passe" required="required" value="" size="10" maxlength="10" />
            </label>
        </div>
        <div class="connect-panel-actions">
            <button class="cancel-button" data-toggle="connect-panel">Annuler</button>
            <input type="submit" class="button submit-button" value="Se connecter">
        </div>
    </form>
</div>
HERE;

    } //showFormConnect()

    /**
     * Affichage du formulaire de contact
     */
    public function showFormContact()
    {
        echo<<<HERE
<div class="contact-panel" id="contact-panel" data-toggler=".is-active">
    <a class="contact-panel-button" data-toggle="contact-panel">Contactez nous</a>
    
    <form id="formContact" name="formulaire_envoi_message" method="POST" action="../Php/index.php?EX=sendMail">

        <div class="row">
            <label>Nom *
                <input type="text" id="nom" name="nom" placeholder="Nom" required="required" value="" class="erreurLab">
            </label>
        </div>
        <div class="row">
            <label>Email *
                <input type="email" id="email" name="email" placeholder="Email" required="required" value="" class="erreurLab">
            </label>
        </div>
        <div class="row">
            <label>Message *
                <textarea id="msg" name="message" placeholder="Entrez votre message ici" required="required" class="erreurLab" rows="3"></textarea>
            </label>
        </div>
        <div class="contact-panel-actions">
            <input type="submit" class="button submit-button" value="Envoyer">
            <button class="cancel-button" data-toggle="contact-panel">Annuler</button>
        </div>
    </form>
</div>
HERE;

    } //showFormContact

    /**
     * Affichage du formulaire items
     * @param array données des items
     *
     * @return
     */
    public function showFormItem($_data)
    {
        if (isset($_data['ID_ITEM']))
        {
            $ex   	   = 'update_item&ID_ITEM='.$_data['ID_ITEM'].'&ITEM='.$_data['ITEM'];
            $item 	   = $_data['ITEM'];
            if ((SUPPRESSION & $_SESSION['AUTORISATION']) == SUPPRESSION)
            {
                $supprimer ='<button class="cancel-button submit-button"><a href="../Php/index.php?EX=delete_item&amp;ID_ITEM='.$_data['ID_ITEM'].'">Supprimer cet item</a></button>';
            }
            else{$supprimer = '' ;}

        }
        else
        {
            $ex   	   = 'insert_item' ;
            $item 	   = '' ;
            $supprimer = '' ;
        }

        echo <<<HERE

    <section class="contact-us-section">
      <!--<div class="row medium-unstack" style="text-align: center" >-->
      <div class="row medium-unstack" style="text-align: center" >
        <div class="columns">

          <h1 class="contact-us-header">$item</h1>

          <form class="" action="../Php/index.php?EX=$ex" method="post">

            <label for="item">Item</label>
            <input id="item" name="ITEM" value="$item" size="25" required="required" maxlength="50" />

            <div class="contact-panel-actions">
              <input type="submit" class="button submit-button" value="Ok"/>
            </div>
            $supprimer
            <div>  
            </div>

          </form>
        </div>
      </div>
    </section>

HERE;
        return;
    } //  showFormItem()

    /**
     * Affichage du formulaire
     * @param array données du contenu
     *
     * @return
     */
    public function showFormContenu($_data)
    {
        $id_item = isset($_data['ID_ITEM']) ? $_data['ID_ITEM'] : '';

        if (isset($_data['ID_CONTENU']))
        {
            $ex = 'update_contenu&ID_CONTENU=' . $_data['ID_CONTENU'] . '&ID_ITEM=' . $_data['ID_ITEM'] . '&ITEM=' . $_data['ITEM'];
            $titre = $_data['TITRE'];
            $texte = $_data['TEXTE'];
            $paragraphe = $_data['PARAGRAPHE'];
            $id_contenu = $_data['ID_CONTENU'];

            if ((SUPPRESSION & $_SESSION['AUTORISATION']) == SUPPRESSION)
            {$supprimer = '<p class="supprimer"><a href="../Php/index.php?EX=delete_contenu&amp;ID_CONTENU=' . $_data['ID_CONTENU'] . '&ID_ITEM=' . $_data['ID_ITEM'] . '&ITEM=' . $_data['ITEM'] . '">Supprimer la fiche</a></p>';}
            else {$supprimer = '' ;}
        }
        else
            {
                $ex = 'insert_contenu&ID_ITEM=' . $_data['ID_ITEM'] . '&ITEM=' . $_data['ITEM'];
                $titre = '';
                $texte = '';
                $paragraphe = '';
                $id_contenu = '';
                $supprimer = '';
            }


        echo <<<HERE
    <section class="contact-us-section">
      <div class="row medium-unstack">
        <div class="columns contact-us-section-right">
          <h1 class="contact-us-header">Formulaire</h1>
          <form class="contact-us-form" action="../Php/index.php?EX=$ex" method="post">
         
            <label for="titre" id="champTitre" >Titre</label>
            <input id="titre" type="text" name="TITRE" required="required" value="$titre" placeholder="Titre">
            
            <label for="texte" id="champTexte" >Texte</label>
            <textarea id="texte" name="TEXTE" placeholder="" rows="6">$texte</textarea>
            
            <label for="Paragraphe" id="champParagraphe">Paragraphe</label>
            <textarea id="paragraphe" name="PARAGRAPHE" placeholder="" rows="4">$paragraphe</textarea>
            
            <div>
                <input id="id_item" name="ID_ITEM" value="$id_item" size="25" maxlength="100" type="hidden"/>       
                <input id="id_contenu" name="ID_CONTENU" value="$id_contenu" size="25" maxlength="50" type="hidden"/>
            </div>
                 
            <div class="contact-us-form-actions" >
              <input type="submit" class="button" value="Valider"/>
               <button class="cancel-button"><a href="../Php/index.php?EX=page&ID_ITEM=$id_item&ITEM={$_data['ITEM']}" class="cancel-button" >Annuler</a></button>
            </div>
            
          </form>
            $supprimer
        </div>
      </div>
    </section>

HERE;
        return;

    } // showForm
} //VForm