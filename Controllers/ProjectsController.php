<?php
class ProjectsController{
    /*
     * This function allows to create a new Project.
     */
    function createProject($idAnalyst, $idProject, $name, $description,$name_company) {
        include_once  '../../BusinessObjects/Project.php';
        include_once  '../../DataAccess/ProjectDAO.php';
        //It's created a new Project object and it is filled with function's args.
        $start_date =  date("Y-m-d");
        $newProject = new Project();
        $newProject->setIdAnalyst($idAnalyst);
        $newProject->setIdProject($idProject);
        $newProject->setName($name);
        $newProject->setDescription($description);
        $newProject->setStarDate($start_date);
        $newProject->setEndDate("");   
        $newProject->setCompany_name($name_company);
        //We saved new Project object created.
        $ProjectDAO = new ProjectDAO();
        $ProjectDAO->saveProject($newProject);
    }
    /*
     * This function allows to search an especific project
     */

    function getProject($idProject) {
        include_once '../../BusinessObjects/Project.php';
        include_once '../../DataAccess/ProjectDAO.php';
        $ProjectDAO = new ProjectDAO();
        $foundProject = $ProjectDAO->getProject($idProject);
        return $foundProject;
    }

    /*
     * This function allows to edit an existent Project.
     */

    function editProject($editedProject) {
        include_once '../../BusinessObjects/Project.php';
        include_once '../../DataAccess/ProjectDAO.php';
        $ProjectDAO = new ProjectDAO();
        $ProjectDAO->updateProject($editedProject);
    }

    /*
     * This function allows to list All existents Projects.
     */

    function getProjects($idAnalyst) {
        include_once '../../BusinessObjects/Project.php';
        include_once '../../DataAccess/ProjectDAO.php';
        $ProjectDAO = new ProjectDAO();
        $Projects = $ProjectDAO->listProjects($idAnalyst);
        return $Projects;
    }
    function deleteProject($idProject)
    {
        include_once '../../BusinessObjects/Project.php';
        include_once '../../DataAccess/ProjectDAO.php';
        $ProjectDAO = new ProjectDAO();
        $ProjectDAO->deleteProject($idProject);
    }
}
