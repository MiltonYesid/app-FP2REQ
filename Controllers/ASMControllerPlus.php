<?php

/*
 * se encarga de las funciones minimas para obtener la informacion de los controladores de acrividad,reglas de negocio y agentes
 */

/**
 * Description of ASMControllerPlus
 *
 * @author Milton Yesid
 */
class ASMControllerPlus {

    function getAgents($idASM) {
        include_once '../../BusinessObjects/Agent.php';
        include_once '../../DataAccess/ASMutilDAO.php';
        $AgentDAO = new AgentDAO();
        $listAgents = array();
        $Agents = $AgentDAO->listAgents($idASM);
        for ($i = 0; $i < count($Agents); $i++) {
            $agent = $Agents[$i];
            $agent->getName();
            $listAgents[] = $agent->getName();
        }
        return $listAgents;
    }

    function getActivitiesId($idASM) {
        include_once '../../BusinessObjects/Activity.php';
        include_once '../../DataAccess/ASMutilDAO.php';
        $ActivityDAO = new ActivityDAO();
        $Activities = $ActivityDAO->listActivities($idASM);
        $listActivities = array();
        for ($i = 0; $i < count($Activities); $i++) {
            $activity = $Activities[$i];
           $listActivities[] = $activity->getIdActivity();
        }
        return $listActivities;
    }
function getActivitiesName($idASM) {
        include_once '../../BusinessObjects/Activity.php';
        include_once '../../DataAccess/ASMutilDAO.php';
        $ActivityDAO = new ActivityDAO();
        $Activities = $ActivityDAO->listActivities($idASM);
        $listActivities = array();
        for ($i = 0; $i < count($Activities); $i++) {
            $activity = $Activities[$i];
            $listActivities[] = $activity->getName();
        }
        return $listActivities;
    }
    function getBRs($idASM, $idActivity) {
        include_once '../../BusinessObjects/BR.php';
        include_once '../../DataAccess/ASMutilDAO.php';
        $BRDAO = new BRDAO();
        $BRs = $BRDAO->listBRs();
        $listBR = array();
        for ($i = 0; $i < count($BRs); $i++) {
            $br = $BRs[$i];
            $listBR[] = $br->getName();
        }
        return $listBR;
    }
    function getTasks($idASM, $idActivity) {
	        include_once  '../../BusinessObjects/Task.php';
	        include_once  '../../DataAccess/ASMutilDAO.php';
	        $TaskDAO = new TaskDAO();
	        $Tasks = $TaskDAO->listTasks();
	        $listTasks = array();
        	for($i=0;$i<count($Tasks); $i++){
	        	$task= $Tasks[$i];
	        	 $listTasks[] = $task->getName()."(".$task->getParameters().")";
        	}
        	return $listTasks;
	    }

}

?>
