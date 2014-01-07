<?php
	class ActivityDAO{
		function saveActivity($newActivity) {
		include_once 'Connections/Connection.php';
    	include_once '../BusinessObjects/Activity.php';
    	$connection = getConnection();
    	mysql_query("INSERT INTO asm_activity(name, idActivity, idASM, idSourceAgent, idTargetAgent,sequenceNumber) values('" .
                    $newActivity->getName(). "',".
                    $newActivity->getIdActivity(). ",".
                    $newActivity->getIdASM(). ",".
                    $newActivity->getIdSourceAgent(). ",".
                    $newActivity->getIdTargetAgent(). ",".
                    $newActivity->getSeqNumber().")", $connection) or die("Problemas en el select" . mysql_error());
    	close($connection);
	}
	function getActivity($idASM, $idActivity) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Activity.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM asm_activity WHERE
                idActivity=".$idActivity." AND idASM=".$idASM, $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $Activity = new Activity();
            $Activity->setName($reg['name']);
            $Activity->setIdASM($reg['idASM']);
            $Activity->setIdActivity($reg['idActivity']);
            $Activity->setIdSourceAgent($reg['idSourceAgent']);
            $Activity->setIdTargetAgent($reg['idTargetAgent']);
            $Activity->setSeqNumber($reg['sequenceNumber']);
            $Activity->setPositionX($reg['positionX']);
            $Activity->setPositionY($reg['positionY']);
            close($connection);
            return $Activity;
        } else {
            close($connection);
            return NULL;
        }
    }
    
    function updateActivity($Activity) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Activity.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_activity SET
        			name='".$Activity->getName().
                    "', sequenceNumber=".$Activity->getSeqNumber().
                    ", idSourceAgent=".$Activity->getIdSourceAgent().
                    ", idTargetAgent=".$Activity->getIdTargetAgent().
                    " WHERE idActivity=".$Activity->getIdActivity().
                    " AND idASM=".$Activity->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    
    function updateActivityPosition($Activity) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Activity.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_activity SET
        			 positionX=".$Activity->getPositionX().
                    ", positionY=".$Activity->getPositionY().
                    " WHERE idActivity=".$Activity->getIdActivity().
                    " AND idASM=".$Activity->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function updateActivityId($Activity,$newActivity) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Activity.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_activity SET
        			 idActivity=".$newActivity.
                    " WHERE idActivity=".$Activity->getIdActivity().
                    " AND idASM=".$Activity->getIdASM(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    
    function deleteActivity($Activity){
		include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Activity.php';
        $connection = getConnection();
        mysql_query("DELETE FROM asm_activity WHERE idActivity=".$Activity->getIdActivity()
                        ." AND idASM=".$Activity->getIdASM(), $connection) or
                die("Impossible to delete." . mysql_error());
		                        
        close($connection);
	}
    function listActivities($idASM) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/Activity.php';
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
}
?>