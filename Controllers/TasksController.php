<?php
	$TasksController = new TasksController();
	$action = $_GET["action"];
	switch ($action) {
	    case "save":
	    	$TasksController->createTask($_GET["idASM"],$_GET["idActiv"],$_GET["idTask"],$_GET["name"],$_GET["parameters"]);    
			break;
	    case "update":
	        $TasksController->editTask($_GET["idASM"],$_GET["idActiv"],$_GET["idTask"],$_GET["name"],$_GET["parameters"]);    
	        break;
	    case "delete":
	        $TasksController->deleteTask($_GET["idASM"],$_GET["idActiv"],$_GET["idTask"]);    
	        break;
	    case "getTasks":
	    	$TasksController->getTasks($_GET["idASM"],$_GET["idActiv"]);    
	    	break;
	}
	class TasksController {
	    private $TaskDAO;
	    /*
	     * 
	     */
	    function createTask($idASM, $idActivity, $idTask,$name,$parameters) {
	        include_once  '../BusinessObjects/Task.php';
	        include_once  '../DataAccess/TaskDAO.php';
	       
	        $newTask = new Task();
	        $newTask->setIdASM($idASM);
	        $newTask->setIdActivity($idActivity);
	        $newTask->setIdTask($idTask);
	        $newTask->setName($name);
	        $newTask->setParameters($parameters);
	        $TaskDAO = new TaskDAO();
	        $TaskDAO->saveTask($newTask);
	    }
	 
	    /*
	     * This function allows to edit an existent Task.
	     */
	    function editTask($idASM, $idActivity, $idTask,$name,$parameters) {
	        include_once '../BusinessObjects/Task.php';
	        include_once '../DataAccess/TaskDAO.php';
	        $newTask = new Task();
	        $newTask->setIdASM($idASM);
	        $newTask->setIdActivity($idActivity);
	        $newTask->setIdTask($idTask);
	        $newTask->setName($name);
	        $newTask->setParameters($parameters);
	        $TaskDAO = new TaskDAO();
	        $TaskDAO->updateTask($newTask);
	    }
	    /*
	     * This function allows to list All existents Tasks.
	     */
	    function getTasks() {
	        include_once  '../BusinessObjects/Task.php';
	        include_once  '../DataAccess/TaskDAO.php';
	        $TaskDAO = new TaskDAO();
	        $Tasks = $TaskDAO->listTasks();
	        $answer= "";
        	echo "<tasks>";
        	for($i=0;$i<count($Tasks); $i++){
	        	$task= $Tasks[$i];
	        	echo "<task>";
				echo "<idASM>".$task->getIdASM()."</idASM>";
	        	echo "<idActivity>".$task->getIdActivity()."</idActivity>";
	        	echo "<idTask>".$task->getIdTask()."</idTask>";
	        	echo "<name>".$task->getName()."</name>";
	        	echo "<parameters>".$task->getParameters()."</parameters>";
	        	echo "</task>";
        	}
        	echo "</tasks>";
        	return $answer;
	    }
	    function deleteTask($idASM, $idActivity,$idTask){
	    	include_once  '../BusinessObjects/Task.php';
	        include_once  '../DataAccess/TaskDAO.php';
	        $Task= new Task();
	        $Task->setIdASM($idASM);
	        $Task->setIdActivity($idASM);
	        $Task->setIdTask($idTask);
	        $TaskDAO = new TaskDAO();
	        $TaskDAO->deleteTask($Task);
	   }
	   
	}
