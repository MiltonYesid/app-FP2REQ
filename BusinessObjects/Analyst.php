<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Analyst
 *
 * @author AleJo Suárez
 */
class Analyst {
    private $idAnalyst;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $organization;
    private $position;

    function getIdAnalyst() {
        return $this->idAnalyst;
    }

    function getFirstName() {
        return $this->first_name;
    }

    function getLastName() {
        return $this->last_name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getOrganization() {
        return $this->organization;
    }

    function getPosition() {
        return $this->position;
    }

    function setIdAnalyst($param) {
        $this->idAnalyst = $param;
    }

    function setFirstName($param) {
        $this->first_name = $param;
    }

    function setLastName($param) {
        $this->last_name = $param;
    }

    function setEmail($param) {
        $this->email = $param;
    }

    function setPassword($param) {
        $this->password = $param;
    }

    function setOrganization($param) {
        $this->organization = $param;
    }

    function setPosition($param) {
        $this->position = $param;
    }
}
?>
