<?php
class AnalystDAO {
    private $classConnection;
    
    function __construct() {
    }
    function saveAnalyst($newAnalyst) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Analyst.php';
        $connection = getConnection();
        mysql_query("INSERT INTO analyst(first_name,last_name,email,password,organization,position) values('" .
                        $newAnalyst->getFirstName() . "','" .
                        $newAnalyst->getLastName() . "','" .
                        $newAnalyst->getEmail() . "','" .
                        $newAnalyst->getPassword() . "','" .
                        $newAnalyst->getOrganization() . "','" .
                        $newAnalyst->getPosition() . "')", $connection) or die("Problemas en el select" . mysql_error());
        close($connection);
    }
    function getAnalyst($userName, $password) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Analyst.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM analyst WHERE
                email='$userName' AND
                password='$password'", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $Analyst = new Analyst();
            $Analyst->setIdAnalyst($reg['idAnalyst']);
            $Analyst->setFirstName($reg['first_name']);
            $Analyst->setLastName($reg['last_name']);
            $Analyst->setEmail($reg['email']);
            $Analyst->setPassword($reg['password']);
            $Analyst->setOrganization($reg['organization']);
            $Analyst->setPosition($reg['position']);
            close($connection);
            return $Analyst;
        } else {
            close($connection);
            return NULL;
        }
    }

     function getAnalystPassword($password) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Analyst.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM analyst WHERE
                password='$password' ", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $Analyst = new Analyst();
            $Analyst->setIdAnalyst($reg['idAnalyst']);
            $Analyst->setFirstName($reg['first_name']);
            $Analyst->setLastName($reg['last_name']);
            $Analyst->setEmail($reg['email']);
            $Analyst->setPassword($reg['password']);
            $Analyst->setOrganization($reg['organization']);
            $Analyst->setPosition($reg['position']);
            close($connection);
            return $Analyst;
        } else {
            close($connection);
            return NULL;
        }
    }
    function updateAnalyst($Analyst) {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Analyst.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE Analyst
                         SET first_name='".$Analyst->getFirstName()."', 
                         last_name = '".$Analyst->getLastName()."',
                         email= '".$Analyst->getEmail()."',
                         organization='".$Analyst->getOrganization()."',
                         position='".$Analyst->getPosition()."'
                         WHERE idAnalyst='".$Analyst->getIdAnalyst()."'", $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function listAnalysts() {
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Analyst.php';
        $connection = getConnection();
        $Analysts = array();
        $registros = mysql_query("select * from Analyst", $connection) or
                die("Problemas en el select:" . mysql_error());
        while ($reg = mysql_fetch_array($registros)) {
            $Analyst = new Analyst();
            $Analyst->setIdAnalyst($reg['idAnalyst']);
            $Analyst->setFirstName($reg['first_name']);
            $Analyst->setLastName($reg['last_name']);
            $Analyst->setEmail($reg['email']);
            $Analyst->setPassword($reg['password']);
            $Analyst->setOrganization($reg['organization']);
            $Analyst->setPosition($reg['position']);
            $Analysts[] = $Analyst;
        }
        return $Analysts;
        close($connection);
    }
}