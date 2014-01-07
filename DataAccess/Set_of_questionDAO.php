<?php

class Set_of_questionDAO {
    /* con este metodo se guarda un set de preguntas
     */

    function saveQuestion($set_of_question) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/set_of_question.php';
        $connection = getConnection();
        mysql_query("INSERT INTO `set_of_question`( `idStructure`,`name`) VALUES ('" .
                        $set_of_question->getIdStructure() . "','" .
                        //$set_of_question->getIdASM() . "','" .
                        $set_of_question->getName() . "')", $connection) or die("ERROR SQL" . mysql_error());
        close($connection);
    }

    function getIdsetQuestion($set_of_question) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/set_of_question.php';
        $connection = getConnection();
        $sql = "SELECT  `IdSetQuestion` FROM `set_of_question`";
        $sql .= " WHERE ";
                $sql .= " idStructure = " . $set_of_question->getIdStructure() . " AND ";
                $sql .= "name = '". $set_of_question->getName()."';";
                //$sql .= "id_ASM = " . $set_of_question->getIdASM() . ";" .
                $registros = mysql_query($sql, $connection) or
                die("or die".$sql . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $idSetQuestionare = $reg['IdSetQuestion'];
        }
        close($connection);
        return $idSetQuestionare;
        
    }

    function insertItemSQ($element) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/set_of_questionItem.php';
        /* @var $element set_of_questionItem */
        $connection = getConnection();
        mysql_query("INSERT INTO `set_of_questionitem`(`idSetQuestion`, `Value`) VALUES
            ('" .
                        $element->idSetQuestion . "','" .
//                        $element->idStructureItem . "','" .
                        //$set_of_question->getIdASM() . "','" .
                        $element->value . "')", $connection) or die("ERROR SQL" . mysql_error());
        close($connection);
        //echo $element->idSetQuestion;
    }

    /*
     * 
     * 
     * set_of_questions
     */

    function getList_Set_of_question() {
      
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/set_of_question.php';
        
        $connection = getConnection();
        $lista = array();
        $registros = mysql_query("select * from set_of_question ", $connection) or
                die("ERROR - SELECT" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $list = new set_of_question;
            $list->setIdSetQuestion($reg['IdSetQuestion']);
            $list->setIdStructure($reg['idStructure']);
            $list->setName($reg['name']);
            $lista[] = $list;
        }
        close($connection);
        return $lista;
    }
    
    
    /*
     * PERMITE OBTENER EL IDSTRUCTURE DE LA TABLA SET_OF_QUESTION
     */
    function getSet_of_questionDA0($idSetQuestion)
    {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/set_of_question.php';
        $idStructure = null;
        $connection = getConnection();
        $lista = array();
        $sql = "select idStructure from set_of_question  where IdSetQuestion=".$idSetQuestion;
        $registros = mysql_query($sql, $connection) or
        die("ERROR".$sql . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $idStructure = $reg['idStructure'];
        }
        close($connection);
        return $idStructure;
    }
    /*
     * PERMITE OBTENER LA LISTA DE ITEMS DE UN SET_OF_QUESTION
     */
    function getListItemSet_of_question($idSetQuestion)
    {
         include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/set_of_questionItem.php';
        $idStructure = null;
        $connection = getConnection();
        $lista = array();
        $sql = "select * from set_of_questionitem  where IdSetQuestion=".$idSetQuestion. " ORDER BY idStructureItem";
        $registros = mysql_query($sql, $connection) or
        die("ERROR".$sql . mysql_error());
        while($reg = mysql_fetch_array($registros)) {
            $lista[] = $reg['Value'];
        }
        close($connection);
        return $lista;
    }

}


