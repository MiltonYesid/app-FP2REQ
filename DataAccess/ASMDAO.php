<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ASMDAO
 *
 * @author AleJo Suárez
 */
class ASMDAO {

    function saveASM($newASM) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/ASM.php';
        $connection = getConnection();
        mysql_query("INSERT INTO asm(idASM,name) values('" .
                        $newASM->getIdASM() .
                        $newASM->getName() . "')", $connection) or die("Problemas en el select" . mysql_error());
        close($connection);
    }

    function newASM($name, $idProject) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/ASM.php';
        $connection = getConnection();
        mysql_query("INSERT INTO asm(name,idProject) values('" . $name . "','" . $idProject . "')", $connection) or die("Problemas en el select" . mysql_error());
        close($connection);
        return $this->getIdName($name);
    }

    private function getIdName($name) {
        include_once 'Connections/Connection.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM asm WHERE name='$name'", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            ( $id = $reg['idASM']);
            close($connection);
            return $id;
        }
    }

    function getASM($idASM) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/ASM.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM asm WHERE
                idASM=" . $idASM, $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $ASM = new ASM();
            $ASM->setName($reg['name']);
            close($connection);
            return $ASM;
        } else {
            close($connection);
            return NULL;
        }
    }

    function updateASM($ASM) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/ASM.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE asm
                         SET name='" . $ASM->getName() . "' WHERE idASM='" . $ASM->getIdASM() . "'", $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }

    function listASMs($idProject) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/ASM.php';
        $connection = getConnection();
        $ASMs = array();
        $registros = mysql_query("select * from asm WHERE idProject='$idProject'"
                , $connection) or
                die("Problemas en el select:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $ASM = new ASM();
            $ASM->setIdASM($reg['idASM']);
            $ASM->setName($reg['name']);
            $ASMs[] = $ASM;
        }
        return $ASMs;
        close($connection);
    }

    function deleteASM($idASM) {
        include_once 'Connections/Connection.php';
        $connection = getConnection();
        $registros = mysql_query("DELETE  FROM asm WHERE
                idASM=" . $idASM, $connection) or
                die("Unsuccessful query " . mysql_error());
        close($connection);
    }

}

?>
