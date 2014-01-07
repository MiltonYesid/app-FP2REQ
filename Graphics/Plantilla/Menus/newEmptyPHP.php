<tr>
            <td class=nav1" >

                <ul class="nav1">

                    <td class="nav1">
                    <li><A HREF="../Projects/UIProject.php">Project</a>
                        <ul >
                            <li><A HREF="#" onClick =xajax_verProjecto('crear'.toString())>New</a></li>
                            <li><A HREF="##" onClick =xajax_verProjecto('verProjectos'.toString())>Select</a></li>
                        </ul>
                    </li>
            </td>

            <?php
            if ($_SESSION["permisosDeMenu"] != "NO") {
                ?>

                <td class="nav1">
            <li><A HREF="../ASM/UIASM.php">ASM</a>
                <ul>
                    <li><A HREF="../ASM/new.php">New</a></li>
                    <li><A HREF="../ASM/select.php">Select</a></li>
                </ul>
            </li>
            </td>
            <td class="nav1">
            <li><A HREF="../Taxonomies/UItaxonomies.php">Taxonomies</a>
                <ul >

                    <li><A HREF="#" onClick=xajax_verTaxonomia('crearT')>New</a></li>
                    <li><A HREF="###selec" onClick=xajax_verTaxonomia('selectT')>Select</a></li>
                </ul>
            </li>
            </td>
            <td class="nav1">
            <li><A HREF="../Questions/UIQuestion.php">Questions</a>
                <ul >
    <?php
    if ($idAnalyst == 4) {
        ?>
                        <li><A HREF="#" onclick = xajax_goQuestion()>Structure</a></li>
                        <?php
                    }
                    ?>
                    <li><A HREF="#" onclick = xajax_goInstatiate()>Instantiate</a></li>
                </ul>
            </li>
            </td>
            <td class="nav1">
            <li><A HREF="">Requeriments</a>
                <ul >
                </ul>
            </li>
            </td>
            </ul> </td>

    <?PHP
} else {
    ?>
            <td class="nav1">
            <li><A HREF="">ASM</a>
            </li>
            </td>
            <td class="nav1">
            <li><A HREF="../Taxonomies/UItaxonomies.php" onClick =xajax_verTaxonomias('crear'.toString())>Taxonomies</a>
            </li>
            </td>
            <td class="nav1">
            <li><A HREF="">Questions</a>
                <ul >
    <?php
    if ($idAnalyst == 4) {
        ?>
                        <li><A HREF="#" onclick = xajax_goQuestion()>Structure</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            </td>
            <td class="nav1">
            <li><A HREF="">Requeriments</a>
            </li>
            </td>
    <?php
}
?>


        </tr>
        
        
        
        CSS
                      
   ul,li,a{
      padding : 0px;
      margin : 0px;
   }
   #header1
   {
       margin: -20px 50px 0px 0px;
    float: right;
      width : 800px;
      font-family : "Tahoma", serif;
      font:110% Arial;
   }
   ul, ol, td
   {
      list-style : none;
   }
   .nav1
   {
       width: 400px;
   }
   .nav1 li a
   {
       background:#696969 ;
      color : #FFFFFF;
      text-decoration : none;
      padding : 10px 15px;
      display : block;
       width: 100px;
   }
   .nav1 li :hover
   {
        background:#fff ;
      color:#000;
   }
   
   
   .nav1 > li
   {
      float:center;
   }
   .nav1 li ul
   {
      display :none;
      position : absolute;
      min-width:100px;
      max-width:101px;
   }
   .nav1 li:hover > ul
   {
      display:block;
   }
   .nav1 li ul li
   {
      position:relative;
   }
   .nav1 li ul li ul
   {
      right :0px;
      top:0px;
      position:absolute;
      float:rigth;
   }
