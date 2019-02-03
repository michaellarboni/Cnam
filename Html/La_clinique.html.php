<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-tabs id="example-tabs">
                <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Les spécialités</a></li>
                <li class="tabs-title"><a href="#panel2">L'équipe</a></li>
                <li class="tabs-title"><a href="#panel3">Adresse</a></li>
                <li class="tabs-title"><a href="#panel4">Horaires</a></li>
            </ul>
        </div>
        <div class="cell medium-9">
            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel is-active" id="panel1">
                    <?php include('Les spécialités de la clinique.html.php');?>
                </div>
                <div class="tabs-panel" id="panel2">
                   <?php include('L\'équipe.html.php');?>
                </div>
                <div class="tabs-panel" id="panel3">
                    <?php include('adresse.html.php');?>
                </div>
                <div class="tabs-panel" id="panel4">
                    <?php include('horaires.html.php');?>
                </div>
            </div>
        </div>
    </div>
</div>