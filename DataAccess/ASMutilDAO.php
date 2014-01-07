<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ASMutilDAO
 *
 * @author Milton Yesid
 */
class ASMutilDAO {
    
    function listAgents($idASM) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Agent.php';
        $connection = getConnection();
        $Agents = array();
        $registros = mysql_query("SELECT * FROM asm_agent WHERE idASM = ".$idASM." order by idAgent asc ", $connection) or
                die("Problemas en el select:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $Agent = new Agent();
            $Agent->setIdASM($reg['idASM']);
            $Agent->setIdAgent($reg['idAgent']);
            $Agent->setName($reg['name']);
            $Agent->setPositionX($reg['positionX']);
            $Agent->setPositionY($reg['positionY']);
            $Agent->setBlocked($reg['blocked']);
            $Agents[] = $Agent;
        }
        return $Agents;
        close($connection);
    }
    function listActivities($idASM) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Activity.php';
        $connection = getConnection();
        $Activities = array();
        $registros = mysql_query("SELECT * from asm_activity WHERE idASM=".$idASM." ORDER BY idActivity ASC", $connection) or
                die("Problemas en el select:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $Activity = new Activity();
            $Activity->setIdActivity($reg['idActivity']);
            $Activity->setIdASM($reg['idASM']);
            $Activity->setSeqNumber($reg['sequenceNumber']);
            $Activity->setIdSourceAgent($reg['idSourceAgent']);
            $Activity->setIdTargetAgent($reg['idTargetAgent']);
            $Activity->setName($reg['name']);
            $Activity->setPositionX($reg['positionX']);
            $Activity->setPositionY($reg['positionY']);
            $Activities[] = $Activity;
        }
        return $Activities;
        close($connection);
    }
     function listBRs($idASM, $idActivity) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/BR.php';
        $connection = getConnection();
        $BRs = array();
        $registros = mysql_query("select * from asm_br", $connection) or
                die("Problemas en el select:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
			$BR = new BR();
			$BR->setIdActivity($reg['idActivity']);
			$BR->setIdASM($reg['idASM']);
			$BR->setIdBR($reg['idBR']);
			$BR->setName($reg['name']);
            $BRs[] = $BR;
        }
        return $BRs;
        close($connection);
    }
    function listTasks($idASM, $idActivity) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Task.php';
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
    
}

?>
