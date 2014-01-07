<?php

function getTextListProjects() {
    /* @var $controllerProject ProjectsController */
    /* @var $project Project */
    global $controllerProject;
    $idAnalyst = getIdAnalyst();
    $listProjects = $controllerProject->getProjects($idAnalyst);
    $cantidad = 4;
//    $text = "<div id=informacionProjectos><h2>List Project</h2><hr>";
//    $text .= "<h1>latest projects used</h2>";
//    for ($i = 0; $i < count($listProjects); $i++) {
//        $project = $listProjects[$i];
//        $text .= " <div class=6u> ";
//        $text .= "<h3>" . $project->getName() . "</h3>";
//        $text .= "" . $project->getDescription() . "<br>";
//        $text .= "" . $project->getStarDate() . "<br>";
//        $text .= "</div><br>";
//        if ($i > 2) {
//            break;
//        }
//    }
//    $text .= "</div>";
    $text = "";
    $id = array();
    $array = array();
    $ini = "....";
    $action = "verInformacionDelProjecto(value)";
    for ($i = 0; $i < count($listProjects); $i++) {
        $project = $listProjects[$i];
        $id[] = $project->getIdProyect();
        $array[] = $project->getName();
    }
    
    $list = select($id, $array, $action, $ini);
    $text .= "<div  class='button submit'>
        <center>
        <h3>Select the project you want to work with:
        <br>" . $list . "</div><br><div id=informacionProjectos></div><hr>
        <br><br><br><br><br><br><br><br><br><br><BR><BR><BR><BR><BR>";
    if(count($listProjects)==0)
    {
        return getFormNewProjects(true);
    }
    return $text;
}

function getFormNewProjects($op) {
    /* @var $controllerProject ProjectsController */
    /* @var $project Project */
    global $controllerProject;
    $idAnalyst = getIdAnalyst();
    $listProjects = $controllerProject->getProjects($idAnalyst);
    if(count($listProjects)>0 || $op ==true)
    {
    $text = '
    <div ><h2>New Project</h2>
    <SPAN></span>
    <form method="post" action="#">
    <div class="row half">
    <div class="6u"><input type="text" id="nameProjecto" class="text" name="name" placeholder="Project name" /></div>
    <br><div class="6u"><input type="text" id="nameC" class="text" name="email" placeholder="Company name" /></div>
    </div>
    <div class="row half">
    <div class="14u">
    <textarea id=descripcion name="message" placeholder="Description"></textarea>
    </div>
    </div>
    <div class="row">
    <div class="12u">
    <a href="#" class="button submit" onclick=xajax_crearProjecto(nameProjecto.value,descripcion.value,nameC.value)>New Project</a>
    <a href="#" class="button submit">Cancel</a>
    </div>
    </div>
    </form></div>';
    }
    else
    {
        return "";
    }
    return $text;
}

function getFormEditProject($nameProject, $nameCompany, $description, $idProject) {
    $text = '
    <h2>EDIT PROJECT "' . $nameProject . '" </h2>
    <SPAN></span>
    <form method="post" action="#">
    <div class="row half">
    <div class="6u">Project Name:<input type="text" id="nameProjecto" class="text" name="name" placeholder="Project name" value="' . $nameProject . '" /></div>
    <br><div class="6u">Company Name:<input type="text" id="nameC" class="text" name="email" placeholder="Company name" value="' . $nameCompany . '" /></div>
    </div>
    <div class="row half">
    <div class="14u"> 
    <textarea id="descripcion"  placeholder="Description"  >"' . $description . '"</textarea>
    </div>
    </div>
    <div class="row">
    <div class="12u">
    <a href="#editar" class="button submit" onclick=xajax_editar("' . $idProject . '",nameProjecto.value,descripcion.value,nameC.value)>Edit</a>
    <a href="#cancelar" class="button submit" onclick=xajax_volver()>Cancel</a>
    </div>
    </div>
    </form>';
    return $text;
}
