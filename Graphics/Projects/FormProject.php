<h2>New Project</h2>
<SPAN></span>
<form method="post" action="#">
                        <div class="row half">
                            <div class="6u">Project Name:<input type="text" id="nameProjecto" class="text" name="name" placeholder="Project name" /></div>
                            <br><div class="6u">Company Name:<input type="text" id="nameC" class="text" name="email" placeholder="Company name" /></div>
                        </div>
                        <div class="row half">
                            <div class="14u">
                                <textarea id=descripcion name="message" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <a href="#" class="button submit" onclick='xajax_crearProjecto(nameProjecto.value,descripcion.value,nameC.value)'>New Project</a>
                                <a href="#" class="button submit">Cancel</a>
                            </div>
                        </div>
                    </form>




<DIV id="contenido">

    <div id="projectCreate"> </div>

    <table>
        <!-- separeacion de la descripcion-->
        <TR>
            <td style="WIDTH: 228px; HEIGHT: 20px" >

                <b id='o1'><h3>General information</h3></b>

                <table>
                    <TR>
                        Note: the maximum size of each camp is 140 characters
                    </tr>
                    <TR>
                        <TD >PROJECT NAME:</TD>

                        <! separeacion-->

                        <TD id ="td"><INPUT id=nameProjecto  name='nombres'> </TD>
                        <TD ><A HREF=""></a></TD>
                        <TD></TD>
                    </TR>
                    <! separeacion-->
                    <TR>
                        <TD>PROBLEM DESCRIPTION:</TD>
                        <TD id ="td"><textarea id=descripcion size=32 name='nombres'></textarea>

                        </TD>
                    </TR>


                    <! separeacion de  la compañia-->

                    <TR>
                        <TD>COMPANY NAME</TD>

                        <! separeacion-->

                        <TD id ="td"><INPUT id=nameC size=32  name='NombreCompañia'> </TD>
                        <TD ><A HREF=""></a></TD>
                        <TD></TD>
                    </TR>
                    <! separeacion-->

                </table>
            </td>
        <tr><td>

        <center><A  HREF='#' onclick='xajax_crearProjecto(nameProjecto.value,descripcion.value,nameC.value)'><IMG  SRC='../Plantilla/images/ok.png' WIDTH=40 HEIGHT=40 ></A>
            <A  HREF='#' onclick="xajax_verProjecto('verProjectos')"><IMG  SRC='../Plantilla/images/delete.jpg' WIDTH=40 HEIGHT=40 ></A>       



        </center></td></tr>
    </TABLE>
</DIV>