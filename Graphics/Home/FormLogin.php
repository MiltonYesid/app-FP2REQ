<?php 
        include('../Plantilla/Html.php');
        $objectHtml     =  new ObjectHTML();
        $imagen         =  "../Plantilla/images/logo2.png";
        $rutaController = "../Controllers/AnalystsController.php";
        $objectHtml     -> importCss("CSS/estilo.css");
        $objectHtml     -> importJs("JS/ajax.js");
        echo ' <td><div id="site_title"></td><td></td>'; 
        echo '</h7><center>';
        $objectHtml ->Otable("");
        $objectHtml ->Otr(null);
        echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>";
        $objectHtml ->imagen(null, $imagen, 200, 70, "left");
        echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
        $objectHtml ->Otd("cabezapie","CENTER");
        $objectHtml ->show("E-mail");
        $objectHtml ->caja("email","email",null);
        echo' <br>';
        echo' <br>';
        $objectHtml ->Ctd();
        $objectHtml ->Otd("cabezapie","CENTER");
        $objectHtml ->show("Password");
        $objectHtml ->password("password", "password", null);
        echo' <br>';
        echo "<A HREF='#' id='as' onClick='xajax_olvidarContrasena(email.value)'>Forgot your password</a><br> ";
        $objectHtml ->Ctd();
        $objectHtml ->Otd("cabezapie","CENTER");
        ECHO" <input type='submit' id='boton'  value='LOGIN'  style='WIDTH: 158px; HEIGHT: 30px' onClick=xajax_login(email.value,password.value) >";
        $objectHtml ->Ctd();
        echo "<td><div id='AnswerGetAnalyst'></div></td></tr>";
        $objectHtml ->Ctable();
?>