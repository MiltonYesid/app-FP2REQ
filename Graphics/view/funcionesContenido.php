<?php

/* funciones para acceso a informacion de los usuarios */

function getUserName() {
    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    $nombreCompleto = $user->getFirstName() . " " . $user->getLastName();
    return $nombreCompleto;
}

function getIdAnalyst() {
    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    return $idAnalyst;
}

function getProjectCurrent() {
    global $controllerProject;
    $idProject = $_SESSION["permisosDeMenu"];
    $project = $controllerProject->getProject($idProject);
    if ($project != null) {
        $nameProject = $project->getName();
        return $nameProject;
    }
    return "NONE PROJECT";
}

function getTypeCount() {
    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $idAnalyst = $user->getIdAnalyst();
    if ($idAnalyst == 4) {
        return "Manager";
    }
    return "Analyst";
}

