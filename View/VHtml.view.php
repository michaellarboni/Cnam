<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 07/11/2018
 * Time: 21:26
 */

class VHtml
{
    public function __construct(){}
    public function __destruct(){}

    function showHtml($_html)
    {
        (file_exists($_html)) ? include($_html) : include('../Html/construction.html.php');
    }
}

