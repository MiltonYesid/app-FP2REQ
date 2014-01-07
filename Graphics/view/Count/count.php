<?php

function getcaja($id, $value) {
    $text = "<div class=6u><input type=text  id=$id   name=$id value=$value /></div>";
    return $text;
}

function getInfoUser() {
    /* @var $controllerAnalyst AnalystsController */
    global $controllerAnalyst;
    $user = $controllerAnalyst->getAnalyst($_SESSION["email"], $_SESSION["pass"]);
    $e = $user->getEmail();
    $fn = $user->getFirstName();
    $ln = $user->getLastName();
    $pos = $user->getPosition();
    $pass = $user->getPassword();
    $org = $user->getOrganization();
    $var = "6u";
 $text = ' <div align="center">
                        <tr>
                        <tr><div id=answer></div></tr>
                        <td>
                       First Name         
                        <center><input type="text" id="first_name"   value="'.$fn.'"/> </td><td><div id="okName"></div>
                        </tr>
                        <tr>
                            Last Name   : 
                            <center><input type="text" id="last_name" value="'.$ln.'" /><div id="okLastName"></div>
                        </tr>
                        <tr>
                            Organization   : 
                           <center> <input type=text id="organization" value="'.$pos.'"  /><div id="okOrg"></div>
                        </tr>
                        <tr>
                            Position   : 
                           <center> <input type=text id="position"  value="'.$org.'" /><div id="okPos"></div>
                        </tr>
                        <tr>
                            E-mail    :    
                                <center><input type=text  id="mail"  value="'.$e.'"/><div id="okEmail"></div>
                        </tr>
                        <div id="okSignup"></div>
                        <a href="#register"  onClick="xajax_updateCount(first_name.value,last_name.value,organization.value,position.value,mail.value)" class="button button-style1">Update</a>
                    </div>';
    return $text;
}

echo "<div class='button submit'><h2>Account setting<hr></h2><br>";
echo getInfoUser() . "</div>";

//<br><center>
  //  <a href="#countUpdate" class="button submit" onClick="xajax_updateCount(fn.value,ln.value,pos.value,org.value,email.value)">Update</a>
    //<a href="#countUpdate" class="button submit" onClick="">Cancel</a>