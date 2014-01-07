<?php

class AgentDAO{
	function saveAgent($newAgent) {
    	include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        
        mysql_query("INSERT INTO asm_agent(name,idAgent,idASM,positionX, positionY, blocked) values('" .
                        $newAgent->getName(). "',".
                        $newAgent->getIdAgent(). ",".
                        $newAgent->getIdASM(). ",".
                        $newAgent->getPositionX(). ",".
                        $newAgent->getPositionY(). ",1)", $connection) or die("Problemas en el select" . mysql_error());
		                        
        close($connection);
	}
	function deleteAgent($Agent){
		include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        mysql_query("DELETE FROm asm_agent WHERE idAgent=".$Agent->getIdAgent()
                        ." AND idASM=".$Agent->getIdASM(), $connection) or
                die("Impossible to delete." . mysql_error());
		                        
        close($connection);
	}
	
	function getAgent($idASM,$idAgent) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        
        $registros = mysql_query("SELECT * FROM asm_agent WHERE
                idAgent=".$idAgent, $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $Agent = new ASM();
            $Agent->setName($reg['name']);
            $Agent->setIdASM($reg['idASM']);
            close($connection);
            return $Agent;
        } else {
            close($connection);
            return NULL;
        }
    }
    
    function updateAgent($Agent) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_agent
                        SET name='".$Agent->getName().
                        "' WHERE idAgent=".$Agent->getIdAgent()
                        ." AND idASM=".$Agent->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    
    function updateAgentID($Agent,$NewIdAgent){
    	include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_agent
                        SET idAgent=".$NewIdAgent.
                        " WHERE idAgent=".$Agent->getIdAgent()
                        ." AND idASM=".$Agent->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function updateAgentPosition($Agent){
    	include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_agent
                        SET positionX=".$Agent->getPositionX().
                        ", positionY=".$Agent->getPositionY()." WHERE idAgent=".$Agent->getIdAgent()
                        ." AND idASM=".$Agent->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
        
    }
    
    function blockedToggle($Agent){
    	include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
        $connection = getConnection();
        $boolBlocked = $Agent->getBlocked()=="true"? 0:1;
        $registros = mysql_query("UPDATE asm_agent
                        SET blocked=".$boolBlocked.
                        " WHERE idAgent=".$Agent->getIdAgent()
                        ." AND idASM=".$Agent->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function listAgents($idASM) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Agent.php';
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
}
?>