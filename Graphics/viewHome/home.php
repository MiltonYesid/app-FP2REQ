<?php
session_start();

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
        <script src="../view/js/jquery.min.js"></script>
        <script src="../view/js/skel.min.js"></script>
        <script src="../view/js/skel-panels.min.js"></script>
        <script src="../view/js/init.js"></script>
        <noscript>
        <link rel="stylesheet" href="../view/css/skel-noscript.css" />
        <link rel="stylesheet" href="../view/css/style.css" />
        <link rel="stylesheet" href="../view/css/style-wide.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="../view/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="../view/css/ie8.css" /><![endif]-->
        <?php
        ?>
    </head>
    <body>
    <CENTER><img src="../view/images/mejores-extensiones-chrome-web-store-650x450.jpg" width="200" height="200" alt="google_chrome_android"/></CENTER>';


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
    require ('../xajax/xajax.inc.php');
    $xajax = new xajax;
    include_once 'functionsPresentation.php';

    if ($xajax != null) {
        include_once 'encabezado.php';
    }
    ?>
    <body class="homepage">
        <!-- Header Wrapper -->
        <div id="header-wrapper" class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Header -->
                        <div id="header">

                            <!-- Logo -->
                            <div id="logo">
                                <h1><a href="#">FP2REQ</a></h1>
                                <span class="byline">From Processes to Requirements</span><br><br><br>
                            </div>

                            <!-- /Logo -->
                            <!-- Nav -->


                            <!-- Nav -->

                            <?php
                            include_once'barraMenu.php';
                            ?>


                            <!-- /Nav -->
                            <div id ="nuevo">
                                <div ><center>
                                        <table><tr>
                                                <td><input type="text"  name="email"  placeholder="E-mail" id="email" value=""/> </td>
                                                <td><input  id="pass" type="password" name="pass" value="" placeholder="Password"/></td>
                                                <td><a href="#ok" class="button button-style1" onClick="xajax_login(email.value, pass.value)">login</a></li></td>
                                                </center>
                                            </tr></table>
                                </div>

                            </div>
                            <div  id="AnswerAnalyst"></div>
                        </div>
                        <!-- /Header -->

                    </div>
                </div>
            </div>
            <!-- /Header Wrapper -->

            <!-- Intro Wrapper -->
            <div id="" class="wrapper wrapper-style1">
                <div>

                    <!-- Intro -->
                    <section id="intro">


                        <p class="style3">"Requirements elicitation is a critical stage in software development. With the aim to support the Requirements Engineer (RE) in this difficult task; we have developed FP2Req (From Processes To Requirements). From process models, the proposal guides the RE in the formulation and response of critical questions to finally discover a set of pertinent requirements for the system to build."A.J</p>
                        <!--
                        <p class="style3">Mauris tellus lacus, tincidunt eget mattis at, laoreet vel velit. 
                        Aliquam diam ante, aliquet sit amet vulputate lorem at placerat at nisl. 
                        Maecenas et gravida ligula sed lacus euismod tincidunt nullam eget justo orci.</p>
                        -->


                    </section>
                    <!-- /Intro -->

                </div>

            </div>
            <!-- /Intro Wrapper -->
            <?php
            include_once 'piePagina.php';
        }
        ?>
        


