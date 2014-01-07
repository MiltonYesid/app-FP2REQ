<?php

/* @var $answer xajaxResponse */

//include_once '../base.php';
function getFormNewASM() {
    $text = '
    <h3>New Diagrammer</h3><hr><br>
    <SPAN></span>
    <form method="post" action="#">
    <div class="row half">
    <div class="6u"><input type="text" id="caja" class="text" name="name" placeholder="Name ASM" /></div>
    </div>
    <div class="row half">
    <div class="14u">
    <textarea id=descripcion name="message" placeholder="Description"></textarea>
    </div>
    </div>
    <div class="row">
    <div class="12u">
    <a href="#" class="button submit" onclick=xajax_guardarASM(caja.value,descripcion.value)>New ASM</a>
    <a href="#" class="button submit">Cancel</a>
    </div>
    </div>
    </form>';
    
    
    echo $text . "</div>";
}

function guardarASM($nameDiagrammer) {
    global $answer;
    $idProject = $_SESSION["permisosDeMenu"];

    global $diagramerASMController;
    $diagramerASMController = new asmsController;
    $idDiagram = $diagramerASMController->newASM($nameDiagrammer, $idProject);
    $answer->addAlert("Diagram ASM created");
    $text = '  <br>
                    <header>';
    $text .= getFormSelectASM();
    $text .='
                    </header>';
    $answer->addAssign("list", "innerHTML", $text);
    $answer = lookDiagram($idDiagram);
    return $answer;
}

$methods[] = "guardarASM";
//okSeccion($methods);