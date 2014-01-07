<?php

//include_once '../base.php';
function deleteItem($idItem) {
    global $answer;
    global $controllerTaxonomies;
    $item = $controllerTaxonomies->getItem($idItem);
    $idTaxonomy = $item->getId_Taxonomy();
    $controllerTaxonomies->deleteItem($idItem);
    $answer = selectTaxonomy($idTaxonomy);
    return $answer;
}

function updateItem($id, $idItem, $content) {
    global $answer;
    global $controllerTaxonomies;
    $item = $controllerTaxonomies->getItem($idItem);
    if ($id == 1) {

        $_SESSION["item"] = $content;
        $item = $_SESSION["item"];
        if ($item != "") {
            $controllerTaxonomies->updateItem($idItem, $content);
            $idTaxonomy = $_SESSION["idTaxonomy"];
            $_SESSION["item"] = "";
            $answer = selectTaxonomy($idTaxonomy);
        }
        $answer = selectTaxonomy($idTaxonomy);
    } else {
        $idDiv = "items";
        $content = $item->getContent();
        ;
        $text = '<div class="button submit"><table><tr><td><h3>update item</h3><br></td></tr>
                           <tr><TD id ="td"><INPUT id=nItem style="WIDTH: 500px; HEIGHT: 60px"size=32 value="' . $content . '"></td>
                           <td>';
        $text .= "<input id='$idItem' type=submit   class='button submit' value=Update     onclick=xajax_updateItem(1,this.id,nItem.value) /></td>";
        $text .= '</tr></table></div>';
        $answer->addAssign($idDiv, "innerHTML", $text);
    }
    return $answer;
}

function mostrarContenido2($ref) {

    if ($ref == "crearT") {
        include_once("FormCTaxonomia.html");
    } else {
        global $controllerAnalyst;
        $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
        $idAnalyst = $user->getIdAnalyst();
        global $controllerTaxonomies;
        $taxonomies = $controllerTaxonomies->getTaxonomies($idAnalyst);
        echo '<table><tr><td><div id="contenido">
                                <h3>Select taxonomies</h3>
                                <br />
                                <br />
                                <table><tr><td><select style="width:30em; border-radius: 0.35em;
    box-shadow: inset 0px 0px 1px 1px rgba(255,255,255,0.25);" onChange=xajax_selectTaxonomy(value)>';
        echo '<option value="0">...</option>';
        for ($i = 0; $i < count($taxonomies); $i++) {
            $idTaxonomy = $taxonomies[$i]->getId_taxonomy();
            $nameTaxonomy = $taxonomies[$i]->getName();
            echo '<option value="' . $idTaxonomy . '">' . $nameTaxonomy . '</option>';
        }
        echo '</select></td></tr></table>
                                </div></td></table><table>
                                <td><div id=Taxonomies></div>
                               </td></tr></table></div><br><br><br><br><br><br><br>';
    }
}

function getSelectTaxonomy() {
    $text = "";
    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    global $controllerTaxonomies;
    $taxonomies = $controllerTaxonomies->getTaxonomies($idAnalyst);
    $text .= '<table><tr><td><div id="contenido"><center><div class="button submit">
                                <h3>Select taxonomies</h3><hr>
                                <br />
                                <table><tr><td><select style="width:20em; border-radius: 0.35em;
    box-shadow: inset 0px 0px 1px 1px rgba(255,255,255,0.25);" onChange=xajax_selectTaxonomy(value)>';
    $text .= '<option value="0">...</option>';
    for ($i = 0; $i < count($taxonomies); $i++) {
        $idTaxonomy = $taxonomies[$i]->getId_taxonomy();
        $nameTaxonomy = $taxonomies[$i]->getName();
        $text .= '<option value="' . $idTaxonomy . '">' . $nameTaxonomy . '</option>';
    }
    $text .= '</select></div></center></td></tr></table>
                                </div></td></table><table>
                                <td><div id=Taxonomies></div>
                               </td></tr></table></div><br><br><br><br><br><br><br>';

    return $text;
}

function selectTaxonomy($idTaxonomy) {
    $respuesta = new xajaxResponse();
    if ($idTaxonomy > 0) {
        $mensaje = searchTaxonomy($idTaxonomy);
        $_SESSION["idTaxonomy"]=$idTaxonomy;
        $respuesta->addAssign("Taxonomies", "innerHTML", $mensaje);
    }
    return $respuesta;
}

function addTaxonomyItem($idTaxonomy) {
    $answer = new xajaxResponse();
    $idDiv = "items";
    $text = '<div class="button submit"><table><tr><td><h3>new item</h3><br></td></tr>
                       <tr><TD id ="td"><INPUT id=nItem style="WIDTH: 500px; HEIGHT: 60px"size=32 ></td>
                       <td>';
    //$text .= "<input id='$idTaxonomy' type=submit value=ADD     onclick=xajax_saveItem(this.id,nItem.value) /></td>";
   $text .= "<a href='#' class='button submit' onclick=xajax_saveItem($idTaxonomy,nItem.value)>ADD</a></td>";
    $text .= '</tr></table></div>';
    $answer->addAssign($idDiv, "innerHTML", $text);
    return $answer;
}

