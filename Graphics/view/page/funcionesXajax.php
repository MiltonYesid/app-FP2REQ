<?php

function nextPage($id)
{
    /*@var $answer xajaxresponse*/
    global $answer;
    $answer->addRedirect("home.php");
    $_SESSION["typeMenu"] = $id;
    return $answer;
}
function lookProject()
{
    /*@var $answer xajaxresponse*/
    global $answer;
    $_SESSION["typeMenu"] = 1;
    $answer->addRedirect("home.php");
    $idProject = $_SESSION["permisosDeMenu"];
    return $answer;
}
function volverHome()
{
    /*@var $answer xajaxresponse*/
    global $answer;
    $answer->addRedirect("../viewHome/home.php");
    return $answer;
}
$methods[]= "nextPage";
$methods[]= "lookProject";
$methods[]= "volver";