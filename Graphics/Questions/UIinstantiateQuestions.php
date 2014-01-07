<?php

//include_once '../base.php';
/* @var $controllerQuestions QuestionsController */
function getFormInstantiateQuestions() {
    $_SESSION["nameSet"] = "";
    global $structursController;
    $list = $structursController->getALLStructures();
    $ids = array();
    $text = array();
    for ($i = 0; $i < count($list); $i++) {
        $id = $list[$i]->getIdStructure();
        $texts = $list[$i]->getName();
        $ids[] = $id;
        $text[] = $texts;
    }

    $caja = elementText2("nameIQ", "", "getName(this.value)", "Name Structure Q.");
    $lupa = elementLupa("lupa", "#l", "paintSetOfQuestion()");
    $select = select($ids, $text, "paintElements(value)", "...");
//    $selectASM = getListDiagrammer();
    include_once 'Form-InstantiateQ.php';
}
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


//function getFormInstantiateQuestions() {
//    global $controllerQuestions;
//    $list = $controllerQuestions->getList_Set_of_question();
//    /*@var $qs set_of_question*/
//    $ids = array();
//    $text = array();
//    for ($i = 0; $i < count($list); $i++) {
//        $qs = $list[$i];
//        $id = $qs->getIdSetQuestion();
//        $texts = $qs->getName();
//        $ids[] = $id;
//        $text[] = $texts;
//    }
//
//    $caja = elementText2("nameIQ", "", "getName(this.value)", "Name ");
//    $lupa = elementLupa("lupa", "#l", "paintSetOfQuestion()");
//    $select = select($ids, $text, "paintElements(value)", "...");
//    $selectASM = getListDiagrammer();
//    $text = '
//    <div id ="questionario"  >  
//    <div  class="button submit">
//        <h3>Questions</h3><hr><br>
//         '.$caja.' 
//         '.$select.'
//    </div
//    </div>';
//    echo $text;
//    
//}
function getName($text) {
    global $answer;
    $_SESSION["nameSet"] = $text;
    return $answer;
}

function paintElements($idStructure) {
    global $answer;
    global $idAnalyst;
    global $controllerTaxonomies;
    global $structursController;
    global $controllerAnalyst;


    if ($idStructure != "...") {

        //get Structurs
        $_SESSION["SV"] = $idStructure;
        $structursController = new StructuresController;
        $list = $structursController->getItemStructure($idStructure);
        $nameStructure = $structursController->getStructure($idStructure)->getName();
        $list2 = array();
        $list3 = array();
        for ($i = 0; $i < count($list); $i++) {
            $list2[] = $list[$i]->getvalue();
            $list3[] = "";
        }
        $_SESSION["idDiagramASM"] = "...";
        $_SESSION["intantiateStructus"] = $list3;
        $_SESSION["elementsSQ"] = $list2;
        //GEt taxonomy
        $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
        $idAnalyst = $user->getIdAnalyst();
        $controllerTaxonomies = new TaxonomiesController;
        $listTaxonomies = $controllerTaxonomies->getTaxonomies($idAnalyst);

        //$answer->addAlert("gola");
        $elements = $_SESSION["elementsSQ"];
        $customized = "<h3>customized by each analyst</h3>";
        $text = "<center><h3>Structure $nameStructure </h3><hr><br><table>";
        for ($i = 0; $i < count($elements); $i++) {
            $word = $elements[$i];
            $elementsASM = ARRAY("Activity", "Task", "Agent", "Businness Rule");
            $elementsASM2 = ARRAY("Activity" . "-" . $i, "Task" . "-" . $i, "Agent" . "-" . $i, "Businness Rule" . "-" . $i);
            if ($word == "ASM") {
                //$elem = select($elementsASM2, $elementsASM, "setSelectASM(this.id,value)", "");
                $elem = $customized;
            } else {
                if ($word == "TEXT") {
                    $elem = elementText("-" . $i, "", "setText(this.id,this.value)");
                } else {
                    if ($word == "MAIN AGENT") {
                        //$elem = select($elementsASM2, $elementsASM2, "setSelectASM(this.id,value)", "");
                        $elem = $customized;
                    } else {
                        if ($word == "TAXONOMY") {
                            $idTaxonomy = array();
                            $list2 = array();
                            for ($j = 0; $j < count($listTaxonomies); $j++) {
                                $word2 = $listTaxonomies[$j]->getId_taxonomy();
                                $idTaxonomy[] = $word2;
                                $list2[] = $listTaxonomies[$j]->getName();
                            }
                            //$elem = select($idTaxonomy, $list2, "setSelectTaxonomy($i,value)", "...");
                            $elem = $customized;
                        } else {
                            $elem = "";
                        }
                    }
                }
            }
            $cont = $i + 1;
            $text.= "<tr><td>$cont $word</td><td id=td>$elem</td></tr>";
        }
        $text .= "</table>";
        paintDiagramASM();
        paintSetOfQuestion();
        $div = "Structure";
        $answer->addAssign($div, "innerHTML", $text);
    }
    return $answer;
}

