<?php
class ProjectDAO {
    function ProjectDAO(){
        
    }
    function saveProject($newProject){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Project.php';
        $idA            = $newProject->getIdAnalyst();
        $fecha          = $newProject->getStarDate();
        $descripcion    = $newProject->getDescription();
        $nombre         = $newProject->getName();
        $nombreCompany  = $newProject->getCompany_name();
        $connection     = getConnection();
        mysql_query("INSERT INTO project(idAnalyst,name,description,company,start_Date) values('" .
                        $idA. "','" .
                        $nombre. "','" .
                        $descripcion. "','" .
                        $nombreCompany. "','" .
                        $fecha. "')", $connection) or die("Problemas en el select" . mysql_error());
        close($connection);
    }
    function getProject($idProject){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Project.php';
        $connection = getConnection();
        $registros = mysql_query("SELECT * FROM project WHERE
                idProject='$idProject' AND active='Yes'", $connection) or
                die("Unsuccessful query " . mysql_error());
        if ($reg = mysql_fetch_array($registros)) {
            $Project = new Project();
            $Project->setIdAnalyst($reg['idAnalyst']);
            $Project->setIdProject($reg['idProject']);
            $Project->setName($reg['name']);
            $Project->setDescription($reg['description']);
            $Project->setCompany_name($reg['company']);
            $Project->setStarDate($reg['start_Date']);
            $Project->setEndDate($reg['end_Date']);
            close($connection);
            return $Project;
        } else {
            close($connection);
            return null;
        }
    }
    function updateProject($Project){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Project.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE project
                         SET name='".$Project->getName()."', 
                         description = '".$Project->getDescription()."',
                         company   = '".$Project->getCompany_name()."', 
                         start_Date= '".$Project->getStarDate()."',
                         end_Date='".$Project->getEndDate()."' 
                         WHERE idProject='".$Project->getIdProyect()."'", $connection) or
                die("Impossible to update register." . mysql_error());
        close($connection);
    }
    function listProjects($idAnalyst){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Project.php';
        
        $connection = getConnection();
        $Projects = array();
        $registros = mysql_query("select * from project WHERE idAnalyst='$idAnalyst' AND active='Yes'", $connection) or
                die("Problemas en el select:" . mysql_error());

        while ($reg = mysql_fetch_array($registros)) {
            $Project = new Project();
            $Project->setIdAnalyst($reg['idAnalyst']);
            $Project->setIdProject($reg['idProject']);
            $Project->setName($reg['name']);
            $Project->setDescription($reg['description']);
            $Project->setStarDate($reg['start_Date']);
            $Project->setEndDate($reg['end_Date']);        
            $Projects[] = $Project;
        }
        return $Projects;
        close($connection);
    }
    function deleteProject($idProject){
        include_once 'Connections/Connection.php';
        include_once '../../BusinessObjects/Project.php';
        $connection = getConnection();
        $registros = mysql_query("UPDATE project
                         SET active='Not'
                         WHERE idProject='$idProject'", $connection) or
                die("Impossible to update register." . mysql_error());
    }
}
