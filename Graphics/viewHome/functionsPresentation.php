<?php

include_once '../../Controllers/AnalystsController.php';
//nuestro objeto de control de los eventos de la pagina
$AnalystsController = new AnalystsController();

function comprobar_string($string) {
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

function login($email, $password) {
    $respuesta = new xajaxResponse('utf-8');
    $mensaje = "";
    if (comprobar_email($email) && strlen($email) > 0) {
        if (strlen($password) > 0) {
            $password = encriptado($password);
            global $AnalystsController;

            $Analyst = $AnalystsController->getAnalyst($email, $password);
            if ($Analyst != null) {
                $nombre = $Analyst->getFirstName();
                $_SESSION["email"] = $Analyst->getEmail();
                $_SESSION["pass"] = $Analyst->getPassword();
                $_SESSION["ref"] = "verProjectos";
                $_SESSION["permisosDeMenu"] = "NO";
                $_SESSION["crude"] = "create";
                $_SESSION["typeMenu"] = 1;
                $respuesta->addRedirect("../view/home.php");
            } else {
                $respuesta->addAlert("you  don´t have no register associated with  your e-mail or password incorrect");
            }
        } else {
            $mensaje .="password required 6 characters";
            $respuesta->addAssign("AnswerAnalyst", "innerHTML", $mensaje);
        }
    } else {
        $mensaje .="Email incorrect ";

        $respuesta->addAssign("AnswerAnalyst", "innerHTML", $mensaje);
    }
    return $respuesta;
}

function newAnalyst($nombre, $apellido, $org, $posicion, $email, $contrasena) {
    $incorrecto = "  contains illegal characters or empty";

    $respuesta = new xajaxResponse('utf-8');
    $mensaje = "";

    if (strlen($nombre) > 0 && comprobar_string($nombre)) {
        $div = "okName";
        $mensaje .= "";
        $respuesta->addAssign($div, "innerHTML", $mensaje);
        if (comprobar_string($apellido) && strlen($apellido) > 0) {
            $div = "okLastName";
            $mensaje .= "";
            $respuesta->addAssign($div, "innerHTML", $mensaje);
            if (comprobar_email($email) && strlen($email) > 0) {
                $div = "okEmail";
                $mensaje .= "";
                $respuesta->addAssign($div, "innerHTML", $mensaje);
                if (comprobar_string($org) && strlen($org) > 0) {
                    $div = "okOrg";
                    $mensaje .= "";
                    $respuesta->addAssign($div, "innerHTML", $mensaje);
                    if (comprobar_string($posicion) && strlen($posicion) > 0) {
                        $div = "okPos";
                        $mensaje .= "";
                        $respuesta->addAssign($div, "innerHTML", $mensaje);
                        if (strlen($contrasena) > 5) {
                            $contrasena = encriptado($contrasena);
                            global $AnalystsController;
                            $tieneCuenta = $AnalystsController->getHaveCountSite($email);
                            if (!$tieneCuenta) {
                                $div = "okSignup";
                                $AnalystsController->createAnalyst($nombre, $apellido, $email, $contrasena, $org, $posicion);
                                $mensaje .= "Your registration has been successful.We sent to your e-mail the information provided on this site";
                                $respuesta->addAlert($mensaje);
                                $mensaje .= "";





                                $password = $contrasena;


                                $Analyst = $AnalystsController->getAnalyst($email, $password);
                                if ($Analyst != null) {
                                    $nombre = $Analyst->getFirstName();
                                    $_SESSION["email"] = $Analyst->getEmail();
                                    $_SESSION["pass"] = $Analyst->getPassword();
                                    $_SESSION["ref"] = "verProjectos";
                                    $_SESSION["permisosDeMenu"] = "NO";
                                    $_SESSION["crude"] = "create";
                                    $respuesta->addRedirect("../view/home.php");
                                }
                            } else {
                                $div = "okSignup";
                                $mensaje .= "<table><tr><td><center>Your registration has Not been successful.<a href=home.php>You have count in this site,click en here for login</a></td></tr></table>";
                            }
                        } else {
                            $div = "okPass";
                            $mensaje .= "The password must be at least 6 digits";
                        }
                    } else {
                        $div = "okPos";
                        $mensaje .= "position" . $incorrecto;
                    }
                } else {
                    $div = "okOrg";
                    $mensaje .= "Org" . $incorrecto;
                }
            } else {
                $div = "okEmail";
                $mensaje .= "email" . $incorrecto;
            }
        } else {
            $div = "okLastName";
            $mensaje .= "the lastname" . $incorrecto;
        }
    } else {
        $div = "okName";
        $mensaje .= "the name" . $incorrecto;
    }
    $respuesta->addAssign($div, "innerHTML", $mensaje);
    return $respuesta;
}

function forgotPassword($email) {
    $answer = new xajaxResponse;
    if (comprobar_email($email)) {
        
$titulo = 'Hi, FP2Req get you password';
$mensaje = 'Hola';
$cabeceras = 'From: fp2req@gmail.com' . "\r\n" .
    
    'X-Mailer: PHP/' . phpversion();

mail($email, $titulo, $mensaje, $cabeceras);
    } else {
        $answer->addAlert("the E-mail contains illegal characters or empty");
    }
    return $answer;
}

$xajax->registerFunction('newAnalyst');
$xajax->registerFunction('login');
$xajax->registerFunction('forgotPassword');
$xajax->processRequests("utf-8");
?>
