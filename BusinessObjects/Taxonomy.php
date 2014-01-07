<?php
class Taxonomy {
    private $id_taxonomy;
    private $id_Analyst;
    private $name;
    private $description;
    private $items; //::TsxonomyItem.php
    //function set
    public function setId_taxonomy($id)
    {
        $this->id_taxonomy = $id;
    }
    public function setId_Analyst($id)
    {
        $this->id_Analyst = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setItems($items)
    {
        $this->items = $items;
    }
    //funtcion get
    public function getId_taxonomy()
    {
        return $this->id_taxonomy;
    }
    public function getId_Analyst()
    {
        return $this->id_Analyst;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getItems()
    {
        return $this->items;
    }
}