<?php
include_once '../base.php';
//variable para a validacion de cuenta
$methods[] = "verify";
include_once 'Page/funcionesXajax.php';
include_once 'Count/ctlrCount.php';
$typeMenu = $_SESSION["typeMenu"];
switch ($typeMenu) {
    case 1:
        break;
    case 2:
        include_once '../ASM/new.php';
        include_once '../ASM/select.php';
        break;
    case 3:
        include_once '../Taxonomies/UItaxonomies.php';
        break;
    case 4:
        include_once '../Questions/UIquestionStructure.php';
        break;
    case 5:
        include_once '../Questions/UIinstantiateQuestions.php';
        break;
    case 6:
        include_once '../Questions/Question.php';
        break;
}



//include_once '../Questions/UIinstantiateQuestions.php';
for ($i = 0; $i < count($methods); $i++) {
    $xajax->registerFunction($methods[$i]);
}
$xajax->processRequests("utf-8");
//se requiere documentacion de manejo de dichas variables
$seccion        = $_SESSION["pass"];
$idProject      = $_SESSION["permisosDeMenu"];
$opt            = $_SESSION["crude"];
$ref            = $_SESSION["ref"];
?>
<html>
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
        $xajax->printJavascript("../xajax/");
        ?>
    </head>
    <body onload='xajax_volverHome()'>


        <!-- Header -->

        <?php
        if(isset($_SESSION["pass"]) )
            {
            echo '<div id="header" class="skel-panels-fixed">';
            include_once 'menu.php';
            ?>


            <div class="top">

                <!-- Logo -->
                <div id="logo"><br>
                    <img src="" width="100" height="100"/>

                    <h1 id="title"><? echo getUserName(); ?></h1>
                    <span class="byline"><? echo getTypeCount(); ?></span>
                    <span class="byline"><a  href="#profile" onClick="xajax_nextPage(0)">Account Settings</a></span>
                    <span class="byline"><a  href="#exit" onClick="xajax_salir()">Log out</a></span>
                </div>

                <!-- Nav -->

                <nav id="nav">

                    <ul>
                        <?php
                        include_once'menuUser.php';
                        ?>
                    </ul>
                </nav>

            </div>

            <div class="bottom">

                <!-- Social Icons -->
                <ul class="icons">
                    <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
                    <li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
                    <li><a href="#" class="icon icon-github"><span>Github</span></a></li>
                    <li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
                    <li><a href="#" class="icon icon-envelope"><span>Email</span></a></li>
                </ul>

            </div>


            <?
            echo "</div>";
        }
        ?>