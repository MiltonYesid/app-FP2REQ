<?php
        $rutaController = "../Controllers/AnalystsController.php";
        $user           = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
        $idAnalyst      = $user->getIdAnalyst();
        $nombreCompleto = $user->getFirstName()." ".$user->getLastName();
?>
<div id="header2">
   <ul class="nav2">
         <li><a ><? echo $nombreCompleto; ?></a>
            <ul class ="nav2" >
               <li><a HREF="">Account Settings</a></li>
               <li><a HREF="#endsession" onClick =xajax_salir()>Log Out</a></li>
            </ul >
         </li>
         <?php
            $idProject = $_SESSION["permisosDeMenu"];
            $project = $controllerProject->getProject($idProject);
            if($project != null)
            {
             $nameProject = $project->getName();
             echo "<br><div id=>".$nameProject."</div>";
            }
         ?>
   </ul>
</div>