/*
 * FUNCION PARA IMPRIMIR EL RESULTADO DE LA QUESTION ELABORADA
 * @autor : Milton Yesid F.
 */

function paintSetOfQuestion() {
    global $answer;
    global $controllerTaxonomies;
    $controllerTaxonomies = new TaxonomiesController;

    $div = "SetOfQuestion";
    $name = $_SESSION["nameSet"];
    if ($name != "") {
        $ok = elementOK("", "#Generate", "generateQuestion()");
        $ok = "<a href='#generate'  class='button submit' onClick=xajax_generateQuestion()>Save</a>";
        $cancel = elementDelete("", "", "");
        $cancel = "<a href='#generate'  class='button submit' onClick=xajax_generateQuestion()>Clear</a>";
        $text = "<center><div class='button submit'><center><H3>$name</H3></center><br><table><tr>";
        $list = $_SESSION["intantiateStructus"];
//        for ($i = 0; $i < count($list); $i++) {
//            if (is_numeric($list[$i])) {
//                $taxonomy = $controllerTaxonomies->getTaxonomy($list[$i]);
//                $name = $taxonomy->getName();
//                $text .="" . $name . "";
//            } else {
//                $text .="" . $list[$i] . "";
//            }
//            if ($i % 2 == 0) {
//                if ($i != 0) {
//                    $text .="<br>";
//                }
//            }
//        }

        $elements = $_SESSION["elementsSQ"];
        for ($i = 0; $i < count($elements); $i++) {
            $word = $elements[$i];
            if ($word == "TAXONOMY") {
                $text .= "<TAXONOMY >";
            }
            if ($word == "ASM") {
                $text .="< ASM ELEMENT >";
            } else {
                if ($word == "TEXT") {
                    $text .="" . $list[$i] . "";
                } else {
                    if ($word == "MAIN AGENT") {
                        $text .="< MAIN AGENT >";
                    } else {
                        if ($word == "TAXONOMY") {
                            $text .= " < TAXONOMY >";
                        }
                    }
                }
                if ($i % 2 == 0) {
                    if ($i != 0) {
                        $text .="<br>";
                    }
                }
            }
        }

        $text .= "<td></td></tr></table></div></center>";
    } else {
        $text = "";
        $ok = null;
        $cancel = null;
    }
    $text2 = $ok . $cancel;
    $answer->addAssign($div, "innerHTML", $text);
    $answer->addAssign("SetOfQuestion2", "innerHTML", $text2);
    return $answer;
}

function selectDiagramASM($idDiagramASM) {
    global $answer;

    $_SESSION["idDiagramASM"] = $idDiagramASM;
    return $answer;
}

function setText($id, $text) {
    global $answer;
    $answer = new xajaxResponse;
    $list = $_SESSION["intantiateStructus"];
    $pos = strpos($id, "-");
    $id = substr($id, $pos + 1);
    if ($text != "") {
        $list[$id] = $text;
        $_SESSION["intantiateStructus"] = $list;
        paintSetOfQuestion();
    }
    return $answer;
}



