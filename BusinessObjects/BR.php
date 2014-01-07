<?php

/**
 * Description of BR
 *
 * @author AleJo Suárez
 */
class BR{
	private $idASM;
	private $idActivity;
	private $idBR;
	private $name;
	
	public function getIdASM(){
		return $this->idASM;
	}
	public function getIdActivity(){
		return $this->idActivity;
	}
	public function getIdBR(){
		return $this->idBR;
	}
	public function getName(){
		return $this->name;
	}
	public function setIdASM($param){
		$this->idASM = $param;
	}
	public function setIdActivity($param){
		$this->idActivity = $param;
	}
	public function setIdBR($param){
		$this->idBR = $param;
	}
	public function setName($param){
		$this->name = $param;
	}
}
?>