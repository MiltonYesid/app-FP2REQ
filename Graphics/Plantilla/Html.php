<?php
CLASS ObjectHTML 
{
    private $openTable          = "<TABLE";
    private $closeTable         = "</TABLE>";
    private $openTr             = "<TR";
    private $closeTr            = "</TR>";
    private $openTd             = "<TD";
    private $closeTd            = "</TD>";
    private $openBody           = "<BODY";
    private $closeBody          = "</BODY>";
    private $salto              = "<BR>";
    private $barra              = "<HR>";
    private $openCenter         = "<CENTER>";
    private $closecenter        = "</CENTER>";
    private $openDiv            = "<DIV";
    private $closeDiv           = "</DIV>";
    private $closeForm          = "</FORM>";
    private $Ocuadro            = "<LEGEND>";
    private $Ccuadro            = "</LEGEND>";
    private $OH1                = "<H1>";
    private $CH1                = "</H1>";
    private $OH2                = "<H2>";
    private $CH2                = "</H2>";
    private $OH3                = "<H3>";
    private $CH3                = "</H3>";
    function ObjectHTML()
    {
        
    }
    //body
    function OBody($param)
    {
        echo $this->openBody." id=".$param.">";
    }
    function CBody()
    {
        echo $this->closeBody;
    }
    //div
    function ODiv($param)
    {
        echo $this->openDiv." id=".$param.">";
    }
    function CDiv()
    {
        echo $this->closeDiv;
    }
    //table
    function Otable($param)
    {
        echo $this->openTable." id=".$param.">";
    }
    function Ctable()
    {
        echo $this->closeTable;
    }
    //tr
    function Otr($param)
    {
        echo $this->openTr." id=".$param.">";
    }
    function Ctr()
    {
        echo $this->closeTr;
    }
    //td
    function Otd($param,$align)
    {
        echo $this->openTd." id='$param' ALIGN='$align'>";
    }
    function Ctd()
    {
        echo $this->closeTd;
    }
    //salto
    function salto()
    {
        echo $this->salto;
    }
    //barra
    function barra()
    {
        echo $this->barra;
    }
    //Centrar
    function Ocenter()
    {
        echo $this->openCenter;
    }
    function Ccenter()
    {
        echo $this->closecenter;
    }
    //importar Css
    function importCss($param)
    {
        echo"<link href='".$param."' rel='stylesheet' type='text/css' media='screen' />";
    }
    //importar js
    function importJs($param)
    {
        echo "<script language='javascript' type='text/javascript' src='$param'></script>";
    }
    //crear boton
    function boton($id,$name,$value)
    {
       echo " <input id='".$id."' type='SUBMIT' name='".$name."' value='".$value."'>";
    }
    //crear caja
    function caja($id,$name,$value)
    {
       echo "<input id='".$id."' type='TEXT' name='".$name."' value='".$value."'></input>";
    }
    //crear password
    function password($id,$name,$value)
    {
        echo "<input id='".$id."' type='PASSWORD' name='".$name."' value='".$value."'></input>";
    }
    //form
    function form($id,$direccion,$method,$name)
    {
        echo "<form id='$id' action='$direccion' method='$method' name='$name'>";
    }
    function closeForm()
    {
        echo $this->closeForm;
    }
    //Imag
    function imagen($id,$imagen,$width,$heigth,$align)
    {
        echo "<IMG id='$id' SRC='$imagen' WIDTH='$width' HEIGHT='$heigth' align='$align' >";
    }
    function show($text)
    {
        echo $text;
    }
    
    function OH1()
    {
        echo $this->OH1;
    }
    function CH1()
    {
        echo $this->CH1;
    }
     function OH2()
    {
        echo $this->OH1;
    }
    function CH2()
    {
        echo $this->CH1;
    } function OH3()
    {
        echo $this->OH1;
    }
    function CH3()
    {
        echo $this->CH1;
    }
    //cuadro
    function OCuadro()
    {
        echo $this->Ocuadro;
    }
    function CCuadro()
    {
        echo $this->Ccuadro;
    }
}   
?>