function verifySetQuestion() {
    $list = $_SESSION["intantiateStructus"];

    $elements = $_SESSION["elementsSQ"];
    for ($i = 0; $i < count($elements); $i++) {
        $word = $elements[$i];
        if ($word == "TEXT") {
            
        } else {
            if ($word == "ASM") {
                
            } else {
                if ($word == "TEXT") {
                    if ($list[$i] == "") {
                        return false;
                    }
                } else {
                    if ($word == "MAIN AGENT") {
                        
                    } else {
                        if ($word == "TAXONOMY") {
                            
                        }
                    }
                }
            }
        }
    }

//    for ($i = 0; $i < count($list); $i++) {
//        if ($list[$i] == "") {
//            return false;
//        }
//    }


    if ($_SESSION["nameSet"] == "") {
        return false;
    }
    return true;
}

/* PUEDE QUE ESTO GENERE UN ARCHIVO DE MAS POR LO IMPORTANTE QUE IMPLICA
 * esto es una de las funcionalidades mas importantes del sistema
 * por lo que se realizara con el debido orden 
 * 
 * @var $answer xajaxResponse
 */
/* @var $answer xajaxResponse */

function generateQuestion() {
    global $answer;
    if (verifySetQuestion()) {
        $idProject = $_SESSION["permisosDeMenu"];
        $Id_structure = $_SESSION["SV"];
        $nameS = $_SESSION["nameSet"];
        if ($nameS != "") {
            //$id_ASM = $_SESSION["idDiagramASM"];
            /* se envian los parametros los cuales se construye la estructura
             */
            $idSET = createStructure($idProject, $Id_structure, $nameS);
            $listStructureSelect = $_SESSION["elementsSQ"];
            $valuesList = $_SESSION["intantiateStructus"];
            constructorParcialQuestions($idSET, $listStructureSelect, $valuesList);
        }
    } else {
        $text = "is need that you complete the set of Questions , this implies the name and complete the structure questions selected";
        $answer->addConfirmCommands(1, $text);
    }
    return $answer;
}

/*
 * 
 * constructor PARCIAL de los items de cada set_of_question elaborado
 */

function constructorParcialQuestions($idSET, $listStructureSelect, $valuesList) {
    global $answer;
    global $controllerQuestions;
    $elements = $_SESSION["elementsSQ"];
    for ($i = 0; $i < count($elements); $i++) {
        $word = $elements[$i];

        if ($word == "ASM") {
            
        } else {
            if ($word == "TEXT") {
                $controllerQuestions->insertItemSQ($idSET, $valuesList[$i]);
            } else {
                if ($word == "MAIN AGENT") {
                    
                } else {
                    if ($word == "TAXONOMY") {
                        
                    }
                }
            }
        }
    }
    $answer->addAlert("QUESTION CREATE!");
    $answer->addRedirect("home.php");
    return $answer;
//    $controllerQuestions->insertItemSQ($idSetQ, $idStructureQ, $value);
}

function createStructure($idProject, $Id_structure, $nameS) {
    /* accedemos al controlador de set of question e ingresamos la informacion necesaria
     * al igual que buscamos el id de la set of question y lo retornamos para poder crear los items de las preguntas y 
     * las combinaciones pertinentes
     */
    global $controllerQuestions;
    $controllerQuestions = new QuestionsController;
    $controllerQuestions->insertSet_of_question($idProject, $Id_structure, $nameS);
    $id = $controllerQuestions->getIdSet_of_question($idProject, $Id_structure, $nameS);
    return $id;
}

