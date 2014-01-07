<?php
class Agent{
	private $idASM;
	private $idAgent;
	private $name;
	private $blocked;
	private $positionX;
	private $positionY;
	
	public function getIdAgent(){
		return $this->idAgent;
	}
	public function getIdASM(){
		return $this->idASM;
	}
	public function getName(){
		return $this->name;
	}
	public function getPositionX(){
		return $this->positionX;
	}
	public function getPositionY(){
		return $this->positionY;
	}
	public function getBlocked(){
		return $this->blocked;
	}
	public function setIdAgent($param){
		$this->idAgent=$param;	
	}
	public function setIdASM($param){
		$this->idASM=$param;	
	}
	public function setName($param){
		$this->name=$param;	
	}
	public function setPositionX($param){
		$this->positionX=$param;	
	}
	public function setPositionY($param){
		$this->positionY=$param;	
	}
	public function setBlocked($param){
		$this->blocked=$param;	
	}
}

?>