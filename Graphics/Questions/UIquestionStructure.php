<?php

//include_once '../base.php';
/* @var $answer xajaxResponse */
function printStructure($text) {
    global $answer;
    if (count($_SESSION["elementsSQ"]) > 0) {

        $caja = elementText('caja', $text, "");
        $text = "<DIV class='button submit'><table ><tr><td><h3><br><h3>Prototype Structure Questions</h3><hr></td></tr></table>Structure name:$caja<br><br><table>";
        $text .= "<tr>";
        $elements = $_SESSION["elementsSQ"];

        for ($i = 0; $i < count($elements); $i++) {
            $button = '<div class="button submit">' . $elements[$i] . '</div>';
            //elementButton("td", "", "", $elements[$i]);
            $text .= ($i + 1) . $button;
            if ($i % 3 == 0) {
                if ($i != 0) {
                    $text .= "<br>";
                }
            }
        }
        $text .= "</tr></table><center>";
        $text .= elementOK(" ", "#save", "saveStructure(caja.value)");
        $text .= elementDelete(" ", "#delete", "deleteStructure(0)");
        $answer->addAssign("SQEstructure", "innerHTML", $text);
    } else {
        $answer->addAssign("SQEstructure", "innerHTML", "");
    }
    return $answer;
}

function getFormUIquestionStructure() {
    global $structursController;
    $structursController = new StructuresController();
    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    $list = $structursController->getStructures($idAnalyst);
    $ids = array();
    $text = array();
    $ids[] = "new";
    $text[] = "new";
    for ($i = 0; $i < count($list); $i++) {
        $id = $list[$i]->getIdStructure();
        $texts = $list[$i]->getName();
        $ids[] = $id;
        $text[] = $texts;
    }

    //variable especificada a contener la cantidad de variables de SQ
    $_SESSION["elementsSQ"] = array("...");
    $action = "looKsq";
    $select = select($ids, $text, "lookStructurs(value)", "....");
    $id = "StructuresQuestions";
    $addQuestion = elementPlus($id, "#", "addElement()");
    include_once 'FormSQ.php';
}

function saveStructure($nameStructure) {
    global $structursController;
    global $answer;

    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    $items = $_SESSION["elementsSQ"];
    if (count($items) > 1) {
        if ($nameStructure != "") {
            if ($_SESSION["SV"] != "NO") {
                deleteStructure(1);
                 $text = "<center><div class='button submit'>Structure Update</div><br><br><br>";
            } else {
                 $text = "<center><div class='button submit'>Structure Create</div>";
                $_SESSION["elementsSQ"] = array();
            }

            $structursController->createStructure($idAnalyst, $nameStructure, $items);
            //$answer->addRedirect('home.php');
            $div = "SQEstructure";
            $answer->addAssign($div, "innerHTML", "");
            $div = "SQelements";
           
            $answer->addAssign($div, "innerHTML", $text);
        }
    } else {
        $answer->addAlert("the structure is empty");
    }
    return $answer;
}

function selectElement($text) {
    global $answer;
    if ($text == "new") {
        
    } else {
        $pos = strpos($text, "-");
        $id = substr($text, $pos + 1);
        $elements = $_SESSION["elementsSQ"];
        $text = substr($text, 0, $pos);
        $elements[$id] = $text;
        $_SESSION["elementsSQ"] = $elements;
        printStructure(getName());
        $answer = paintElements();
        return $answer;
    }
    printStructure("");
    $answer = paintElements();
    return $answer;
}

function addElement() {
    global $answer;
    $elements = $_SESSION["elementsSQ"];
    $elements[] = "...";
    $_SESSION["elementsSQ"] = $elements;
    printStructure(getName());
    $answer = paintElements();
    return $answer;
}

function deleteStructure($id) {
    global $answer;
    global $structursController;
    if ($_SESSION["elementsSQ"] != "") {
        if ($_SESSION["SV"] != "NO") {
            $structursController->deleteStructure($_SESSION["SV"]);
            if ($id == 0) {
                $answer->addAlert("the structure was delete sucesfull");
            }
            $_SESSION["SV"] = "NO";
            $_SESSION["elementsSQ"] = "";
            if ($id == 0) {
                $answer->addRedirect("home.php");
            }
        }
    }
    return $answer;
}

