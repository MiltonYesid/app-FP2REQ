<?php

class StructuresDAO {
    
     function saveStructure($newStructure)          {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        $connection = getConnection();
        mysql_query("INSERT INTO `structure`( `name`, `idAnalyst`) VALUES('" .
                       $newStructure->getName()         . "','" .
                       $newStructure->getidAnalyst()    . "')"  ,
        $connection) or die("ERROR SQL" . mysql_error());
        close($connection);
    }
    function getStructureforName($name)
    {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM `structure` WHERE
                name='$name'", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            
            $id=$reg['idStructure'];
             return $id;
           
        } else {
            return NULL;
        }
    }
     function getStructure($idStructure)            {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM `structure` WHERE
                idStructure='$idStructure' order by idStructure", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $structure = new Structure();
            $structure ->setIdStructure($idStructure);
            $structure ->setName($reg['name']);
            $structure ->setidAnalyst($reg['idAnalyst']);
            return $structure;
        } else {
            return NULL;
        }
    }
     //ItemsStructurs FUNCTION
     function getItemStructure($idItem)             {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/StructureItem.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM `structureitem` WHERE  idStructureItem='$idItem' order by position", $connection) or
                die("Error SQL:" . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $StructureItem = new StructureItem();
            $StructureItem ->setIdStructure($reg['idStructure']);
            $StructureItem ->setidStructureItem($reg['idStructureItem']);
            $StructureItem ->setposition($reg['position']);
            $StructureItem ->setvalue($reg['value']);
        }
        return $StructureItem;
        close($connection);
    }
     function updateStructure($structure)             {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE `structure` SET 
                `name`='".$structure ->getName()."';
                WHERE idStructure = '".$structure->getIdStructure()."'", $connection) or
                die("Unsuccessful query " . mysql_error());
    }  
     function deleteStructure($idStructure)         {
         include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        include_once '../../BusinessObjects/StructureItem.php';
        $connection     = getConnection();
        mysql_query("DELETE FROM `structure`   WHERE idStructure='$idStructure'",$connection) or die("Unsuccessful query " . mysql_error());
        close($connection);
    }
     function listStructurs($idAnalyst)             {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        $connection = getConnection();
        $structures = array();
        $registros = mysql_query("SELECT * FROM `structure` WHERE `idAnalyst`='$idAnalyst'", $connection) or
                die("Error SQL:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $structure = new Structure();
            $structure ->setIdStructure($reg['idStructure']);
            $structure ->setName($reg['name']);
            $structure ->setidAnalyst($reg['idAnalyst']);
            $structures[] = $structure;
        }
        return $structures;
        close($connection);
    }
     function addStructureItem($newStructureItem)   {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/StructureItem.php';
        $connection = getConnection();
        mysql_query("INSERT INTO `structureitem`( `idStructure`, `position`, `value`) VALUES ('" .
                        $newStructureItem->getIdStructure()  . "','" .
                        $newStructureItem->getposition() . "','" .
                        $newStructureItem->getvalue()      . "')"  ,
        $connection) or die("ERROR SQL" . mysql_error());
        close($connection);
    }
     
     function updateStructureItem($structureItem)     {
         include_once 'Connections/Connection.php';
         include_once '../../BusinessObjects/StructureItem.php';
         $structureItem = new StructureItem;
        $connection = getConnection();
        $registros = mysql_query("UPDATE `structureitem` SET 
            `position`= '".$structureItem->getposition()."',
            `value`   = '".$structureItem->getvalue()."'
             WHERE `idStructureItem` = '".$structureItem->getidStructureItem()."'", $connection) or
             die("Unsuccessful query " . mysql_error());
    }
     function deleteStructureItem($idStructure) {
        include_once 'Connections/Connection.php';
        $connection = getConnection();
        mysql_query("DELETE FROM `structureitem` WHERE  `idStructure`='$idStructure'",
        $connection) or die("ERROR SQL" . mysql_error());
    }
     function listStructureItems($idStructure){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/StructureItem.php';
        $connection = getConnection();
        $StructuresItems = array();
        $registros = mysql_query("select * from structureitem WHERE idStructure='$idStructure' order by position", $connection) or
                die("Error SQL:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $StructureItem = new StructureItem();
            $StructureItem ->setIdStructure($reg['idStructure']);
            $StructureItem ->setidStructureItem($reg['idStructureItem']);
            $StructureItem ->setposition($reg['position']);
            $StructureItem ->setvalue($reg['value']);
            $StructuresItems[] = $StructureItem;
        }
        return $StructuresItems;
        close($connection);
    }
    
       function listALLStructurs()             {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Structure.php';
        $connection = getConnection();
        $structures = array();
        $registros = mysql_query("SELECT * FROM `structure`", $connection) or
                die("Error SQL:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $structure = new Structure();
            $structure ->setIdStructure($reg['idStructure']);
            $structure ->setName($reg['name']);
            $structure ->setidAnalyst($reg['idAnalyst']);
            $structures[] = $structure;
        }
        return $structures;
        close($connection);
    }
    
}

