<?php
     session_start();
     include_once '../Plantilla/UIAdminPlantilla.php';
     include_once '../../Controllers/AnalystsController.php';
     $uiAdminPlantilla   = new UIAdminPlantilla();
     $xajax              = $uiAdminPlantilla->xajax;
     //nuestro objeto de control de los eventos de la pagina
     $AnalystsController = new AnalystsController();
     function encriptado($text){
        $encripted_pass = sha1(md5($text));
        return  $encripted_pass;
    }
    function olvidarContrasena($email)
    {
        $respuesta = new xajaxResponse();
        require_once('../LibreriaEmail/class.phpmailer.php');
        if(comprobar_email($email) && strlen($email)>0 )
        {
            $mail             = new PHPMailer();
            $mail->IsSendmail();
            $mail->SetFrom('fp2req@fp2req.com', 'FROM PROCESS TO REQUIEREMENTS');
            $mail->AddAddress($email, "John Doe");
            
            
            $mail->Subject    = "ejemplo envio";

            $mail->AltBody    = "impresionante"; // optional, comment out and test
   $body             = file_get_contents('contents.html');
   $body = preg_replace('','',$body);
  
   
$mail->MsgHTML($body);
           if(!$mail->Send()) {
  $text="Mailer Error: " . $mail->ErrorInfo;
  $respuesta ->addAssign("AnswerCreateAnalyst", "innerHTML", $text);
} else {
  $text= "Message sent!";
   $respuesta ->addAssign("AnswerCreateAnalyst", "innerHTML", $text);
}
        }else
        {
            $text = "Write email,please";
            $respuesta ->addAssign("AnswerCreateAnalyst", "innerHTML", $text);
        }
        return $respuesta;
    }
    function login($email,$password){
        $respuesta  = new xajaxResponse('utf-8');
        $mensaje = "";
        if(comprobar_email($email) && strlen($email)>0)
        {
            if(strlen($password)>0)
            {
                $password = encriptado($password);
                global $AnalystsController;
                $Analyst = $AnalystsController->getAnalyst($email, $password);
                if($Analyst != null)
                {
                    $nombre                     = $Analyst->getFirstName();
                    $_SESSION["email"]          = $Analyst->getEmail();
                    $_SESSION["pass"]           = $Analyst->getPassword();
                    $_SESSION["ref"]            = "verProjectos";
                    $_SESSION["permisosDeMenu"] = "NO";
                    $_SESSION["crude"]          = "create";
                    $respuesta->addRedirect("../Projects/UIProject.php");
                }else
                {
                    $respuesta->addAlert("you  don´t have no register associated with  your e-mail or password incorrect");
                }
            }else
            {
                $mensaje .="password required 6 characters";
                $respuesta ->addAssign("AnswerCreateAnalyst", "innerHTML", $mensaje);
            }
        }else
        {
            $mensaje .="Email incorrect ";
            $respuesta ->addAssign("AnswerCreateAnalyst", "innerHTML", $mensaje);
        }
        return $respuesta;
    }
    function crearAnalyst($nombre,$apellido,$org,$posicion,$email,$contrasena){
        $incorrecto = "  contains illegal characters or empty";
        
        $respuesta  = new xajaxResponse('utf-8');
        $mensaje = "";
        if(comprobar_string($nombre) && strlen($nombre)>0)
        {
            if(comprobar_string($apellido) && strlen($apellido)>0)
            {
                if(comprobar_email($email) && strlen($email)>0)
                {
                    if(comprobar_string($org) && strlen($org)>0)
                    {
                        if(comprobar_string($posicion) && strlen($posicion)>0)
                        {
                                if(strlen($contrasena)>5)
                                {
                                       $contrasena = encriptado($contrasena);
                                       global $AnalystsController;
                                       $tieneCuenta = $AnalystsController->getHaveCountSite($email);
                                       if(!$tieneCuenta)
                                       {
                                           $AnalystsController->createAnalyst($nombre, $apellido, $email, $contrasena, $org, $posicion);
                                           $mensaje .= "<table><tr><td><h1>Your registration has been successful.</td><br><p>We sent to your e-mail the information provided on this site.</tr></table>";
                                       }else
                                       {
                                           $mensaje .= "<table><tr><td>Your registration has Not been successful.you have an account on the system</td></tr></table>";
                                       }
                                }else
                                {
                                    $mensaje .= "The password must be at least 6 digits";
                                }
                        }else
                        {
                            $mensaje .= "position".$incorrecto;
                        }
                    }else
                    {
                        $mensaje .= "Org".$incorrecto;
                    }
                }else
                {
                    $mensaje .= "email".$incorrecto;
                }
            }else
            {
                $mensaje .= "the lastname".$incorrecto;
            }
        }else
        {
            $mensaje .= "the name".$incorrecto;
        }
         $respuesta ->addAssign("AnswerCreateAnalyst", "innerHTML", $mensaje);
         return $respuesta; 
    }
    function comprobar_string($string){
        //compruebo que los caracteres sean los permitidos
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
        for ($i=0; $i<strlen($string); $i++){
            if (strpos($permitidos, substr($string,$i,1))===false){
                $error = false;
                return $error;
            }
        }
        return true;
    }
    function comprobar_email($email){
        $mail_correcto = 0;
        //compruebo unas cosas primeras
        if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
            if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
                //miro si tiene caracter .
                if (substr_count($email,".")>= 1){
                    //obtengo la terminacion del dominio
                    $term_dom = substr(strrchr ($email, '.'),1);
                    //compruebo que la terminación del dominio sea correcta
                    if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                        //compruebo que lo de antes del dominio sea correcto
                        $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                        $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                        if ($caracter_ult != "@" && $caracter_ult != "."){
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
    //registramos las funciones que hace nuestra vista
    $xajax->registerFunction('crearAnalyst');
    $xajax->registerFunction('login');
    $xajax->registerFunction('olvidarContrasena');
    $xajax->processRequests("utf-8");
    $uiAdminPlantilla->muestreEncabezado();
    include_once 'FormLogin.php';
    include_once 'contenidoPrincipal.php';    
    include_once'FormRegister.php'; 
    $uiAdminPlantilla->muestrePiePagina();
//FIN DE HOME.PHP