function deleteElement($id) {
    global $answer;
    $elements = $_SESSION["elementsSQ"];
    $answer = new xajaxResponse();
    unset($elements[$id]);
    $elements = array_values($elements);
    $_SESSION["elementsSQ"] = $elements;
    printStructure(getName());
    $answer = paintElements();
    return $answer;
}

function paintElements() {
    global $answer;
    //$answer->addAlert("gola");
    $elements = $_SESSION["elementsSQ"];
    /*
     * palabras principales:
     * main agent
     */
    $array = array("ASM", "TEXT", "TAXONOMY", "MAIN AGENT");
    $text = "<table>";
    for ($i = 0; $i < count($elements); $i++) {

        $word = $elements[$i];
        $array2 = array("ASM-" . $i, "TEXT-" . $i, "TAXONOMY-" . $i, "MAIN AGENT-" . $i);
        if ($word == "ASM") {
            $array = array("TEXT", "TAXONOMY", "MAIN AGENT");
            $array2 = array("TEXT-" . $i, "TAXONOMY-" . $i, "MAIN AGENT-" . $i);
        } else {
            if ($word == "TEXT") {
                $array = array("ASM", "TAXONOMY", "MAIN AGENT-");
                $array2 = array("ASM-" . $i, "TAXONOMY-" . $i, "MAIN AGENT-" . $i);
            } else {
                if ($word == "TAXONOMY") {
                    $array = array("ASM", "TEXT", "MAIN AGENT-");
                    $array2 = array("ASM-" . $i, "TEXT-" . $i, "MAIN AGENT-" . $i);
                } else {
                    if ($word == "MAIN AGENT") {
                        $array = array("ASM", "TEXT", "TAXONOMY");
                        $array2 = array("ASM-" . $i, "TEXT-" . $i, "TAXONOMY-" . $i);
                    } else {
                        $array = array("ASM", "TEXT", "TAXONOMY", "MAIN AGENT");
                        $array2 = array("ASM-" . $i, "TEXT-" . $i, "TAXONOMY-" . $i, "MAIN AGENT-" . $i);
                    }
                }
            }
        }
        $div = "SQelements";
        $elem = select($array2, $array, "selectElement(value)", $word);
        $dele = elementDelete($i, "#$i", "deleteElement(this.id)");
        $cont = $i + 1;
        $text.= "<tr><td>$cont</td><td id=td>$elem</td><td>$dele</td></tr>";
        $answer->addAssign($div, "innerHTML", $text);
    }
    $div = "SQelements";
    $answer->addAssign($div, "innerHTML", $text);
    return $answer;
}

function lookStructurs($idStructure) {
    global $answer;
    global $structursController;
    if ($idStructure == "new") {
        $_SESSION["elementsSQ"] = array();
        $_SESSION["SV"] = "NO";
    } else {
        $_SESSION["SV"] = $idStructure;
        $list = $structursController->getItemStructure($idStructure);

        $list2 = array();
        for ($i = 0; $i < count($list); $i++) {
            $list2[] = $list[$i]->getvalue();
        }
        $_SESSION["elementsSQ"] = $list2;
    }
    paintElements();
    $answer = printStructure(getName());
    return $answer;
}

function getName() {
    global $structursController;
    if ($_SESSION["SV"] != "NO") {
        $structure = $structursController->getStructure($_SESSION["SV"]);
        if ($structure != null) {
            $name = $structure->getName();
            if ($name != "") {
                return $name;
            }
        }
    }
    return "";
}

$methods[] = "addElement";
$methods[] = "deleteElement";
$methods[] = "paintElements";
$methods[] = "selectElement";
$methods[] = "printStructure";
$methods[] = "saveStructure";
$methods[] = "lookStructurs";
$methods[] = "deleteStructure";
//okSeccion($methods);
