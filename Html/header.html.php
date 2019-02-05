<?php

global $li;
global $nouveau;
global $deconnexion;
global $admin;

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
         <div class="title-bar">
            <div id="logoContact">
                <a href="../Php/index.php?EX=page&ITEM=contact"><img src="../Img/logo-contact.png" alt="logoContact"></a>
            </div>
         </div>
        </div>

        <div class="title-bar-right">
            <ul class="menu align-center">
                $li
                $nouveau
                $deconnexion
                $admin
            </ul>
        </div>
     </div>
</div>   
NOW;



//        <div>
//            <a id="logoContact" href="../Php/index.php?EX=page&ITEM=contact"><img src="../Img/logo-contact.png"</a>
//        </div>

//$admin
