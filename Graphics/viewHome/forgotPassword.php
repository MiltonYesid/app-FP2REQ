<?php
session_start();
require ('../xajax/xajax.inc.php');
$xajax = new xajax;
include_once 'functionsPresentation.php';

        if($xajax != null)
        {
            include_once 'encabezado.php';
        }


?>
<body class="left-sidebar">
    <?php
    include_once'head.php';
    ?>
    
    <div class="wrapper wrapper-style2">
        <div class="title">Forgot Password </div><div>

                    <div align="center">
                        <tr>
                       
                        <tr>
                            Please, the FP2Req need your E-mail for password get :    
                                <center><input type='text'  id="mail"  value='@' /><div id="okEmail"></div>
                        </tr><br>
                        
                        <div id="okSignup"></div>
                        <BR>
                        <a href="#register"  onClick="xajax_forgotPassword(mail.value)" class="button button-style1">Get Password</a>
                    </div>

                
        </div>
    </div>
    <?php
    include_once'piePagina.php';
    ?>
