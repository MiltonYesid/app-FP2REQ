<?php
	
	$BRsController = new BRsController();
	$action = $_GET["action"];
	echo $action;
	switch ($action) {
	    case "save":
	    	$BRsController->createBR($_GET["idASM"],$_GET["idActiv"],$_GET["idBR"],$_GET["name"]);    
			break;
	    case "update":
	        $BRsController->editBR($_GET["idASM"],$_GET["idActiv"],$_GET["idBR"],$_GET["name"]);    
	        break;
	    case "delete":
	        $BRsController->deleteBR($_GET["idASM"],$_GET["idActiv"],$_GET["idBR"]);    
	        break;
	    case "getBRs":
	    	$BRsController->getBRs($_GET["idASM"],$_GET["idActiv"]);    
	    	break;
	}
	class BRsController {
	    private $BRDAO;
	    /*
	     * 
	     */
	    function createBR($idASM, $idActivity, $idBR,$name) {
	        include_once  '../BusinessObjects/BR.php';
	        include_once  '../DataAccess/BRDAO.php';
	       
	        $newBR = new BR();
	        $newBR->setIdASM($idASM);
	        $newBR->setIdActivity($idActivity);
	        $newBR->setIdBR($idBR);
	        $newBR->setName($name);
	        $BRDAO = new BRDAO();
	        $BRDAO->saveBR($newBR);
	    }
	    /*
	     * 
	     */
	    function getBR($idBR) {
	        include_once  '../../BusinessObjects/BR.php';
	        include_once  '../../DataAccess/BRDAO.php';
	        $BRDAO = new BRDAO();
	        $foundBR = $BRDAO->getBR($idBR);
	        return $foundBR;
	    }
	    /*
	     * This function allows to edit an existent BR.
	     */
	    function editBR($idASM, $idActivity, $idBR,$name) {
	        include_once '../BusinessObjects/BR.php';
	        include_once '../DataAccess/BRDAO.php';
	        $newBR = new BR();
	        $newBR->setIdASM($idASM);
	        $newBR->setIdActivity($idActivity);
	        $newBR->setIdBR($idBR);
	        $newBR->setName($name);
	        $BRDAO = new BRDAO();
	        $BRDAO->updateBR($newBR);
	    }
	    /*
	     * This function allows to list All existents BRs.
	     */
	    function getBRs() {
	        include_once  '../BusinessObjects/BR.php';
	        include_once  '../DataAccess/BRDAO.php';
	        $BRDAO = new BRDAO();
	        $BRs = $BRDAO->listBRs();
	        $answer= "";
	        echo "<brs>";
	        for($i=0;$i<count($BRs); $i++){
	        	$br= $BRs[$i];
	        	echo "<br>";
				echo "<idASM>".$br->getIdASM()."</idASM>";
	        	echo "<idActivity>".$br->getIdAgent()."</idActivity>";
	        	echo "<name>".$br->getName()."</name>";
	        	echo "</br>";
	        }
	        echo "</brs>";
	        return $answer;
	    }
	    function deleteBR($idASM, $idActivity,$idBR){
	    	include_once  '../BusinessObjects/BR.php';
	    	include_once  '../DataAccess/BRDAO.php';
	        $BR= new BR();
	        $BR->setIdASM($idASM);
	        $BR->setIdActivity($idASM);
	        $BR->setIdBR($idBR);
	        $BRDAO = new BRDAO();
	        $BRDAO->deleteBR($BR);
	    }
	}