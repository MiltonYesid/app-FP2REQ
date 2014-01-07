<?php

//include('browser_class_inc.php');
//$br = new browser();
//
//$br->whatBrowser();
//$version = $br->version;
//$navegador = $br->browsertype;
//$platform = $br->platform;
//
//echo ''.$navegador.' </br>';
//echo ''.$version.' </br>';
//echo ''.$platform.' </br>';
//
//
//<?ph
# Browser
class Browser {
    # Forma de uso
    # $Nav  = new Browser;
    # $Nav->Iniciar();  # Inicia el constructor
    # $Nav->Navegador;  # Devuelve el navegador [String]
    # $Nav->Version;    # Devuelve la version [Int:Entero]
    # $Nav->Sistemao;   # Devuelve el Sistema Operativo [String]
    # Variables

    public $User_Agent = NULL;
    public $Navegador = NULL;
    public $Version = NULL;
    public $SistemaO = NULL;

    # Constructor

    public function Iniciar() {

        # Constructor
        $this->User_Agent = $_SERVER['HTTP_USER_AGENT'];

        # Funciones
        $this->Navegador();
        $this->Version();
        $this->SO();
        return $this->Navegador;
    }

    # Detectar

    public function Navegador() {

        if (preg_match('/MSIE/i', $this->User_Agent))
            $this->Navegador = "MSIE";
        if (preg_match('/Opera/i', $this->User_Agent))
            $this->Navegador = 'Opera';
        if (preg_match('/Firefox/i', $this->User_Agent))
            $this->Navegador = 'Firefox';
        if (preg_match('/Safari/i', $this->User_Agent))
            $this->Navegador = 'Safari';
        if (preg_match('/Chrome/i', $this->User_Agent))
            $this->Navegador = 'Chrome';
    }

    # Version

    private function Version() {


        if ($this->Navegador !== 'Opera' && preg_match("#(" . strtolower($this->Navegador) . ")[/ ]?([0-9.]*)#", strtolower($this->User_Agent), $match))
            $this->Version = floor($match[2]);

        if ($this->Navegador == 'Opera' || $this->Navegador == 'Safari' && preg_match("#(version)[/ ]?([0-9.]*)#", strtolower($this->User_Agent), $match))
            $this->Version = floor($match[2]);
    }

    # Sistema Operativo

    private function SO() {

        if (preg_match("/win/i", $this->User_Agent))
            $this->SistemaO = 'Windows';
        if (preg_match("/linux/i", $this->User_Agent))
            $this->SistemaO = 'Linux';
        if (preg_match("/mac/i", $this->User_Agent))
            $this->SistemaO = 'Macintosh';
    }

}

include_once 'funcionesContenido.php';
//include_once 'encabezado.php';
$b = new Browser();
$navegador = "" . $b->Iniciar();
$Chrome = "Chrome";
if ($navegador != $Chrome) {
    echo '<html>
    <head>
        <title>FP2REQ  |   from processes to requirements</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-panels.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
        <?php
        ?>
    </head>
    <body>
    <CENTER><img src="images/mejores-extensiones-chrome-web-store-650x450.jpg" width="200" height="200" alt="google_chrome_android"/></CENTER>';


    echo "<CENTER>FP2REQ |  THIS VERSION , NEED USED  THE CHROME BROWSER</CENTER>";
    ECHO '<div >
<center>
            <!-- Copyright -->
            <div class="copyright"><HR>
                <p><center>&copy; 2012 FP2REQ. All rights reserved.</p>
                <ul class="menu"><HR>
                    <li>Design: <a href="">FP2REQ</a></li>
                   
                </ul>
            </div>
</center>
        </div>

    </body>
</html>';
} else {
    include_once 'encabezado.php';
      if(!isset($_SESSION["pass"]) )
            { 
        echo "<CENTER>FP2REQ |  PLEASE ,<a href='../viewHome/home.php'> LOGIN NOW</a></CENTER>";
        ECHO '<div >
<center>
            <!-- Copyright -->
            <div class="copyright"><HR>
                <p><center>&copy; 2012 FP2REQ. All rights reserved.</p>
                <ul class="menu"><HR>
                    <li>Design: <a href="">FP2REQ</a></li>
                   
                </ul>
            </div>
</center>';
        volverHome();
    } else {
        include_once 'contenido.php';
        include_once 'piePagina.php';
    }
}
