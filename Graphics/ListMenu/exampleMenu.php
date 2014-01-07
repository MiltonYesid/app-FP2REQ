<?php
session_start();
?>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Responsive Multi-Level Menu - Demo 5</title>
        <meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects" />
        <meta name="keywords" content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../ListMenu/css/default.css" />
        <link rel="stylesheet" type="text/css" href="../ListMenu/css/component.css" />
        <script src="../ListMenu/js/modernizr.custom.js"></script>
    </head>
    
    <body>

        <div id ="here" ><IMG SRC="./images/clickhere.png" WIDTH="180" HEIGHT="40" alt=""></div>


        <div class="column">
            <div id="dl-menu" class="dl-menuwrapper">
                <button class="dl-trigger" value="menu project">Menu projects</button>
                <ul class="dl-menu">
                   
                    <?php
                              include_once '../../Controllers/AnalystsController.php';
                    include_once '../../Controllers/ProjectsController.php';
                    include_once '../../BusinessObjects/Analyst.php';
                    include_once '../../BusinessObjects/Project.php';
                    //nuestro objeto de control de los eventos de la pagina
                    $controllerAnalyst = new AnalystsController();
                    
                    if (($_SESSION["pass"] != "NO")) {
                        $analyst = $controllerAnalyst->getAnalyst($_SESSION["email"],$_SESSION["pass"]);
                        $id = $analyst->getIdAnalyst();

                        $controllerProject = new ProjectsController;
                        $listaProjectos = $controllerProject->getProjects($id);
                        for($i=0;$i < count($listaProjectos);$i++)
                        {
                            $text =  "<li><a href=''>".$listaProjectos[$i]->getName()."</a>";
                            $text .="<ul class='dl-submenu'>";
                            $text .='<li>
                                <a href="#">Description</a>
                                <ul class="dl-submenu">
                                    <li><a href="#">Des 1</a></li>
                                </ul>
                            </li>';
                            $text .='<li>
                                <a href="#">Diagrammers</a>
                                <ul class="dl-submenu">
                                    <li><a href="#">diagrammer 1</a></li>
                                </ul>
                            </li>';
                            $text .='<li>
                                <a href="#">Taxonomies</a>
                                <ul class="dl-submenu">
                                    <li><a href="#">taxonomy 1</a></li>
                                </ul>
                            </li>';
                            $text .='<li>
                                <a href="#">Questions</a>
                                <ul class="dl-submenu">
                                    <li><a href="#">question 1</a></li>
                                </ul>
                            </li>';
                            $text .='<li>
                                <a href="#">Answers</a>
                                <ul class="dl-submenu">
                                    <li><a href="#">answer 1</a></li>
                                </ul>
                            </li>';
                            $text .= "</ul>";
                            $text .= "</li>";
                            echo $text;
                        }
                    }
                        ?>
                    
                    
                    
                </ul>
            </div><!-- /dl-menuwrapper -->
        </div>
    </div>
</div><!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.dlmenu.js"></script>
<script>
    $(function() {
        $( '#dl-menu' ).dlmenu({
            animationClasses : { classin : 'dl-animate-in-4', classout : 'dl-animate-out-4' }
        });
    });
</script>
</body>

</html>
