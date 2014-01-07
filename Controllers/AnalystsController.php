<?php
class AnalystsController {
    private $AnalystDAO;
    private $ubicacion="";
    /*
     * This function allows to create a new Analyst.
     */
    function setUbication($ub)
    {
        $this->ubicacion=$ub;
    }
    function createAnalyst($first_name, $last_name, $email, $password, $organization, $position) {
        include_once  '../../BusinessObjects/Analyst.php';
        include_once  '../../DataAccess/AnalystDAO.php';
        //It's created a new Analyst object and it is filled with function's args.
        $newAnalyst = new Analyst();
        $newAnalyst->setFirstName($first_name);
        $newAnalyst->setLastName($last_name);
        $newAnalyst->setEmail($email);
        $newAnalyst->setPassword($password);
        $newAnalyst->setOrganization($organization);
        $newAnalyst->setPosition($position);

        //We saved new Analyst object created.
        $AnalystDAO = new AnalystDAO();
        $AnalystDAO->saveAnalyst($newAnalyst);
    }
    function updateAnalyst($idAnalyst,$first_name, $last_name, $position, $email, $organization)
    {
        include_once  '../../BusinessObjects/Analyst.php';
        include_once  '../../DataAccess/AnalystDAO.php';

        $newAnalyst = new Analyst();
        $newAnalyst->setIdAnalyst($idAnalyst);
        $newAnalyst->setFirstName($first_name);
        $newAnalyst->setLastName($last_name);
        $newAnalyst->setEmail($email);
        $newAnalyst->setOrganization($organization);
        $newAnalyst->setPosition($position);
        //We saved new Analyst object created.
        $AnalystDAO = new AnalystDAO();
        $AnalystDAO->updateAnalyst($newAnalyst);
    }
    /*
     * This function allows to check if a user can login.
     */
    function getAnalyst($email, $password) {
        include_once $this->ubicacion.'../../BusinessObjects/Analyst.php';
        include_once $this->ubicacion.'../../DataAccess/AnalystDAO.php';
        $AnalystDAO = new AnalystDAO();
        
        $foundAnalyst = $AnalystDAO->getAnalyst($email, $password);
        return $foundAnalyst;
    }
    /*
     * This function allows to edit an existent Analyst.
     */
    /*function editAnalyst($editedAnalyst) {
        include_once '../../BusinessObjects/Analyst.php';
        include_once '../../DataAccess/AnalystDAO.php';
        $AnalystDAO = new AnalystDAO();
        $AnalystDAO->updateAnalyst($editedAnalyst);
    }* 
    /*
     * This function allows to list All existents Analysts.
     */
    function getAnalysts() {
        include_once '../../BusinessObjects/Analyst.php';
        include_once '../../DataAccess/AnalystDAO.php';
        $AnalystDAO = new AnalystDAO();
        $Analysts = $AnalystDAO->listAnalysts();
        return $Analysts;
    }
    function getHaveCountSite($email)
    {
        $ListAnalist = $this -> getAnalysts();
        if($ListAnalist!=null)
        {
        $cant        = count($ListAnalist);
        for($i = 0 ; $i < $cant ;$i++)
        {
            $analyst = $ListAnalist[$i];
            if($analyst->getEmail() == $email)
            {
                return true;
            }
        }
        return false;
        }else
        {
        return false;
        }
    }
}