function updateTaxonomy($id, $idTaxonomy, $name, $description) {
    $answer = new xajaxResponse();
    global $controllerTaxonomies;
    if ($id == 1) {
        $controllerTaxonomies->updateTaxonomy($idTaxonomy, $name, $description);
        $answer = selectTaxonomy($idTaxonomy);
    } else {
        $idDiv = "Taxonomies";
        $taxonomy = $controllerTaxonomies->getTaxonomy($idTaxonomy);
        $name = $taxonomy->getName();
        $description = $taxonomy->getDescription();
        $text = '<div class="button submit"><h3><center>Update Taxonomy</h3><hr>Note: the maximum size of each camp is 140 characters<table>
                           <tr>
                           <td><h3>Taxonomy name</h3></td><td></td><TD id ="td"><INPUT id=nameT  placeholder="Taxonomy name"   value="' . $name . '"></td>
                           </tr></table><table>
                          <textarea id="val" name="message" style="WIDTH: 500px; HEIGHT: 200px" placeholder="Description"   >'.$description.'</textarea>
                           ';

        $text .= " <center><br><A id='$idTaxonomy'   HREF='#' onclick=xajax_updateTaxonomy(1,this.id,nameT.value,val.value)><IMG  SRC='../Plantilla/images/ok.png' WIDTH=40 HEIGHT=40 ></A>";

        $text .= '</tr></table></div>';
        $answer->addAssign($idDiv, "innerHTML", $text);
    }
    return $answer;
}

function saveItem($idTaxonomy, $content) {
    global $answer;
    global $controllerTaxonomies;
    if ($content != "") {
        $_SESSION["item"] = $content;
        $item = $_SESSION["item"];
        $controllerTaxonomies->createItem($idTaxonomy, $item);
        $_SESSION["item"] = "";
        $answer = selectTaxonomy($idTaxonomy);
        return $answer;
    }else
    {
        $mensaje = searchTaxonomy($idTaxonomy);
        $answer->addAssign("Taxonomies", "innerHTML", $mensaje);
        $answer->addAlert("field empty");
        return $answer;
    }
}

function searchTaxonomy($idTaxonomy) {
    global $controllerTaxonomies;
    $taxonomy = $controllerTaxonomies->getTaxonomy($idTaxonomy);
    $name = $taxonomy->getName();
    $description = $taxonomy->getDescription();
    $items = $taxonomy->getItems();
    //$taxonomy = new TaxonomyItem();
    $mensaje = "<td><h3>Taxonomy $name</h3></td><hr>";
    $mensaje .= "" . $description . "<br>";
    $mensaje .= "<center><A id='$idTaxonomy' HREF='#' onClick = xajax_updateTaxonomy(2,id,'h','m')><IMG id='$idTaxonomy' SRC='../Plantilla/images/update.jpg' WIDTH=40 HEIGHT=40 ></A>
                            <A id='$idTaxonomy' HREF='#' onClick = xajax_deleteTaxonomy(id)><IMG id='$idTaxonomy' SRC='../Plantilla/images/delete.jpg' WIDTH=40 HEIGHT=40 ></A></td></tr></table><table><tr><td><div id=updateT></div>";
    $mensaje .= "<div id=items></div><br>";
    $mensaje .= "<table><tr><td><h3><center>Items</h3><IMG SRC='../Plantilla/images/add.png' WIDTH=40 HEIGHT=40 onClick=xajax_addTaxonomyItem('$idTaxonomy')></td></tr>";
    for ($i = 0; $i < count($items); $i++) {
        $j = $i + 1;
        $iditem = $items[$i]->getId_TaxonomyItem();
        $mensaje .= "<tr><td>" . $j . "." . $items[$i]->getContent() . "</td>
                                       
                                        <td><A id='$iditem' HREF='#' onClick = xajax_updateItem(2,id,'h')><IMG SRC='../Plantilla/images/update.jpg' WIDTH=20 HEIGHT=20 ></a></td>
                                        <td><A id='$iditem' HREF='##' onClick = xajax_deleteItem(id)><IMG SRC='../Plantilla/images/delete.jpg' WIDTH=20 HEIGHT=20 ></a></td></tr>";
    }
    $mensaje .= "</table><table><tr><td></td></tr></table>";
    return $mensaje;
}

function crearTaxonomy($name, $description) {
    $respuesta = new xajaxResponse();
    global $controllerAnalyst;
    global $controllerTaxonomies;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    $mensaje = "";
    if (strlen($name) > 0) {
        if (strlen($description) > 0) {
            $controllerTaxonomies->createTaxonomy($idAnalyst, $name, $description);
            $_SESSION["ref"] = "SELECT_Taxonomy";
            $respuesta->addRedirect("home.php");
        } else {
            $mensaje = "taxonomy description is empty";
        }
    } else {
        $mensaje = "taxonomy name is empty";
    }
    $respuesta->addAssign("respuestataxo", "innerHTML", $mensaje);
    return $respuesta;
}

function deleteTaxonomy($idTaxonomy) {
    $answer = new xajaxResponse();
    global $controllerTaxonomies;
    $controllerTaxonomies->deleteTaxonomy($idTaxonomy);
    $answer->addRedirect("UItaxonomies.php");
    return $answer;
}

$methods[] = "crearTaxonomy";
$methods[] = "selectTaxonomy";
$methods[] = "addTaxonomyItem";
$methods[] = "saveItem";
$methods[] = "deleteItem";
$methods[] = "updateItem";
$methods[] = "updateTaxonomy";
$methods[] = "deleteTaxonomy";
//okSeccion($methods);