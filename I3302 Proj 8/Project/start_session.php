<?php
include_once ('methods.php');
session_start();

if (!isset($_SESSION['project']))
    $_SESSION['project'] = new Lists();
$array= $_SESSION['project'];

?>