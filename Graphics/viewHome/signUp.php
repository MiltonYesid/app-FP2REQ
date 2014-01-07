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
        <div class="title">Sign Up</div><div>

                    <div align="center">
                        <tr>
                        <td>
                       First Name         
                        <center><input type="text" id="first_name"   /> </td><td><div id="okName"></div>
                        </tr><br>
                        <tr>
                            Last Name   : 
                            <center><input type="text" id="last_name"  /><div id="okLastName"></div>
                        </tr><br>
                        <tr>
                            Organization   : 
                           <center> <input type='text' id="organization"  /><div id="okOrg"></div>
                        </tr><br>
                        <tr>
                            Position   : 
                           <center> <input type='text' id="position"  /><div id="okPos"></div>
                        </tr><br>
                        <tr>
                            E-mail    :    
                                <center><input type='text'  id="mail"  value='@' /><div id="okEmail"></div>
                        </tr><br>
                        <tr>
                            Password:
                          <center> <input type='password' id="pass"   /><div id="okPass"></div>
                        </tr>
                        <br>
                        <div id="okSignup"></div>
                        <BR>
                        <a href="#register"  onClick="xajax_newAnalyst(first_name.value,last_name.value,organization.value,position.value,mail.value,pass.value)" class="button button-style1">Sign Up</a>
                    </div>

                
        </div>
    </div>
    <?php
    include_once'piePagina.php';
    ?>
