<?php

class StructureItem {
   private $idStructure;
   private $idStructureItem;//primary key
   private $position;//position element
   private $value;//value of element
   //idStructure function`s
    public function setIdStructure($id)
    {
        $this->idStructure = $id;
    }
    public function getIdStructure()
    {
        return $this->idStructure;
    }
    //idStructure function`s
    public function setidStructureItem($id)
    {
        $this->idStructureItem = $id;
    }
    public function getidStructureItem()
    {
        return $this->idStructureItem;
    }
    //position function`s
    public function setposition($pos)
    {
        $this->position = $pos;
    }
    public function getposition()
    {
        return $this->position;
    }
    //value function`s
    public function setvalue($val)
    {
        $this->value = $val;
    }
    public function getvalue()
    {
        return $this->value;
    }
}
