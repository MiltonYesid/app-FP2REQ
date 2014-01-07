<?php
//elements html
    function elementOK($id,$url,$action)    {    
        $action = "xajax_".$action;
        $text   = "<A id='$id' HREF='$url' onclick='$action'><IMG  SRC='../Plantilla/images/ok.png' WIDTH=40 HEIGHT=40 ></A>";
        return  $text;
    }
    function elementUpdate($id,$url,$action){
        $action = "xajax_".$action;
        $text   = "<A id='$id' HREF='$url' onClick ='$action'><IMG SRC='../Plantilla/images/update.jpg' WIDTH=40 HEIGHT=40 ></a>";
        return  $text;
    }
    function elementDelete($id,$url,$action){
         $action = "xajax_".$action;
         $text   = "<A id='$id' HREF='$url' onClick = '$action'><IMG SRC='../Plantilla/images/delete.jpg' WIDTH=40 HEIGHT=40 ></a>"; 
         return  $text;  
    }
    function elementImage($url,$width,$height)
    {
        $text = "<img src=$url width=$width height=$height />";
        return $text;
    }
    function elementPlus($id,$url,$action)  {
        $action = "xajax_".$action;
        $text   = "<A id='$id' HREF='$url' onClick = '$action'><IMG SRC='../Plantilla/images/add.png' WIDTH=40 HEIGHT=40 ></a>"; 
        return  $text;
    }
     function elementLupa($id,$url,$action)  {
        $action = "xajax_".$action;
        $text   = "<A id='$id' HREF='$url' onClick = '$action'><IMG SRC='../Plantilla/images/lupa.jpg' WIDTH=40 HEIGHT=40 ></a>"; 
        return  $text;
    }
    function elementText($id,$value,$action)
    {
        $action = "xajax_".$action;
       $text   = "<INPUT id=$id   value = '$value' onMouseOut= $action>";
       
       return  $text;
    }
    function elementText2($id,$value,$action,$workSpace)
    {
        $action = "xajax_".$action;
       $text   = "<INPUT id=$id  class=text value = '$value'  placeholder = '$workSpace' onMouseOut= $action>";
       
       return  $text;
    }
    function select($id,$array,$action,$ini)     {
        $action = "xajax_".$action;
        $text = '<select style="width:20em; border-radius: 0.35em;
    box-shadow: inset 0px 0px 1px 1px rgba(255,255,255,0.25);" onChange="'.$action.'" >';
        if($id!=null)
        {
            if($array!=null)
            {
            $text.= '<option value="'.$ini.'">'.$ini.'</option>';
                    for($i = 0 ; $i < count($array); $i++)
                    {
                       $text.= '<option value="'.$id[$i].'">'.$array[$i].'</option>';
                    }
            $text.= '</select>';
            }
        }
        return $text;
    }
 
        
      
    function elementButton($id,$url,$action,$word)
    {
        $action = "xajax_".$action;
            $text = " <input type='submit' id='$id'  value='$word'  style='WIDTH: 80px; HEIGHT: 30px' onClick=$action >";
        return $text;
    }
    //StructureQuestion
    function printElementASM()              {
        $text =  "<IMG SRC='../Plantilla/images/StructureQuestions/ASMElement.jpg' WIDTH=80 HEIGHT=80 >";
        return $text;
    }
    function printElementTaxonomy()         {
        $text = "<IMG SRC='../Plantilla/images/StructureQuestions/TaxonomyElement.jpg' WIDTH=80 HEIGHT=80 >";
        return $text;
    }
    function printElementText()             {
        $text = "<IMG SRC='../Plantilla/images/StructureQuestions/textElement.jpg' WIDTH=80 HEIGHT=80 >";
        return $text;
    }
    //security in session variables
    function verify()                       {
        $answer = new xajaxResponse();
        if (isset($_SESSION['pass']))
        {
            if(($_SESSION["pass"]!="NO"))
            {
                
            }else
            {
                $answer->addRedirect("../viewHome/home.php");
            }
        }else
        {
            $answer->addRedirect("../viewHome/home.php");
        }
        return $answer;
    }
    function okSeccion($methods)            {
        $answer = new xajaxResponse();
         if (isset($_SESSION['pass']))
        {
            if(($_SESSION["pass"]!="NO"))
            {
                global $xajax;
                global $uiAdminPlantilla;
                global $controllerTaxonomies;
                global $controllerProject;
                global $controllerAnalyst;
                include_once '../endFile.php';
            }else
            {
                $answer->addRedirect("../viewHome/home.php");
            }
        }else
        {
            $answer->addRedirect("../viewHome/home.php");
        }
        return $answer;
    }