<?php
class asmsController {
    private $ASMDAO;
    /*
     * 
     */
    function createASM($idASM,$name,$positionX,$positionY) {
    	include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
       
        $newASM = new ASM();
        $newASM->setName($name);
        $newASM->setIdASM($idASM);
        $ASMDAO = new ASMDAO();
        $ASMDAO->saveASM($newASM);
    }
    function newASM($name,$idProject)
    {
        include_once  '../../BusinessObjects/ASM.php';
        include_once  '../../DataAccess/ASMDAO.php';
        $ASMDAO= new ASMDAO;
        $idASM = $ASMDAO->newASM($name,$idProject);
        return $idASM;
    }
    /*
     * This function allows to check if a user can login.
     */
    function getASM($idASM) {
        include_once  '../../BusinessObjects/ASM.php';
        include_once  '../../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $foundASM = $ASMDAO->getASM($idASM);
        return $foundASM;
    }
    /*
     * This function allows to edit an existent Analyst.
     */
    function editASM( $idASM, $name) {
        include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $editedASM= new ASM();
        $editedASM->setIdASM($idASM);
        $editedASM->setIdASM($idASM);
        $editedASM->setName($name);
        $ASMDAO->updateASM($editedASM);
    }
    
     function editASMUI( $idASM, $name) {
        include_once  '../../BusinessObjects/ASM.php';
        include_once  '../../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $editedASM= new ASM();
        $editedASM->setIdASM($idASM);
        $editedASM->setName($name);
        $ASMDAO->updateASM($editedASM);
    }
    /*
     * This function allows to edit the position of an existent Analyst.
     */
    function editASMPosition( $idASM,$positionX,$positionY) {
        include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $editedASM= new ASM();
        $editedASM->setIdASM($idASM);
        $editedASM->setIdASM($idASM);
        $editedASM->setPositionX($positionX);
        $editedASM->setPositionY($positionY);
        $ASMDAO->updateASMPosition($editedASM);
        
    }
    function changeIDASM( $idASM,$NewIdASM) {
        include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $editedASM= new ASM();
        $editedASM->setIdASM($idASM);
        $editedASM->setIdASM($idASM);
        $ASMDAO->updateASMID($editedASM,$NewIdASM);
        
    }
    /*
     * This function allows to edit the position of an existent Analyst.
     */
    function blockedToggle( $idASM,$blocked) {
        include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $editedASM= new ASM();
        $editedASM->setIdASM($idASM);
        $editedASM->setIdASM($idASM);
        if($blocked=="true"){
        	$blocked = 0;
        }else{
        	$blocked = 1;
        }
        $editedASM->setBlocked($blocked);
        $ASMDAO->blockedToggle($editedASM);
    }
    /*
     * This function allows to list All existents Analysts.
     */
    function getASMs($idProject) {
        include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $asms = $ASMDAO->listASMs($idASM);
        $answer= "";
        echo "<asms>";
        for($i=0;$i<count($asms); $i++){
        	$asm= $asms[$i];
        	echo "<asm>";
			echo "<idASM>".$asm->getIdASM()."</idASM>";
        	echo "<idASM>".$asm->getIdASM()."</idASM>";
        	echo "<name>".$asm->getName()."</name>";
        	echo "<positionX>".$asm->getPositionX()."</positionX>";
        	echo "<positionY>".$asm->getPositionY()."</positionY>";
        	echo "<blocked>".$asm->getBlocked()."</blocked>";
			echo "</asm>";
        }
        echo "</asms>";
        return $answer;
    }
    //metodo adicionado
    //el anterior envia un xml
    function getASMstexto($idProject)
    {
        include_once  '../../BusinessObjects/ASM.php';
        include_once  '../../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $asms = $ASMDAO->listASMs($idProject);
        return $asms;
    }
    function deleteASM( $idASM){
    	include_once  '../BusinessObjects/ASM.php';
        include_once  '../DataAccess/ASMDAO.php';
        $ASM= new ASM();
        $ASM->setIdASM($idASM);
        $ASM->setIdASM($idASM);
        $ASMDAO = new ASMDAO();
        $ASMDAO->deleteASM($ASM);
    }
     function deleteASMUI( $idASM){
    	include_once  '../../BusinessObjects/ASM.php';
        include_once  '../../DataAccess/ASMDAO.php';
        $ASMDAO = new ASMDAO();
        $ASMDAO->deleteASM($idASM);
    }
}


