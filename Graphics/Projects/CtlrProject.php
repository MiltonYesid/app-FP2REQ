<?php

function editar($idProject, $nameProject, $descripcion, $nameCompany) {
    $respuesta = new xajaxResponse();
    global $controllerProject;
    $editedProject = $controllerProject->getProject($idProject);
    $editedProject->setName($nameProject);
    $editedProject->setDescription($descripcion);
    $editedProject->setCompany_name($nameCompany);
    $controllerProject->editProject($editedProject);
    $respuesta = verInformacionDelProjecto($idProject);
    return $respuesta;
}

function editarProjecto($idProject) {
    $respuesta = new xajaxResponse();
    global $controllerProject;
    $project = $controllerProject->getProject($idProject);
    $nameProject = $project->getName();
    $description = $project->getDescription();
    $nameCompany = $project->getCompany_name();
    //publicacion
    $mensaje = getFormEditProject($nameProject, $nameCompany, $description, $idProject);
    $respuesta->addAssign("informacionProjectos", "innerHTML", $mensaje);
    return $respuesta;
}

function crearProjecto($nombre, $descripcion, $nombreCompania) {
    $respuesta = new xajaxResponse();
    $mensaje = "";
    if (strlen($nombre) > 0) {
        if (strlen($descripcion) > 0) {

            if (($_SESSION["pass"] != "NO")) {
                global $controllerAnalyst;
                $analyst = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
                $id = $analyst->getIdAnalyst();
                global $controllerProject;
                $controllerProject->createProject($id, "", $nombre, $descripcion, $nombreCompania);
                $respuesta = verProjecto("verProjectos");
            }
        } else {
            $mensaje .= "project description is empty";
            $respuesta->addAlert($mensaje);
        }
    } else {
        $mensaje .= "project name is empty";
        $respuesta->addAlert($mensaje);
    }
    return $respuesta;
}

function goProject($idProject) {
    $respuesta = new xajaxResponse();
    if($_SESSION["permisosDeMenu"]=="NO")
    {
        $_SESSION["permisosDeMenu"] = $idProject;
    $respuesta->addRedirect("home.php");
    }else
    {
    $_SESSION["permisosDeMenu"] = $idProject;
    $_SESSION["ref"] = "ninguno";
    $respuesta->addAssign("informacionProjectos", "innerHTML", "<H2>PROJECT SELECT</H2><BR><BR>");
    global $controllerProject;
    $projecto = $controllerProject->getProject($idProject);
    $mensaje = "" . $projecto->getName() . "";
    $respuesta->addAssign("menu", "innerHTML", $mensaje);
    }
    return $respuesta;
}

function eliminarProjecto($idProject) {
    $respuesta = new xajaxResponse();
    global $controllerProject;
    $controllerProject->deleteProject($idProject);
    $respuesta->addAlert("successfully desactive the project");
    return $respuesta;
}

function verInformacionDelProjecto($idProject) {
    $respuesta = new xajaxResponse();
    if ($idProject > 0) {
        $mensaje = buscarInfoProjectos($idProject);
        $respuesta->addAssign("informacionProjectos", "innerHTML", $mensaje);
    }
    return $respuesta;
}

function buscarInfoProjectos($idProjecto) {
    global $controllerProject;
    $projecto = $controllerProject->getProject($idProjecto);
    $mensaje = "<br>";
    $mensaje .= "<h2>" . $projecto->getName() . "</h2><hr>";
    $mensaje .= "" . $projecto->getDescription() . "</h><br>";
    $mensaje .= "<h2>" . $projecto->getCompany_name() . "</h2>";
    $mensaje .= "START DATE:" . $projecto->getStarDate() . "</h><br>";
    $mensaje .= "<center>
            <A id='$idProjecto' HREF='#' onclick='xajax_goProject(this.id)'><IMG  SRC='../Plantilla/images/ok.png' WIDTH=40 HEIGHT=40 ></A>
            <A id='$idProjecto' HREF='#' onClick =xajax_editarProjecto(this.id)><IMG id='$idProjecto' SRC='../Plantilla/images/update.jpg' WIDTH=40 HEIGHT=40 ></A>
            <A id='$idProjecto' HREF='#' onClick =xajax_eliminarProjecto(this.id)><IMG id='$idProjecto' SRC='../Plantilla/images/delete.jpg' WIDTH=40 HEIGHT=40 ></A>
            ";
    return $mensaje;
    //<input id='$idProjecto'type='submit' name='enviar' value='GO'     onclick='xajax_goProject(this.id)' />
}

function mostrarContenido44444($ref) {
    global $nameProject;

    if ($ref == "crear") {
        include_once("FormProject.php");
    } else {
        if ($ref == "verProjectos") {
            global $controllerProject;
            global $controllerAnalyst;
            if (($_SESSION["pass"] != "NO")) {
                $analyst = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
                $id = $analyst->getIdAnalyst();


                $listaProjectos = $controllerProject->getProjects($id);
                echo'<table><tr><td><div id="contenido">
                            <h3>Select the project you want to work with</h3>
                            <br />
                            <br />
                            <table><tr><td><select style="width:30em; border-radius: 0.35em;
    box-shadow: inset 0px 0px 1px 1px rgba(255,255,255,0.25);" onChange=xajax_verInformacionDelProjecto(value)>';
                echo '<option value="0">...</option>';
                for ($i = 0; $i < count($listaProjectos); $i++) {
                    $idProject = $listaProjectos[$i]->getIdProyect();
                    echo '<option value="' . $idProject . '">' . $listaProjectos[$i]->getName() . '</option>';
                }
                echo '</select><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td></tr></table>
                            </div></td><td>
                           <div id=informacionProjectos></div></td></tr></table></div>';
            }
        } else {
            echo "<br><br><br><br><br><br><br><br>";
        }
    }
}

function volver() {
    $respuesta = new xajaxResponse;
    $text = '   <div class="container">
            <br>
            <header>';
    $text .= getTextListProjects();
    $text .= '</header></div>';
    $respuesta->addAssign("top", "innerHTML", $text);
    return $respuesta;
}

$methods[] = "verInformacionDelProjecto";
$methods[] = "crearProjecto";
$methods[] = "eliminarProjecto";
$methods[] = "goProject";
$methods[] = "editarProjecto";
$methods[] = "editar";
$methods[] = "volver";