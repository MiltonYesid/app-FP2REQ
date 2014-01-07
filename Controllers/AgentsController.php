<?php
	$agentsController = new AgentsController();
	$action = $_GET["action"];
	switch ($action) {
	    case "save":
	    	$agentsController->createAgent($_GET["idASM"],$_GET["idAgent"],$_GET["name"],$_GET["positionX"],$_GET["positionY"]);    
			break;
	    case "update":
	        $agentsController->editAgent($_GET["idASM"],$_GET["idAgent"],$_GET["name"]);
	        break;
	    case "updatePosition":
	        $agentsController->editAgentPosition($_GET["idASM"],$_GET["idAgent"],$_GET["positionX"],$_GET["positionY"]);
	        break;
	    case "getAgents":
	    	$agentsController->getAgents($_GET["idASM"]);
	    	break;
	    case "updateBlocked":
	    	$agentsController->blockedToggle($_GET["idASM"],$_GET["idAgent"],$_GET["blocked"]);
	    	break;
	    case "delete":
	        $agentsController->deleteAgent($_GET["idASM"],$_GET["idAgent"]);    
	        break;
	    case "changeID":
	    	$agentsController->changeIDAgent($_GET["idASM"],$_GET["idAgent"],$_GET["NewIdAgent"]);    
	    	break;
	    	
	}


class AgentsController {
    private $AgentDAO;
    /*
     * 
     */
    function createAgent($idASM,$idAgent,$name,$positionX,$positionY) {
    	include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
       
        $newAgent = new Agent();
        $newAgent->setName($name);
        $newAgent->setIdAgent($idAgent);
        $newAgent->setIdASM($idASM);
        $newAgent->setPositionX($positionX);
        $newAgent->setPositionY($positionY);
        $newAgent->setBlocked(1);
        $AgentDAO = new AgentDAO();
        $AgentDAO->saveAgent($newAgent);
    }
    /*
     * This function allows to check if a user can login.
     */
    function getAgent($idASM,$idAgent) {
        include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $AgentDAO = new AgentDAO();
        $foundAgent = $AgentDAO->getAgent($idASM,$idAgent);
        return $foundAgent;
    }
    /*
     * This function allows to edit an existent Analyst.
     */
    function editAgent($idASM, $idAgent, $name) {
        include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $AgentDAO = new AgentDAO();
        $editedAgent= new Agent();
        $editedAgent->setIdASM($idASM);
        $editedAgent->setIdAgent($idAgent);
        $editedAgent->setName($name);
        $AgentDAO->updateAgent($editedAgent);
    }
    /*
     * This function allows to edit the position of an existent Analyst.
     */
    function editAgentPosition($idASM, $idAgent,$positionX,$positionY) {
        include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $AgentDAO = new AgentDAO();
        $editedAgent= new Agent();
        $editedAgent->setIdASM($idASM);
        $editedAgent->setIdAgent($idAgent);
        $editedAgent->setPositionX($positionX);
        $editedAgent->setPositionY($positionY);
        $AgentDAO->updateAgentPosition($editedAgent);
        
    }
    function changeIDAgent($idASM, $idAgent,$NewIdAgent) {
        include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $AgentDAO = new AgentDAO();
        $editedAgent= new Agent();
        $editedAgent->setIdASM($idASM);
        $editedAgent->setIdAgent($idAgent);
        $AgentDAO->updateAgentID($editedAgent,$NewIdAgent);
        
    }
    /*
     * This function allows to edit the position of an existent Analyst.
     */
    function blockedToggle($idASM, $idAgent,$blocked) {
        include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $AgentDAO = new AgentDAO();
        $editedAgent= new Agent();
        $editedAgent->setIdASM($idASM);
        $editedAgent->setIdAgent($idAgent);
        if($blocked=="true"){
        	$blocked = 0;
        }else{
        	$blocked = 1;
        }
        $editedAgent->setBlocked($blocked);
        $AgentDAO->blockedToggle($editedAgent);
    }
    /*
     * This function allows to list All existents Analysts.
     */
    function getAgents($idASM) {
        include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $AgentDAO = new AgentDAO();
        $Agents = $AgentDAO->listAgents($idASM);
        $answer= "";
        echo "<agents>";
        for($i=0;$i<count($Agents); $i++){
        	$agent= $Agents[$i];
        	echo "<agent>";
			echo "<idASM>".$agent->getIdASM()."</idASM>";
        	echo "<idAgent>".$agent->getIdAgent()."</idAgent>";
        	echo "<name>".$agent->getName()."</name>";
        	echo "<positionX>".$agent->getPositionX()."</positionX>";
        	echo "<positionY>".$agent->getPositionY()."</positionY>";
        	echo "<blocked>".$agent->getBlocked()."</blocked>";
			echo "</agent>";
        }
        echo "</agents>";
        return $answer;
    }
    function deleteAgent($idASM, $idAgent){
    	include_once  '../BusinessObjects/Agent.php';
        include_once  '../DataAccess/AgentDAO.php';
        $Agent= new Agent();
        $Agent->setIdASM($idASM);
        $Agent->setIdAgent($idAgent);
        $AgentDAO = new AgentDAO();
        $AgentDAO->deleteAgent($Agent);
    }
    
}