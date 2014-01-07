<?php
class ManagerMenu {
    function addItem($url,$action,$word)
    {
        $action = "xajax_".$action;
        $text = "<li><A HREF='$url' onClick ='$action'>$word</a></li>";
        echo $text;
    }
    function endMenu()
    {
        echo "</ul></li></td>";
    }
    function beginMenu($url,$word)
    {
        $text = "<td class=nav1><li><A HREF='$url'>Project</a><ul >";
        echo $text;
    }
}