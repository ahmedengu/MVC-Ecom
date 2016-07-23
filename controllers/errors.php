<?php
require_once(__DIR__ . "/../inc.php");

function not_found()
{
    error_log("404 " . __DIR__ . " " . $_SERVER["REQUEST_URI"]);
    echo "404";

}