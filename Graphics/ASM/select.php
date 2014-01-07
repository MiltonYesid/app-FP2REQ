<?php

//include_once '../base.php';
/* @var $answer xajaxResponse */
/* @var  $diagramerASMController asmsController */
function getFormSelectASM() {
    $text = "<div id=contenido><div class='button submit'><table><tr><h3>select please the diagrammer</h3></hr><hr><br>";
    $div = "<div id=upd></div>";
    $text .= "<tr><td id=td><div id=upd>" . getListDiagrammer() . "</div></td></tr>";
    $text .= "</table></div><div id=asm></div></tr><br><br><br><br><br><br><br><br><br><br><br></DIV>";
    return $text;
}

function isEmptyListDiagrammer() {
    $idProject = $_SESSION["permisosDeMenu"];
    global $answer;
    global $diagramerASMController;
    $diagramerASMController->getASMstexto($idProject);
    $size = count($diagramerASMController);
    if ($size == 0) {
        $answer->addRedirect("new.php");
    }
    $answer->addAlert("hola");
    return $answer;
}

function getListDiagrammer() {

    global $idAnalyst;
    $idProject = $_SESSION["permisosDeMenu"];
    global $diagramerASMController;
    //obtenemos con el controlador del diagramador los elementos del select
    //id array para los valores de las opciones
    //array los valores a mostrar
    //action funcion que se desea ejercer en dicho elemento select
    $ASMs = $diagramerASMController->getASMstexto($idProject);
    $id = array();
    $array = array();
    for ($i = 0; $i < count($ASMs); $i++) {
        $asm = $ASMs[$i];
        $idASM = $asm->getIdASM();
        $name = $asm->getName();
        $id[] = $idASM;
        $array[] = $name;
    }
    $action = "lookDiagram(value)";
    $select = select($id, $array, $action, "....");
    return $select;
}

function lookDiagram($idASM) {
    global $answer;
    global $diagramerASMController;
    if ($idASM != "") {
        $ams = $diagramerASMController->getASM($idASM);
        $name = $ams->getName();
        $dir = "http://fp2req.netne.net/FP2REQ/Graphics/ASM/index.html?idASMglobal=" . 20;
        $delete = elementDelete("", "#delete", "deleteDiagram($idASM)");
        $changeName = elementUpdate("", "#upd", "changeName($idASM)");
        $dir ="http://fp2req.netne.net/FP2REQ/Graphics/ASM/";
        $text = "<br><table><tr><td><h3> $name </h3><hr></td><td>$changeName$delete</td></tr></table>
                <div class='button submit'><iframe  src=$dir width='800px' height='800px'  scrolling=No ></iframe></div></div>";
    } else {
        $text = "";
    }
    $answer->addAssign("asm", "innerHTML", $text);
    return $answer;
}

function deleteDiagram($idASM) {
    global $answer;
    global $diagramerASMController;
    /* @var $answer xajaxResponse */
    $addConfirmCommands = $answer->addConfirmCommands(1, "want to delete the diagram?");
    $diagramerASMController->deleteASMUI($idASM);
    $answer->addRedirect("select.php");
    return $answer;
}

function changeName($idASM) {
    global $answer;
    global $diagramerASMController;
    $ams = $diagramerASMController->getASM($idASM);
    $name = $ams->getName();
    $text = "set name";
    $text .= elementText("nameDiaUpd", $name,"change($idASM,value)");
    $answer->addAssign("upd", "innerHTML", $text);
    return $answer;
}
function change($idASM,$name)
{
    global $answer;
    global $diagramerASMController;
    $diagramerASMController->editASMUI($idASM, $name);
    lookDiagram($idASM);
    $text = getListDiagrammer();
    $answer->addAssign("upd", "innerHTML", $text);
    
    return $answer;
}
$methods[] = "change";
$methods[] = "isEmptyListDiagrammer";
$methods[] = "changeName";
$methods[] = "lookDiagram";
$methods[] = "deleteDiagram";
//okSeccion($methods);