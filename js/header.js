function showHeader(event) {
    document.getElementById('ss_menu').style.display = 'block';

    // Récupération de l'objet cliqué
    var target = event.target || event.srcElement;

    var buttons = document.getElementById('entete').getElementsByTagName('button');
    var nb_buttons = buttons.length;
    for (var i = 0; i < nb_buttons; ++i) {
        buttons[i].style.backgroundColor = '#fff';
        buttons[i].style.color = '#39798d';
    }

    target.parentNode.parentNode.getElementsByTagName('button')[0].style.backgroundColor = '#39798d';
    target.parentNode.parentNode.getElementsByTagName('button')[0].style.color = '#fff';

    // Récupération de l'attribut data-type
    var item = target.getAttribute('data-item');

    if ('inscription' == item) {
        // Affichage du sous-menu et initialisation des événenements sur les boutons
        changeContent('content', '../Php/index.php?EX=status_projet', '', 'initPaypal()');

        document.getElementById('ss_menu').innerHTML = '';
    } else {
        // Récupération de l'attribut data-categorie du père de l'objet cliqué
        var categorie = target.parentNode.getAttribute('data-categorie');

        if (categorie && categorie != 'forum') {
            var rep = actionForm('../Php/index.php?EX=first_item', 'CATEGORIE=' + categorie + '&ITEM=' + item);

            var callback = "initSs_menuContext(" + rep.ID_PAGE + "," + rep.ID_PAGE + ")";

            // Affichage du sous-menu et initialisation des événenements sur les boutons
            changeContent('ss_menu', '../Php/index.php?EX=ss_menu', 'CATEGORIE=' + categorie + '&ITEM=' + item, callback);
        } else {
            changeContent('ss_menu', '../Php/forum.php', 'EX=forum_menu', 'initSs_menuForum()');

            changeContent('content', '../Php/forum.php', 'EX=forum', 'initForum()');
        }
    }

    // Stoppe l'événement
    stopEvent(event);

}