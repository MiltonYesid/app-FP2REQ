<?php
            //variable para a validacion de cuenta
            $methods[] = "verify";
            for($i = 0 ; $i < count($methods) ; $i++)
            {
                $xajax->registerFunction($methods[$i]);
            }
            $xajax          ->processRequests("utf-8");
            //se requiere documentacion de manejo de dichas variables
            $seccion        = $_SESSION["pass"];
            $idProject      = $_SESSION["permisosDeMenu"];
            $opt            = $_SESSION["crude"];
            $ref            = $_SESSION["ref"];    
            //los elementos de la plantilla
            $uiAdminPlantilla->muestreEncabezado();
            include_once '../Plantilla/Menus/menuUsuario.php';
            
            include_once '../Plantilla/Menus/menu.php';
            //este metodo es lo que me muestra la pantalla estatica
            
            echo "<div class=parte1><table><tr><td>";
            $dir = "../ListMenu/exampleMenu.php";
            $text = "
                <iframe src=$dir width='210px' height='900px'  scrolling='no' ></iframe></td></tr></table>";
            echo $text;
            echo "</div><div class='parte'>";


            mostrarContenido($ref);
            
            //el administrador de plantilla me imprime el pie de pagina
            $uiAdminPlantilla->muestrePiePagina();