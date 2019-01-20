<?php
global $li;
global $nouveau;
global $deconnexion;

echo<<<NOW

<div class="top-bar">
	<div class="top-bar-left">
		<ul class="menu">
		    <li id="logo"></li>
			<li class="menu-text"><a href="../Php/index.php">Cat Clinique</a></li>
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

