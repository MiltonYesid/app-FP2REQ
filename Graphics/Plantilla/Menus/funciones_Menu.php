<?php
        //funcion del menuUsuario para salir de cuenta o seccion
        function salir()
        {
            global $answer;
            $_SESSION["pass"] = "NO";
            $answer->addRedirect("../viewHome/home.php");
            return $answer;
        }
        //funcion para el menu PROJECTS
        function verProjecto($variable)
        {
            global $answer;
            $_SESSION["ref"] = $variable;
            $answer->addRedirect("../Projects/UIProject.php");
            return $answer;
        }
        //funcion para el menu ASM
        function ASMnew($variable)
        {
            global $answer;
            $_SESSION["ref"] = $variable;
            $answer->addRedirect("../ASM/new.php");
            return $answer;
        }
          function verASMselect($variable)
        {
            global $answer;
            $_SESSION["ref"] = $variable;
            $answer->addRedirect("../ASM/select.php");
            return $answer;
        }
        //funcion para el menu TAXONOMIES
        function verTaxonomia($variable)
        {
            global $answer;
            $_SESSION["ref"] = $variable;
            $answer->addRedirect("../Taxonomies/UItaxonomies.php");
            return $answer;
        }
        function goQuestion()
        {
            global $answer;
            $answer->addRedirect("../Questions/UIquestionStructure.php");
            return $answer;
        }
         function goInstatiate()
        {
            global $answer;
            $answer->addRedirect("../Questions/UIinstantiateQuestions.php");
            return $answer;
        }
        
         $methods[] = "verProjecto";
         $methods[] = "salir";
         $methods[] = "verASM";
         $methods[] = "verTaxonomia";
         $methods[] = "goQuestion";
         $methods[] = "goInstatiate";
         