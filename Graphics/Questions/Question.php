<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include_once '../base.php';
/* @var $answer xajaxResponse */
/* @var  $controllerQuestions QuestionsController */

function getListDiagrammer() {

    global $idAnalyst;
    $idProject = $_SESSION["permisosDeMenu"];
    global $diagramerASMController;

    //obtenemos con el controlador del diagramador los elementos del select
    //id array para los valores de las opciones
    //array los valores a mostrar
    //action funcion que se desea ejercer en dicho elemento select
    $diagramerASMController = new asmsController;
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
    $select = select($id, $array, $action, "...");
    return $select;
}

function lookDiagram($idASM) {
    $_SESSION["idDiagramASM"] = $idASM;

    global $answer;

    global $diagramerASMController;
    $diagramerASMController = new asmsController;
    $ams = $diagramerASMController->getASM($idASM);
    $name = $ams->getName();
    $dir = "http://fp2req.netne.net/FP2REQ/Graphics/ASM/index.php?id=" . $idASM;
    $text = "<td><h1> $name </h1>
                <iframe src=$dir width='475px' height='500px'  scrolling=No ></iframe></div>";
    $answer->addAssign("asm", "innerHTML", $text);
    return $answer;
}


//pinta el diagrama ASM 
function paintDiagramASM() {
    global $answer;
    $div = "diagramASM";
    //$image = elementImage("", 400, 400);
    $text = "<table><tr></tr><tr></tr><tr></tr><tr><td></td></tr>";
    $selectDiagramASM = select("", "", "", "Name Diagram");
    $text .="<tr><td><center>DIagram ASM:</center></td></tr>";
    /* @var $selectDiagramASM type */
    $text .="<tr><td id=td><center>$selectDiagramASM</center></td></tr></table>";
    $answer->addAssign($div, "innerHTML", $text);
    return $answer;
}





function getFormSETQuestions() {
    global $controllerQuestions;
    $list = $controllerQuestions->getList_Set_of_question();
    /*@var $qs set_of_question*/
    $ids = array();
    $text = array();
    for ($i = 0; $i < count($list); $i++) {
        $qs = $list[$i];
        $id = $qs->getIdSetQuestion();
        $texts = $qs->getName();
        $ids[] = $id;
        $text[] = $texts;
    }

    $caja   = elementText2("nameIQ", "", "getName(this.value)", "Name ");
    $select = select($ids, $text, "seleccionarEstructura(value)", "");
    //$selectASM = getListDiagrammer();
    $text = '
    <div id ="questionario"  >  
    <div  class="button submit">
        <h3>Questions</h3><hr><br>
         '.$caja.' 
         '.$select.'
    </div>
    </div><br><hr>
    <div id=Structure></div> ';
    
    echo $text;
    
}


/*
 * funcion que permite seleccionar la estrucutura seleccionada
 * 
 */
function seleccionarEstructura($idStructuraSpec)
{
    global $answer;
    /*@var $answer xajaxResponse*/
    global $structursController;
    /*@var $structursController StructuresController*/
    global $controllerQuestions;
    /*@var $controllerQuestions QuestionsController*/
    if($idStructuraSpec)
    {
        $idStructura = $controllerQuestions->getSet_of_question($idStructuraSpec);
        //$answer->addAlert($idStructura);
        $answer = pintaEstructura($idStructura,$idStructuraSpec);
        //$structura   = $structursController->getStructure($idStructura);
    }
    return $answer;
}
/*
 * funcion que obtiene los agrupamientos de taxonomias 
 */
function getListTaxonomiesUser()
{
    global $controllerAnalyst;
    /*@var $controllerAnalyst AnalystsController*/
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    $controllerTaxonomies = new TaxonomiesController;
    $listTaxonomies = $controllerTaxonomies->getTaxonomies($idAnalyst);
    return $listTaxonomies;
}

/*PINTA ESTRUCTURA
 * funcion para imprimir el formulario de campos restantes
 * con ello se hara la explosion de preguntas
 */
