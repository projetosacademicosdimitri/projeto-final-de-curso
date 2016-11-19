<?php

function __autoload($classname)
{
    $rest = substr($classname, -10, 10);
    if ($rest == "Controller") {
        require_once("controller/" . $classname . ".php");
    } else {
        require_once("model/" . $classname . ".php");
    }
}
