<?php

class QuestionsController {

    function insertSet_of_question($idProject, $Id_structure, $nameS) {
        include_once '../../BusinessObjects/Set_of_question.php';
        include_once '../../DataAccess/Set_of_questionDAO.php';
        $set_of_questionDAO = new Set_of_questionDAO();
        $setOfQuestion = new set_of_question();
        $setOfQuestion->setIdProject($idProject);
        //$setOfQuestion->setIdASM($id_ASM);
        $setOfQuestion->setIdStructure($Id_structure);
        $setOfQuestion->setName($nameS);
        $set_of_questionDAO->saveQuestion($setOfQuestion);
    }

    function getIdSet_of_question($idProject, $Id_structure, $nameS) {
        include_once '../../BusinessObjects/Set_of_question.php';
        include_once '../../DataAccess/Set_of_questionDAO.php';
        $set_of_questionDAO = new Set_of_questionDAO();
        $setOfQuestion = new set_of_question();
        $setOfQuestion->setIdProject($idProject);
        //$setOfQuestion->setIdASM($id_ASM);
        $setOfQuestion->setIdStructure($Id_structure);
        $setOfQuestion->setName($nameS);
        $id = $set_of_questionDAO->getIdsetQuestion($setOfQuestion);
        return $id;
    }
    function insertItemSQ($idSetQ,$value)
    {
        include_once '../../BusinessObjects/set_of_questionItem.php';
        include_once '../../DataAccess/Set_of_questionDAO.php';
        $set_of_questionDAO = new Set_of_questionDAO();
        $element  = new set_of_questionItem();
        $element->idSetQuestion= $idSetQ;
//        $element->idStructureItem= $idStructureQ;
        $element->value = $value;
        $set_of_questionDAO->insertItemSQ($element);
    }
    /*
     * 
     * 
     * funciones pertinentes a la administracion de las preguntas elaboradas
     */
    function getList_Set_of_question()
    {
        include_once '../../DataAccess/Set_of_questionDAO.php';
        $set_of_questionDAO = new Set_of_questionDAO();
        return $set_of_questionDAO->getList_Set_of_question();
    }
    
    //funcion que retorna el id de la estructura de preguntas elaborada
    function getSet_of_question($idSetQuestion)
    {
        include_once '../../DataAccess/Set_of_questionDAO.php';
        $set_of_questionDAO = new Set_of_questionDAO();
        return $set_of_questionDAO->getSet_of_questionDA0($idSetQuestion);
    }
    /*
     * funcion que permite retornar una lista con los valores TEXT de las
     * preguntas instanciadas 
     */
    function getListSOQI($idSetQuestion)
    {
         include_once '../../DataAccess/Set_of_questionDAO.php';
        $set_of_questionDAO = new Set_of_questionDAO();
        return $set_of_questionDAO->getListItemSet_of_question($idSetQuestion);
    }
    
}

?>
