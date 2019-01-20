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
        <meta http-equiv="content-type" content="text/html" />
        <meta name="viewport" content="width=device-width" />
        <title><?=$content['title'];?></title>
        <link rel="stylesheet" href="../css/app.css">
        <!--link rel="stylesheet" href="../css/monstyle.css"-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
        <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    </head>
    <body>
        <header>
            <?=$vheader->showHeader()?>
        </header>
        <div id="content" class="align-center">
            <?php $vcontent->{$content['method']}($content['arg']);?>
        </div>
        <script src="../js/changeContent.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
        <script>$(document).foundation();</script>
    </body>
</html>
