function changeDisplay()
{

    var tabsContent = document.getElementsByClassName('tabs-content');
    for (var i =0; i < tabsContent.length; i++)
    {
        tabsContent[i].visibility = 'hidden';
    }


    if (document.getElementById())

    var panel = document.getElementsByClassName('tabs-panel');
    panel.style.display = (panel.style.display == 'block') ? 'none' : 'block' ;

    return;


}

function afficher_cacher(id)
{

    if(document.getElementById(id).style.visibility =="hidden")
    {
        document.getElementById(id).style.visibility="visible";
    }
    else
    {
        document.getElementById(id).style.visibility="hidden";
    }

}

function initialisation()
{

    var tabsContent = document.getElementsByClassName('tabs-panel');

    for(var i=0; i < tabsContent.length;i++) {

        tab[i].style.visibility = 'hidden';

    }
}