<?php
$managerMenu = new ManagerMenu();
?>
<div id="header1">
    <table><tr>
            <td><IMG SRC="../Plantilla/images/logo2.JPG" WIDTH="200" HEIGHT="70" alt="">
            </td> 
        </tr>
        <tr class="navp">
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
      </table></div>
</div> <!-- end of header -->
<!-- end of middle -->
</div> <!-- end of top --><br> </div> <!-- end of top wrapper -->






