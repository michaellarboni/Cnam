<?php

global $li;
global $nouveau;
global $deconnexion;
global $admin;

echo<<<NOW

<div class="top-bar">

        <div class="top-bar-title">
            <h1 class=""><a href="../Php/index.php">Cat Clinic</a></h1>
        </div>

        <div class="top-bar-right">
            <ul class="menu">
                $li
                $nouveau
                $deconnexion
                $admin
            </ul>
        </div>
</div>
    
NOW;
