<?php
class TaxonomyItem
{
    private $id_taxonomyItem;
    private $id_taxonomy;
    private $content;
    public function setId_taxonomyItem($id)
    {
        $this->id_taxonomyItem = $id;
    }
    public function setId_Taxonomy($id)
    {
        $this->id_taxonomy = $id;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function getId_TaxonomyItem()
    {
        return $this->id_taxonomyItem;
    }
    public function getId_Taxonomy()
    {
        return $this->id_taxonomy;
    }
    public function getContent()
    {
        return $this->content;
    }
}