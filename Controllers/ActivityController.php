<?php
	$activitiesController = new ActivityController();
	$action = $_GET["action"];
	switch ($action) {
	    case "save":
	    	$activitiesController->createActivity($_GET["idASM"],$_GET["idActivity"],$_GET["seqNumber"],$_GET["name"],$_GET["idSourceAgent"],$_GET["idTargetAgent"]);    
			break;
	    case "update":
	        $activitiesController->editActivity($_GET["idASM"],$_GET["idActivity"],$_GET["seqNumber"],$_GET["name"],$_GET["idSourceAgent"],$_GET["idTargetAgent"]);    
	        echo $_GET["idASM"].$_GET["idActivity"].$_GET["seqNumber"].$_GET["name"].$_GET["idSourceAgent"].$_GET["idTargetAgent"];
	        break;
		case "updatePosition":
	        $activitiesController->editActivityPosition($_GET["idASM"],$_GET["idActivity"],$_GET["positionX"],$_GET["positionY"]);    
	        break;	
	    case "updateID":
	    	$activitiesController->editActivityID($_GET["idASM"],$_GET["idActivity"],$_GET["newIdActivity"]);    
	    	break;
	    case "getActivities":
	    	$activitiesController->getActivities($_GET["idASM"]);
	    	break;
	    case "delete":
	        $activitiesController->deleteActivity($_GET["idASM"],$_GET["idActivity"]);    
	        break;
	}

class ActivityController {
    private $ActivityDAO;
    /*
     * 
     */
    function createActivity($idASM, $idActivity, $seqNumber, $name,  $idSourceAgent, $idTargetAgent) {
      	include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';		        
        try{
      	$newActivity = new Activity();
	    $newActivity->setIdASM($idASM);
	    $newActivity->setIdActivity($idActivity);
	    $newActivity->setSeqNumber($seqNumber);
	    $newActivity->setName($name);
	    $newActivity->setIdSourceAgent($idSourceAgent);
	    $newActivity->setIdTargetAgent($idTargetAgent);
	    $ActivityDAO = new ActivityDAO();
	    $ActivityDAO->saveActivity($newActivity);}
	    catch(Exception $e){	}
    }
    /*
     * This function allows to check if a user can login.
     */
    function getActivity($idASM,$idActivity) {
        include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';
        $ActivityDAO = new ActivityDAO();
        $foundActivity = $ActivityDAO->getActivity($idASM,$idActivity);
        return $foundActivity;
    }
    /*
     * This function allows to edit an existent Analyst.
     */
    function editActivity($idASM,$idActivity, $seqNumber, $name,$idSourceAgent, $idTargetAgent) {
        include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';
      	  
        $editedActivity= new Activity();
        $editedActivity->setIdASM($idASM);
        $editedActivity->setIdActivity($idActivity);
        $editedActivity->setSeqNumber($seqNumber);
        $editedActivity->setName($name);
        $editedActivity->setIdSourceAgent($idSourceAgent);
        $editedActivity->setIdTargetAgent($idTargetAgent);
        $ActivityDAO = new ActivityDAO();
        $ActivityDAO->updateActivity($editedActivity);
    } 
    /*
     * This function allows to edit an existent Analyst.
     */
    function editActivityPosition($idASM,$idActivity, $positionX, $positionY) {
        include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';
        
        $editedActivity= new Activity();
        $editedActivity->setIdASM($idASM);
        $editedActivity->setIdActivity($idActivity);
        $editedActivity->setPositionX($positionX);
        $editedActivity->setPositionY($positionY);
        $ActivityDAO = new ActivityDAO();
        $ActivityDAO->updateActivityPosition($editedActivity);
    } 
    
    function editActivityID($idASM,$idActivity, $newIdActivity) {
        include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';
        
        $editedActivity= new Activity();
        $editedActivity->setIdASM($idASM);
        $editedActivity->setIdActivity($idActivity);
        $ActivityDAO = new ActivityDAO();
        $ActivityDAO->updateActivityId($editedActivity,$newIdActivity);
    } 
    function deleteActivity($idASM, $idActivity){
    	include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';
        $editedActivity= new Activity();
        $editedActivity->setIdASM($idASM);
        $editedActivity->setIdActivity($idActivity);
        $ActivityDAO = new ActivityDAO();
        $ActivityDAO->deleteActivity($editedActivity);
        echo "works";
    }
    /*
     * This function allows to list All existents Analysts.
     */
    function getActivities($idASM) {
        include_once  '../BusinessObjects/Activity.php';
        include_once  '../DataAccess/ActivityDAO.php';
        $ActivityDAO = new ActivityDAO();
        $Activities = $ActivityDAO->listActivities($idASM);
        $answer= "";
        echo "<activities>";
        for($i=0;$i<count($Activities); $i++){
        	$activity= $Activities[$i];
        	echo "<activity>";
			echo "<idASM>".$activity->getIdASM()."</idASM>";
        	echo "<idActivity>".$activity->getIdActivity()."</idActivity>";
        	echo "<name>".$activity->getName()."</name>";
        	echo "<sourceAgent>".$activity->getIdSourceAgent()."</sourceAgent>";
        	echo "<targetAgent>".$activity->getIdTargetAgent()."</targetAgent>";
        	echo "<seqNumber>".$activity->getSeqNumber()."</seqNumber>";
        	echo "<positionX>".$activity->getPositionX()."</positionX>";
        	echo "<positionY>".$activity->getPositionY()."</positionY>";
        	echo "</activity>";
        }
        echo "</activities>";
        return $answer;
	}
    
    
}