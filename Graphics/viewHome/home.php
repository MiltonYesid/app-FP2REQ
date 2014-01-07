<?php
session_start();
require ('../xajax/xajax.inc.php');
$xajax = new xajax;
include_once 'functionsPresentation.php';

        if($xajax != null)
        {
            include_once 'encabezado.php';
        }
//cambios a realizarccgggggggggggggggggccccccccccccccccccccccc

?>
<body class="homepage">
    <!-- Header Wrapper -->
    <div id="header-wrapper" class="wrapper">
        <div class="container">
            <div class="row">
                <div class="12u">

                    <!-- Header -->
                    <div id="header">

                        <!-- Logo -->
                        <div id="logo">
                            <h1><a href="#">FP2REQ</a></h1>
                            <span class="byline">From Processes to Requirements</span><br><br><br>
                            <div id ="nuevo">
                                <TABLE>
                                    <tr>
                                        <td>
                                            E-mail:    <input id="email" type="text" value="">
                                            Password:   <input id="password" type="password" value="">
                                            <a href="#ok" class="button button-style1" onClick="xajax_login(email.value,password.value)">login</a></li>
                                        </td>
                                    </tr>
                                </TABLE>
                            </div>
                            <div id="AnswerAnalyst"></div>
                        </div>
                        <!-- /Logo -->
                        <!-- Nav --><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <?php
                        include_once'barraMenu.php';
                        
                        ?>
                        <!-- Nav -->
                        <nav id="nav">

                        </nav>
                        <!-- /Nav -->

                    </div>
                    <!-- /Header -->

                </div>
            </div>
        </div>
        <!-- /Header Wrapper -->

        <!-- Intro Wrapper --><br><br><br><br><br><br><br><br><br>
        <div id="intro-wrapper" class="wrapper wrapper-style1">
            <div class="title">Introduction</div>
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Intro -->
                        <section id="intro">


                            <p class="style3">Requirements elicitation is a critical stage in software development. With the aim to support the Requirements Engineer (RE) in this difficult task; we have developed FP2Req (From Processes To Requirements). From process models, the proposal guides the RE in the formulation and response of critical questions to finally discover a set of pertinent requirements for the system to build.</p>
                            <!--
                            <p class="style3">Mauris tellus lacus, tincidunt eget mattis at, laoreet vel velit. 
                            Aliquam diam ante, aliquet sit amet vulputate lorem at placerat at nisl. 
                            Maecenas et gravida ligula sed lacus euismod tincidunt nullam eget justo orci.</p>
                            -->


                        </section>
                        <!-- /Intro -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /Intro Wrapper -->
        <?php
        include_once 'piePagina.php'
        ?>
    ?>