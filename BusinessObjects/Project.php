<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Project
 *
 * @author AleJo Suárez
 */
class Project {
    private $idProyect;
    private $idAnalyst;
    private $name;
    private $description;
    private $star_date;
    private $end_date;
    private $company_name;
    public function getCompany_name()
    {
        return $this->company_name;
    }
    public function setCompany_name($name)
    {
        $this->company_name = $name;
    }
    public function getIdProyect(){
        return $this->idProyect;
    }
     
    public function getIdAnalyst(){
           return $this->idAnalyst;
    }
    public function getName(){
           return $this->name;
    }
    public function getDescription(){
           return $this->description;
    }
    public function getStarDate(){
           return $this->star_date;
    }
    public function getEndDate(){
           return $this->end_date;
    }
    public function setIdProject($param){
       $this->idProyect= $param;
    }
    public function setIdAnalyst($param){
       $this->idAnalyst= $param;
    }
    public function setName($param){
       $this->name= $param;
    }
    public function setDescription($param){
       $this->description= $param;
    }
    public function setStarDate($param){
       $this->star_date= $param;
    }
    public function setEndDate($param){
       $this->end_date= $param;
    }
    //put your code here
}
?>
