<?php

class VContact
{
    public function __construct() {}

    public function __destruct() {}

    public function showFormContact()
    {
        echo <<<NOW

<div class="grid-x grid-padding-x align-center-middle text-center">
    
    <form id="formContact" name="formulaire_envoi_message" method="POST" action="../Php/index.php?EX=sendMail">
        <h3>Contactez nous</h3>
    
        <div class="contactChamp">
            <input type="text" id="nom" name="nom" placeholder="Qui êtes-vous ?" required="required" value="" class="erreurLab">
            <label for="nom" style="width: 20%;" class="erreurLab">Nom *</label>
        </div>
    
        <div class="contactChamp">
            <input type="email" id="email" name="email" placeholder="Quelle est votre adresse Mail ?" required="required" value="" class="erreurLab">
            <label for="mail" style="width: 20%;" class="erreurLab">Mail *</label>
        </div>
    
        <div class="contactChamp">
            <input type="tel" id="tel" name="tel" placeholder="Quel est votre numéro ?" value="">
            <label for="tel" style="width: 20%;">Tel</label>
        </div>
    
        <div class="contactChamp">
            <input type="text" id="sujet" name="sujet" placeholder="Pour quel sujet vous contactez nous ?" required="required" value="" class="erreurLab">
            <label for="sujet" style="width: 20%;" class="erreurLab">Sujet *</label>
        </div>
    
        <div class="contactChamp">
            <textarea id="msg" name="message" placeholder="Tapez ici votre message..." required="required" class="erreurLab"></textarea>
            <label for="msg" style="width: 20%;" class="erreurLab">Message *</label>
        </div>
        
        <div>
            <div>
                <p>Voulez vous recevoir une copie du mail?</p>
            </div>
            <div>
               <label>oui</label>
               <input type="checkbox" name="copyMail" checked="checked"/>
            </div>
    
        <button type="submit" class="">Envoyer</button>
    
    </form>
</div>
NOW;

    }
}