<?php

class Structure {
    private $name;
    private $idStructure;
    private $StructureItems;
    private $idAnalyst;
    //name function`s
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    //$idStructure function`s
    public function getIdStructure()
    {
        return $this->idStructure;
    }
    public function setIdStructure($id)
    {
        $this->idStructure = $id;
    }
    //itemStructures funcion`s
    public function setStructureItems($eI)
    {
        $this->StructureItems=$eI;
    }
     public function getStructureItems()
    {
        return $this->StructureItems;
    }
    //idAnalyst funcion`s
    public function setidAnalyst($id)
    {
        $this->idAnalyst=$id;
    }
     public function getidAnalyst()
    {
        return $this->idAnalyst;
    }
}


