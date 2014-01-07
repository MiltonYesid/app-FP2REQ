<?php
/* @var $answer xajaxResponse*/
/* @var $controllerAnalyst AnalystsController */

function updateCount($fn,$la,$pos,$org,$email)
{
    
    $idAnalyst = getIdAnalyst();
    global $answer;
    global $controllerAnalyst;
    $respuesta = $answer;
    $text = "<hr>field empty or incorrect:";
    $div = "answer";
    if(!comprobar_string($fn))
    {
       $text .= "first name<hr>";
       $respuesta->addAssign($div, "innerHTML", $text);
       return $respuesta;
    }
    if(!comprobar_string($la))
    {
        $text .= "last name<hr>";
        $respuesta->addAssign($div, "innerHTML", $text);
        return $respuesta;
    }
    if(!comprobar_string($pos))
    {
        $text .= "position<hr>";
        $respuesta->addAssign($div, "innerHTML", $text);
        return $respuesta;
    }
    if(!comprobar_string($org))
    {
        $text .= "organization<hr>";
        $respuesta->addAssign($div, "innerHTML", $text);
        return $respuesta;
    }
    if(!comprobar_email($email))
    {
        $text .= "e-mail<hr>";
        $respuesta->addAssign($div, "innerHTML", $text);
        return $respuesta;
    }
    $controllerAnalyst->updateAnalyst($idAnalyst, $fn,$la,$pos,$email,$org);
    $text = "<hr>Analyst Update<hr>";
    $_SESSION["email"] = $email;
    $respuesta->addAssign($div, "innerHTML", $text);
    $respuesta->addRedirect("home.php");
    return $respuesta;
    
}
function hello()
{
    global $answer;
    $answer->addAlert("hola");
    return $answer;
}
function comprobar_string($string) {
    if($string == "")
    {
        return false;
    }
    if(count($string)>0)
    {
    //compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
    for ($i = 0; $i < strlen($string); $i++) {
        if (strpos($permitidos, substr($string, $i, 1)) === false) {
            $error = false;
            return $error;
        }
    }
    }else
    {
        return false;
    }
    return true;
}

function encriptado($text) {
    $encripted_pass = sha1(md5($text));
    return $encripted_pass;
}

function comprobar_email($email) {
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email, "@") == 1) && (substr($email, 0, 1) != "@") && (substr($email, strlen($email) - 1, 1) != "@")) {
        if ((!strstr($email, "'")) && (!strstr($email, "\"")) && (!strstr($email, "\\")) && (!strstr($email, "\$")) && (!strstr($email, " "))) {
            //miro si tiene caracter .
            if (substr_count($email, ".") >= 1) {
                //obtengo la terminacion del dominio
                $term_dom = substr(strrchr($email, '.'), 1);
                //compruebo que la terminación del dominio sea correcta
                if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {
                    //compruebo que lo de antes del dominio sea correcto
                    $antes_dom = substr($email, 0, strlen($email) - strlen($term_dom) - 1);
                    $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
                    if ($caracter_ult != "@" && $caracter_ult != ".") {
                        $mail_correcto = 1;
                    }
                }
            }
        }
    }
    if ($mail_correcto)
        return true;
    else
        return false;
}
$methods[]= 'updateCount';
$methods[]= 'hello';