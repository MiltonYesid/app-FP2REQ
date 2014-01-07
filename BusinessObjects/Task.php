<?php

/**
 * Description of Task
 *
 * @author AleJo Suárez
 */
class Task{
	private $idASM;
	private $idTask;
	private $idActivity;
	private $name;
	private $parameters;
	
	public function getIdASM(){
		return $this->idASM;
	}
	public function getIdTask(){
		return $this->idTask;
	}
	public function getIdActivity(){
		return $this->idActivity;
	}
	public function getName(){
		return $this->name;
	}
	public function getParameters(){
		return $this->parameters;
	}
	public function setIdASM($param){
		$this->idASM = $param;
	}
	public function setIdTask($param){
		$this->idTask = $param;
	}
	public function setIdActivity($param){
		$this->idActivity = $param;
	}
	public function setName($param){
		$this->name = $param;
	}
	public function setParameters($param){
		$this->parameters = $param;
	}
}
?>