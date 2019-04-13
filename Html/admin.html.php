<?php

    $insert = '';
    $update = '';
    $delete = '';

    if ((INSERTION & $_SESSION['AUTORISATION']) == INSERTION)
    {
        $insert .= '<li>INSERTION</li>';
    }
    if ((MODIFICATION & $_SESSION['AUTORISATION']) == MODIFICATION)
    {
        $update .= '<li>MODIFICATION</li>' ;
    }
    if ((SUPPRESSION & $_SESSION['AUTORISATION']) == SUPPRESSION)
    {
        $delete .= '<li>SUPPRESSION</li>' ;
    }

        echo<<<NOW
<div class="grid-x grid-padding-x align-center-middle text-center">
    <div>
        <h2>Bonjour, {$_SESSION['PRENOM']} {$_SESSION['NOM']} !</h2>
        <p>Votre niveau d'autorisation est: {$_SESSION['AUTORISATION']}</p>
        <ul>
            $insert
            $update
            $delete
        </ul>
    </div>
</div>
NOW;
