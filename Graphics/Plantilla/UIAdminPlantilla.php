<?php
require ('../xajax/xajax.inc.php');
include_once '../Plantilla/Menus/ManagerMenu.php';
class UIAdminPlantilla
{
    public  $xajax ;
    public function UIAdminPlantilla()
    {
         $xajax = new xajax();
         $this->xajax = $xajax;
    }
    public function setXajax($xajax)
    {
        $this->xajax = $xajax;
    }
    public function muestreEncabezado()
    {
        $xajax = $this->xajax;
        if($xajax != null)
        {
            include_once 'Encabezado.php';
        }
    }
    public function muestrePiePagina()
    {
        include_once 'PiePagina.php';
    }
    public function ingresoContenido($url)
    {
        include_once $url;
    }
}

?>