function createItemQuestions2($idSET, $listStructureSelect, $valuesList) {
    global $controllerQuestions;
    global $ASMControllerPlus;
    $ASMControllerPlus = NEW ASMControllerPlus;
    $elementsStatic = array();
    //donde el resultado se puede encontrar asi
    // $valueList = $elementsDynamic + $elementStatic
    for ($i = 0; $i < count($valuesList); $i++) {
        $word = $listStructureSelect[$i];
        $values = $valuesList[$i];
        if ($word == "ASM") {
            $idASM = $values;
            if ($values = "Activity") {
                $elementsStatic[$i] = $valuesList[$i];
            } else {
                if ($values = "Task") {
                    $elementsStatic[$i] = $valuesList[$i];
                } else {
                    if ($values = "Agent") {
                        $elementsStatic[$i] = $valuesList[$i];
                    } else {
                        if ($values = "Businness Rule") {
                            $elementsStatic[$i] = $valuesList[$i];
                        }
                    }
                }
            }
        } else {
            if ($word == "TEXT") {

                $elementsStatic[$i] = $values;
            } else {
                if ($word == "MAIN AGENT") {
                    $elementsStatic[$i] = $valuesList[$i];
                } else {
                    if ($word == "TAXONOMY") {
                        //$taxonomies = getItemsTaxonomy($value);
                        $elementsStatic[$i] = $taxonomies;
                    }
                }
            }
        }
        $controllerQuestions->insertSet_of_question($idProject, $Id_structure, $nameS);
    }
    generateQuestions2($listStructureSelect, $elementsStatic);
}

function createItemQuestions($idSET, $listStructureSelect, $valuesList) {
    global $controllerQuestions;
    global $ASMControllerPlus;
    $ASMControllerPlus = NEW ASMControllerPlus;
    $elementsStatic = array();
    //donde el resultado se puede encontrar asi
    // $valueList = $elementsDynamic + $elementStatic
    for ($i = 0; $i < count($valuesList); $i++) {
        $word = $listStructureSelect[$i];
        $values = $valuesList[$i];
        if ($word == "ASM") {
            $idASM = $values;
            if ($values = "Activity") {
                $elementsStatic[$i] = $ASMControllerPlus->getActivitiesName($idASM);
            } else {
                if ($values = "Task") {
                    getListTask($idASM, $listActivities);
                } else {
                    if ($values = "Agent") {
                        $elementsStatic[$i] = $ASMControllerPlus->getAgents($idASM);
                    } else {
                        if ($values = "Businness Rule") {
                            getListBR($idASM, $listActivities);
                        }
                    }
                }
            }
        } else {
            if ($word == "TEXT") {

                $elementsStatic[$i] = $values;
            } else {
                if ($word == "MAIN AGENT") {
                    
                } else {
                    if ($word == "TAXONOMY") {
                        $taxonomies = getItemsTaxonomy($value);
                        $elementsStatic[$i] = $taxonomies;
                    }
                }
            }
        }
    }
    generateQuestions($listStructureSelect, $elementsStatic);
}

function generateQuestions2($listStructureSelect, $elementsStatic) {
    
}

function generateQuestions($listStructureSelect, $elementsStatic) {
    for ($i = 0; $i < count($listStructureSelect); $i++) {
        $word = $listStructureSelect[$i];

        if ($word == "ASM") {

            if ($values = "Activity") {
                
            } else {
                if ($values = "Task") {
                    
                } else {
                    if ($values = "Agent") {
                        
                    } else {
                        if ($values = "Businness Rule") {
                            
                        }
                    }
                }
            }
        } else {
            if ($word == "TEXT") {
                
            } else {
                if ($word == "MAIN AGENT") {
                    
                } else {
                    if ($word == "TAXONOMY") {
                        
                    }
                }
            }
        }
    }
}

function getListTask($idASM, $listActivities) {
    
}

function getListBR($idASM, $listActivities) {
    
}

function getItemsTaxonomy($idTaxonomy) {
    global $controllerTaxonomies;
    $controllerTaxonomies = new TaxonomiesController;
    $taxonomy = $controllerTaxonomies->getTaxonomy($idTaxonomy);
    $taxonomies = $taxonomy->getItems();
    $list = array();
    for ($i = 0; $i < count($taxonomies); $i++) {
        $nameTaxonomy = $taxonomies[$i]->getName();
        $list[$i] = $nameTaxonomy;
    }
    return $list;
}

$methods[] = "paintElements";
$methods[] = "paintDiagramASM";
$methods[] = "setText";
$methods[] = "paintSetOfQuestion";
$methods[] = "getName";
//funcion que se encarga de generar las preguntas
$methods[] = "generateQuestion";
$methods[] = "clearOptions";
$methods[] = "constructorParcialQuestions";
//okSeccion($methods);
