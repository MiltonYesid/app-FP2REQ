<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskDAO
 *
 * @author AleJo Suárez
 */
class TaskDAO {
    function saveTask($newTask) {
    	include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Task.php';
        $connection = getConnection();
        mysql_query("INSERT INTO asm_task(idASM,idActivity,idTask,name,parameters) values(".
        				$newTask->getIdASM()."," .
        				$newTask->getIdActivity()."," .
        				$newTask->getIdTask().",'" .
                        $newTask->getName(). "','".
                        $newTask->getParameters()."')", $connection) or die("Problemas en el select" . mysql_error());
        close($connection);
	}
	function getTask($idASM,$idActivity,$idTask) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Task.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM asm_task WHERE
                idTask=".$idTask." AND idASM=".$idASM." AND idActivity=".$idActivity , $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $Task = new Task();
            $Task->setIdASM($reg['idActivity']);
            $Task->setIdActivity($reg['idActivity']);
            $Task->setIdTask($reg['idTask']);
            $Task->setName($reg['name']);
            $Task->setParameters($reg['parameters']);
            close($connection);
            return $Task;
        } else {
            close($connection);
            return NULL;
        }
    }
    
    function updateTask($Task) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Task.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_task SET name='"
        				 .$Task->getName()
                         ."',parameters='".$Task->getParameters().                         
						 "' WHERE idTask=".$Task->getIdTask()." AND idASM=".$Task->getIdASM()." AND idActivity=".$Task->getIdActivity() , $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function listTasks($idASM, $idActivity) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Task.php';
        $connection = getConnection();
        $Tasks = array();
        $registros = mysql_query("select * from asm_task WHERE idASM=".$idASM." AND idActivity=".$idActivity, $connection) or
                die("Problemas en el select:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
			$Task = new Task();
			$Task->setIdASM($reg['idASM']);
			$Task->setIdActivity($reg['idActivity']);
			$Task->setIdTask($reg['idTask']);
            $Task->setName($reg['name']);
            $Task->setParameters($reg['parameters']);
            $Tasks[] = $Task;
        }
        return $Tasks;
        close($connection);
    }
    
    function deleteTask($Task){
		include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Task.php';
        $connection = getConnection();
        mysql_query("DELETE FROM asm_task WHERE idASM=".$Task->getIdASM()." AND idActivity=".$Task->getIdActivity()." AND idTask=".$Task->getIdTask(), $connection) or
                die("Impossible to delete." . mysql_error());
        close($connection);
	}
	
}

?>

