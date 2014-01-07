<?php

class StructuresController {
    function createStructure($idAnalyst,$name,$items)
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
       include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO  = new StructuresDAO();
        $structure     = new Structure();
        $structure     ->setidAnalyst($idAnalyst);
        $structure     ->setName($name);
        $structureDAO  ->saveStructure($structure);
        $idStructure   = $structureDAO->getStructureforName($name);
        for($i = 0; $i <count($items);$i++)
        {
            $value = $items[$i];
            $pos   = $i;
            $structureItem = new StructureItem();
            $structureItem->setIdStructure($idStructure);
            $structureItem->setposition($pos);
            $structureItem->setvalue($value);
            $structureDAO->addStructureItem($structureItem);
        }
    }

    function getStructures($idAnalyst)
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
        include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO   = new StructuresDAO();
        $structure      = new Structure();
        $listStructures =$structureDAO->listStructurs($idAnalyst);
        return $listStructures;
    }
     function getALLStructures()
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
        include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO   = new StructuresDAO();
        $structure      = new Structure();
        $listStructures =$structureDAO->listALLStructurs();
        return $listStructures;
    }
    function getItemStructure($idStructure)
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
        include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO   = new StructuresDAO();
        $structure      = new Structure();
        $list           = $structureDAO->listStructureItems($idStructure);
        return        $list;
    }
    function updateStructure($idStructure,$idAnalyst,$name,$items,$idStructureItem)
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
        include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO  = new StructuresDAO();
        $structure     = new Structure();
        $structure     ->setidAnalyst($idAnalyst);
        $structure     ->setName($name);
        $structureDAO->updateStructure($structure);
        $structureDAO->deleteStructureItem($idStructureItem);
        for($i = 0; $i <count($items);$i++)
        {
            $structureItem = new StructureItem();
            $structureItem->setposition($pos);
            $structureItem->setvalue($value);
            $structureDAO->addStructureItem($structureItem);
        }
    }
    

    
    function deleteStructure($idStructure)
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
        include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO   = new StructuresDAO();
        $structure      = new Structure();
        $structureDAO->deleteStructureItem($idStructure);
        $structureDAO->deleteStructure($idStructure);
        
    }
    function getStructure($idStructure)
    {
        include_once  '../../BusinessObjects/StructureItem.php';
        include_once  '../../BusinessObjects/Structure.php';
        include_once  '../../DataAccess/StructuresDAO.php';
        $structureDAO   = new StructuresDAO();
        $structure =$structureDAO->getStructure($idStructure);
        return        $structure;
    }

}

