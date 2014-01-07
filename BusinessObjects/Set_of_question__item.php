<?php


class Set_of_question__item {
    private $idSetQuestion;
    private $idStructureItem;
    private $value;
    function setIdSetQuestion($idSQ)
    {
        $this->idSetQuestion = $idSQ;
    }
    function getIdSetQuestion()
    {
        return $this->idSetQuestion;
    }
    function setIdStructureItem($idStructureItem)
    {
        $this->idStructureItem=$idStructureItem;
    }
    function getIdStructureItem()
    {
        return $this->idStructureItem;
    }
    function setValue($value)
    {
        $this->value= $value;
    }
    function getValue()
    {
        return $this->value;
    }
}


