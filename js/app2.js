/**
 * Fichier Javascript appelant tous les autres fichiers
 */

var src = new Array();
var i = 0;


src[i++] = '../js/changeContent.js';
src[i++] = '../js/init.js';
src[i++] = '../js/contact-panel.js';
src[i++] = '../js/connect-panel.js';

for (var j = 0; j < i; ++j)
{
    document.write('<script language="javascript" type="text/javascript" src="' + src[j] + '"></script>');
}