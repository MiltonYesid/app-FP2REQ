<?php
class TaxonomyDAO {
    function TaxonomyDAO(){}
    //funciones de taxonomy general
    function saveTaxonomy($newTaxonomy){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Taxonomy.php';
        $connection = getConnection();
        mysql_query("INSERT INTO taxonomy( idAnalyst, name, description)  values('" .
                        $newTaxonomy->getId_Analyst()   . "','" .
                        $newTaxonomy->getName()         . "','" .
                        $newTaxonomy->getDescription()  . "')"  ,
        $connection) or die("ERROR SQL" . mysql_error());
        $taxonomyItem = $newTaxonomy->getItems();
        /*for($i = 0 ; $i < count($taxonomyItem) ; $i++)
        {
            $this->addTaxonomySpec($taxonomyItem[$i]);
        }*/
        close($connection);
    }
    function getTaxonomy($idTaxonomy){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Taxonomy.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM taxonomy WHERE
                idTaxonomy='$idTaxonomy'", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $taxonomy = new Taxonomy();
            $taxonomy->setId_Analyst($reg['idAnalyst']);
            $taxonomy->setId_taxonomy($reg['idTaxonomy']);
            $taxonomy->setDescription($reg['description']);
            $taxonomy->setName($reg['name']);
            $items   = $this->listTaxonomySpecs($idTaxonomy);
            $taxonomy->setItems($items);
            return $taxonomy;
        } else {
            return NULL;
        }
    }
    function getItem($idItem)
    {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/TaxonomyItem.php';
        $connection = getConnection();
        $registros = mysql_query("select * from taxonomyitem WHERE idTaxonomyItem='$idItem'", $connection) or
                die("Error SQL:" . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $taxonomy = new TaxonomyItem();
            $taxonomy ->setId_Taxonomy($reg['idTaxonomy']);
            $taxonomy ->setId_taxonomyItem($reg['idTaxonomyItem']);
            $taxonomy ->setContent($reg['content']);
        }
        return $taxonomy;
        close($connection);
    }
    function editTaxonomy($editedTaxonomy){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Taxonomy.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE taxonomy SET
                name        ='".$editedTaxonomy->getName()."',  
                description ='".$editedTaxonomy->getDescription()."'
                WHERE idTaxonomy = '".$editedTaxonomy->getId_taxonomy()."'", $connection) or
                die("Unsuccessful query " . mysql_error());
    }
    function deleteTaxonomy($idTaxonomy){
        //DELETE FROM `taxonomy` WHERE `idTaxonomy`
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Taxonomy.php';
        include_once '../../BusinessObjects/TaxonomyItem.php';
        $connection    = getConnection();
        $taxonomy      = $this->getTaxonomy($idTaxonomy);
       
        $taxonomySpecs = $taxonomy->getItems();
        for($i = 0; $i < count($taxonomySpecs) ; $i++)
        {
            $this->deleteTaxonomySpec($taxonomySpecs[$i]->getId_TaxonomyItem());
        }
        mysql_query("DELETE FROM `taxonomy` WHERE idTaxonomy='$idTaxonomy'",$connection) or die("Unsuccessful query " . mysql_error());
        close($connection);
    }
    //funciones de taxonomyitem
    function listTaxonomies($idAnalyst){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Taxonomy.php';
        $connection = getConnection();
        $taxonomies = array();
        $registros = mysql_query("select * from taxonomy WHERE idAnalyst='$idAnalyst'", $connection) or
                die("Error SQL:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $taxonomy = new Taxonomy();
            $taxonomy->setId_Analyst($reg['idAnalyst']);
            $taxonomy->setId_taxonomy($reg['idTaxonomy']);
            $taxonomy->setDescription($reg['description']);
            $taxonomy->setName($reg['name']);
            $taxonomy->setItems($this->listTaxonomySpecs($reg['idAnalyst']));
            $taxonomies[] = $taxonomy;
        }
        return $taxonomies;
        close($connection);
    }
    function addTaxonomySpec($newTaxSpec){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/TaxonomyItem.php';
        $connection = getConnection();
        mysql_query("INSERT INTO `taxonomyitem`(`idTaxonomy`, `content`) values('" .
                        $newTaxSpec->getId_Taxonomy()  . "','" .
                        $newTaxSpec->getContent()       . "')"  ,
        $connection) or die("ERROR SQL" . mysql_error());
        close($connection);
    }
    function editTaxonomySpec($TaxSpec){
         include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Taxonomy.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE `taxonomyitem` SET 
            `idTaxonomyItem`= '".$TaxSpec->getId_TaxonomyItem()."',
            `content`       = '".$TaxSpec->getContent()."'
             WHERE idTaxonomyItem = '".$TaxSpec->getId_TaxonomyItem()."'", $connection) or
             die("Unsuccessful query " . mysql_error());
    }
    function deleteTaxonomySpec($idTaxSpec){
        include_once 'Connections/Connection.php';
        $connection = getConnection();
        mysql_query("DELETE FROM `taxonomyitem` WHERE idTaxonomyItem='$idTaxSpec'",
        $connection) or die("ERROR SQL" . mysql_error());
    }
    function listTaxonomySpecs($idTaxonomy){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/TaxonomyItem.php';
        $connection = getConnection();
        $taxonomySpecs = array();
        $registros = mysql_query("select * from taxonomyitem WHERE idTaxonomy='$idTaxonomy' order by idTaxonomyItem", $connection) or
                die("Error SQL:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $taxonomy = new TaxonomyItem();
            $taxonomy ->setId_Taxonomy($reg['idTaxonomy']);
            $taxonomy ->setId_taxonomyItem($reg['idTaxonomyItem']);
            $taxonomy ->setContent($reg['content']);
            $taxonomySpecs[] = $taxonomy;
        }
        return $taxonomySpecs;
        close($connection);
    }
}


