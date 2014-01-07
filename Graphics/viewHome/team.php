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
    <div class="title">The Team</div><div><center>
            <article>


                <h3>Project Managers</h3>

                <p><h3>Mme. Colette Rolland</h3>France - CRI (Centre de Recherche en Informatique)</p>
                <p><h3>Germ&aacuten Urrego G<br>Aldrin Fredy Jaramillo F</h3>Colombia - University of Antioquia</p>

                <h3>Developers</h3>


                <p><h3>Alejandro Su&aacuterez G.<br>Milton Yesid Fern&aacutendez G.</h3>Colombia - University of Antioquia</p>
            </article>
    </div>
</div>

<?php
include_once'piePagina.php';
?>
