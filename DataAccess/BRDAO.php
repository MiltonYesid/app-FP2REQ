<?php

/**
 * Description of BRDAO
 *
 * @author AleJo Suárez
 */
class BRDAO {
    function saveBR($newBR) {
    	include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/BR.php';
        $connection = getConnection();
        mysql_query("INSERT INTO asm_br(idASM,idActivity,idBR,rule) values(".
        				$newBR->getIdASM()."," .
        				$newBR->getIdActivity()."," .
        				$newBR->getIdBR().",'" .
        				$newBR->getName().
                         "')", $connection) or die("Problemas en el select" . mysql_error());
        close($connection);
	}
	function getBR($idASM,$idActivity,$idBR) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/BR.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM asm_br WHERE
                idASM=".$idASM." AND idActivity".$idActivity." AND idBR=".$idBR, $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $BR = new BR();
            $BR->setIdASM($reg['idASM']);
            $BR->setIdActivity($reg['idActivity']);
            $BR->setIdBR($reg['idBR']);
            $BR->setName($reg['rule']);
            close($connection);
            return $BR;
        } else {
            close($connection);
            return NULL;
        }
    }
    
    function updateBR($BR) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/BR.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm_br SET rule='".$BR->getName().
						"' WHERE idASM=".$BR->getIdASM().
						" AND idActivity=".$BR->getIdActivity().
						" AND idBR=".$BR->getIdBR(), $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function listBRs($idASM, $idActivity) {
        include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/BR.php';
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
    
    function deleteBR($BR){
		include_once 'Connections/Connection.php';
        include_once '../BusinessObjects/BR.php';
        $connection = getConnection();
        mysql_query("DELETE FROM asm_br WHERE idASM=".$BR->getIdASM()." AND idActivity=".$BR->getIdActivity()." AND idBR=".$BR->getIdBR(), $connection) or
                die("Impossible to delete." . mysql_error());
        close($connection);
	}
	
}

?>

