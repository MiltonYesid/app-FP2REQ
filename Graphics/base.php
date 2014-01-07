<?php
        session_start();
        include_once '../Plantilla/UIAdminPlantilla.php';
        include_once '../../Controllers/AnalystsController.php';
        include_once '../../Controllers/ProjectsController.php';
        include_once '../../Controllers/TaxonomiesController.php';
        include_once '../../Controllers/StructuresController.php';
        include_once '../../Controllers/ASMController.php';
        include_once '../../Controllers/QuestionsController.php';
        include_once '../../Controllers/ASMControllerPlus.php';
        //controladores
        $controllerAnalyst      = new AnalystsController();
        $controllerProject      = new ProjectsController();
        $controllerTaxonomies   = new TaxonomiesController();
        $structursController    = new StructuresController();
        $diagramerASMController = new asmsController();
        $controllerQuestions    = new QuestionsController();
        $ASMControllerPlus      = new ASMControllerPlus();
        //manejador de plantilla
        $uiAdminPlantilla       = new UIAdminPlantilla();
        //elemento xajax 
        $xajax                  = $uiAdminPlantilla->xajax;
        //elemento respuesta de xajax
        $answer                 = new xajaxResponse();
        //matriz de almancenamiento de funciones registradas
        $methods                = array ();
        //funciones para el menu
        include_once("../Plantilla/Menus/funciones_Menu.php");
        //manejador del menu
        $managerMenu            = new ManagerMenu();
        //ingresamos una funcion
        $methods[]              = "verify";
        //elementos adicionales para manejo HTML,etc
        include_once            'extra.php';
        include_once            '../Projects/CtlrProject.php';
        include_once            'page/project.php';
        