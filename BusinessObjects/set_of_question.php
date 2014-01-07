<?php


class set_of_question {
    private $idProject;
    private $idStructure;
    private $idSetQuestion;
    private $name;
    private $idASM;
    function setIdProject($idProject)
    {
        $this->idProject = $idProject;
    }
    function getIdProject()
    {
        return $this->idProject;
    }
     function setIdASM($idASM)
    {
        $this->idASM = $idASM;
    }
    function getIdASM()
    {
        return $this->idASM;
    }
    function setIdStructure($idStructure)
    {
        $this->idStructure = $idStructure;
    }
    function getIdStructure()
    {
        return $this->idStructure;
    }
    
    function setIdSetQuestion($idSQ)
    {
        $this->idSetQuestion = $idSQ;
    }
    function getIdSetQuestion()
    {
        return $this->idSetQuestion;
    }
    
    function setName($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }
    
    
}


