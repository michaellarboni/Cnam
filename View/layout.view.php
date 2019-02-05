<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 07/11/2018
 * Time: 21:20
 */

global $content;
$vheader  = new VHeader();
$vcontent = new $content['class']();
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <!--meta http-equiv="content-type" content="text/html" /-->
        <meta name="viewport" content="width=device-width" />

        <title><?=$content['title'];?></title>

        <link rel="stylesheet" href="../Foundation/css/app.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">

    </head>
    <body>
        <header>
            <?=$vheader->showHeader()?>
        </header>

        <main>
            <?php $vcontent->{$content['method']}($content['arg']);?>
        </main>

        <script src="../Foundation/node_modules/jquery/dist/jquery.js"></script>
        <!--script src="../Foundation/node_modules/what-input/dist/what-input.js"></script-->
        <script src="../Foundation/node_modules/foundation-sites/dist/js/foundation.js"></script>
        <script src="../Foundation/js/app.js"></script>
        <script src="../js/changeContent.js"></script>
        <!--script src="../js/foundation.core.js"></script-->
        <!--script src="../js/foundation.tabs.js"></script-->
        <!--script src="../js/foundation.util.imageLoader.js"></script-->
        <!--script src="../js/foundation.util.keyboard.js"></script-->
        <noscript>Votre navigateur n'accepte pas Javascript. Pour une expérience optimale, il est fortement conseillé d'activer cette option.</noscript>
    </body>
</html>
