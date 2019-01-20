<?php
global $li;
global $nouveau;
global $deconnexion;

echo<<<NOW

<div class="top-bar">
	<div class="top-bar-left">
		<ul class="menu">
			<li class="menu-text">Cat Clinique</li>
		</ul>
	</div>
	<div class="top-bar-right">
		<ul class="menu">
            $li
            $nouveau
            $deconnexion
		</ul>
	</div>
</div>

<div id="admin"><a href="../Php/index.php?EX=admin">A</a></div>
    
NOW;

