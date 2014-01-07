<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ASM
 *
 * @author AleJo Suárez
 */
class ASM {
	private $idAnalyst;
    private $idASM;
    private $name;
    
    
    public function getIdAnalyst(){
    	return $this->idAnalyst;
    }
    
    public function getIdASM(){
    	return $this->idASM;
    }
    
    public function getName(){
    	return $this->name;
    }
    
    public function setIdAnalyst($param){
    	$this->idAnalyst = $param;
	}
	
    public function setIdASM($param){
    	$this->idASM = $param;
	}
	public function setName($param)
        {
    	$this->name = $param;
	}
}

