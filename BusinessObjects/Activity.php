<?php

/**
 * Description of Activity
 *
 * @author AleJo Suárez
 */
class Activity{
	private $idASM;
	private $idActivity;
	private $seqNumber;
	private $idSourceAgent;
	private $idTargetAgent;
	private $name;
	private $positionX;
	private $positionY;
	
	
	public function getIdActivity(){
		return $this->idActivity;
	}
	
	public function getIdASM(){
		return $this->idASM;
	}
	
	public function getSeqNumber(){
		return $this->seqNumber;
	}
	
	public function getName(){
		return $this->name;
	}
	public function getIdSourceAgent(){
		return $this->idSourceAgent;
	}
	public function getIdTargetAgent(){
		return $this->idTargetAgent;
	}
	public function getPositionX(){
		return $this->positionX;
	}
	public function getPositionY(){
		return $this->positionY;
	}
	public function setIdActivity($param){
		$this->idActivity=$param;
	}
	public function setIdASM($param){
		$this->idASM=$param;
	}
	public function setSeqNumber($param){
		$this->seqNumber=$param;
	}
	public function setName($param){
		$this->name=$param;
	}
	public function setIdSourceAgent($param){
		$this->idSourceAgent=$param;
	}
	public function setIdTargetAgent($param){
		$this->idTargetAgent=$param;
	}
	public function setPositionX($param){
		$this->positionX=$param;
	}
	public function setPositionY($param){
		$this->positionY=$param;
	}
}
?>