function pintaEstructura($idStructure,$idStructuraSpec) {

    global $idAnalyst;
    global $controllerTaxonomies;
    global $controllerAnalyst;
    
    global $answer;
    /*@var $answer xajaxResponse*/
    global $structursController;
    /*@var $structursController StructuresController*/
    global $controllerQuestions;
    /*@var $controllerQuestions QuestionsController*/
    
    $conteo = 0;
    $listText = $controllerQuestions->getListSOQI($idStructuraSpec);
        $_SESSION["SV"] = $idStructure;
        $list          = $structursController->getItemStructure($idStructure);
        $nameStructure = $structursController->getStructure($idStructure)->getName();
        $list2         = array();
        $list3         = array();
        for ($i = 0; $i < count($list); $i++) {
            $list2[] = $list[$i]->getvalue();
            $list3[] = "";
        }
        $_SESSION["idDiagramASM"] = "...";
        $_SESSION["intantiateStructus"] = $list3;
        $_SESSION["elementsSQ"] = $list2;
        $_SESSION["idStructura"] = $idStructure;
        
        $listTaxonomies = getListTaxonomiesUser();

        //$answer->addAlert("gola");
        $elements = $_SESSION["elementsSQ"];
        $customized = "<h3>customized by each analyst</h3>";
        $text = "<center><h3>Structure $nameStructure </h3><hr><br><table>";
        for ($i = 0; $i < count($elements); $i++) {
            $word = $elements[$i];
            $elementsASM = ARRAY("Activity", "Task", "Agent", "Businness Rule");
            $elementsASM2 = ARRAY("Activity" . "-" . $i, "Task" . "-" . $i, "Agent" . "-" . $i, "Businness Rule" . "-" . $i);
            if ($word == "ASM") {
               $elem = select($elementsASM2, $elementsASM, "setSelectASM(this.id,value)", "");
               
            } else {
                if ($word == "TEXT") {
                    $elem = $listText[$conteo];
                    $list = $_SESSION["intantiateStructus"];
                    $list[$i] = $elem;
                    $_SESSION["intantiateStructus"] = $list;
                    $conteo++;
                } else {
                    if ($word == "MAIN AGENT") {
                        $elem = select($elementsASM2, $elementsASM, "setSelectASM(this.id,value)", "");
                        
                    } else {
                        if ($word == "TAXONOMY") {
                            $idTaxonomy = array();
                            $list2 = array();
                            for ($j = 0; $j < count($listTaxonomies); $j++) {
                                $word2 = $listTaxonomies[$j]->getId_taxonomy();
                                $idTaxonomy[] = $word2;
                                $list2[] = $listTaxonomies[$j]->getName();
                            }
                            $elem = select($idTaxonomy, $list2, "setSelectTaxonomy($i,value)", "");
                            
                        } 
                    }
                }
            }
            $cont = $i + 1;
            $text.= "<tr><td>$cont $word</td><td id=td>$elem</td></tr>";
        }
        $text .= "</table>";
//        paintDiagramASM();
//        paintSetOfQuestion();
        $div = "Structure";
        $answer->addAssign($div, "innerHTML", $text);
    return $answer;
}

function setSelectTaxonomy($pos, $id) {
    global $answer;
    /*@var $answer xajaxResponse*/
    $answer->addAlert($pos."hola".$id);
    $list = $_SESSION["intantiateStructus"];
    $list[$pos] = $id;
    $_SESSION["intantiateStructus"] = $list;
    //$answer = verificarFormCompleto();
    return $answer;
}

function setSelectASM($id, $value) {
    global $answer;
    /*@var $answer xajaxResponse*/
    
    $list = $_SESSION["intantiateStructus"];
    $pos = strpos($value, "-");
    $id = substr($value, $pos + 1);
    $value = substr($value, 0, count($value) - 3);
    
    $list[$id] = $value;
    $answer->addAlert($value."hola".$id);
    //$answer = verificarFormCompleto();
    $_SESSION["intantiateStructus"] = $list;
    return $answer;
}
/*
 * funcion que evalua que el formulario esta completo , cuando ello este
 * satisfecho , el sistrma informará que debe seleccionar un 
 * modelo ASM para continuar 
 */
function verificarFormCompleto()
{
     global $answer;
    /*@var $answer xajaxResponse*/
    $structura = $_SESSION["elementsSQ"];
    $structuraI = $_SESSION["intantiateStructus"];
    for($i = 0 ; $i < count($structura); $i++)
    {
        if($structuraI[$i]==null)
        {
            $answer->addAlert($structuraI[$i]);
            
        }
    }
    return $answer;
}
$methods[] = "lookDiagram";
$methods[] = "seleccionarEstructura";
$methods[] = "pintaEstructura";
$methods[] = "setSelectTaxonomy";
$methods[] = "setSelectASM";
$methods[] = "verificarFormCompleto";