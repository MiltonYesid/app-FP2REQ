<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
            }


            p {
                margin-bottom: 0px;
                text-align: justify;
            }
            /*** Sticky Menu ***/
            #nav1 {
                background-color: #1C2022;
                height: auto;
                 position: fixed;
                top: 0;
                left: 0;
                width: 50%;
            }
            #nav1 ul {
                width: auto;
                margin: auto;
            }
            #nav1 ul li {
                line-height: 0px;
                display: inline-block;
                padding-right: 0px;
            }
            #nav1 ul li a {
                color: #fff;

            }
            #nav1 ul li a:hover {

            }


            #nav1
            {
                position: fixed;
                display: block;
                top: 0;
                left: 0;
                width: 100%;
                text-align: center;





            }

            #nav1 > ul > li > ul
            {
                display: none;
            }

            #nav1 > ul
            {
                display: inline-block;


                padding: 0 1.5em 0 1.5em;
            }

            #nav1 > ul > li
            {
                display: inline-block;
                text-align: center;
                padding: 0 1.5em 0 1.5em;
            }

            #nav1 > ul > li > a,
            #nav1 > ul > li > span
            {
                display: block;
                color: #eee;
                color: rgba(255,255,255,0.75);
                text-transform: uppercase;
                text-decoration: none;
                font-size: 0.5em;
                letter-spacing: 0.25em;
                height: 3em;
                line-height: 5em;
                -moz-transition: all .25s ease-in-out;
                -webkit-transition: all .25s ease-in-out;
                -o-transition: all .25s ease-in-out;
                -ms-transition: all .25s ease-in-out;
                transition: all .25s ease-in-out;
                outline: 0;
            }

            #nav1 > ul > li:hover > a,
            #nav1 > ul > li.active > a,
            #nav1 > ul > li.active > span
            {
                color: #fff;
            }



            ul,li,a{
                padding : 0px;
                margin : 0px;
            }
            #header1
            {
                margin: 0px 50px 0px 0px;
                float: right;
                width : 20px;
                font-family : "Tahoma", serif;
                font:110% Arial;
                top: 2.5em;
                position: fixed;
            }
            ul, ol, td
            {
                list-style : none;

            }
            .nav1
            {
                width: auto;
                box-shadow: inset 0px 0px 1px 1px rgba(255,255,255,0.25);
            }
            .nav1 li a
            {
                background:#384048;
                color : #FFFFFF;
                text-decoration : none;
                padding : 0px 0px;
                display : block;
                width: 100px;
                box-shadow: inset 0px 0px 1px 1px rgba(255,255,255,0.25);
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
                min-width:0px;
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
                position: fixed;
                float:rigth;
            }

            #container
            {
                position: fixed;
                 right :10000px;
                  color:#333;
            }
        </style>

        <title></title>

        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>


        <div class="container">





            <nav id="nav1">
                <ul>
                    <li ><span><a href="#project-name" onClick="xajax_lookProject()"><div id="menu"><? echo getProjectCurrent(); ?></div></a></span></li>
                </ul>
                
                <ul>
                    
                    <li class="current_page_item">
                        <span><a href ="#project-url" onClick="xajax_nextPage(1)"> Project</a></span>
                    </li >
                    
                    <?php
                    if(getProjectCurrent()!="NONE PROJECT")
                    {?>
                    <li class="current_page_item">
                        <span><a href ="#asm-url" onClick="xajax_nextPage(2)"> ASM</a></span>
                    </li>
                    <?}?>
                    
                        
                    <li class="current_page_item">
                        <span><a href ="#asm-url" onClick="xajax_nextPage(3)"> Taxonomy</a></span>
                    </li>
                        
                        <?php
                    if(getProjectCurrent()!="NONE PROJECT")
                    {?>
                    <li >
                        <span><a href ="#asm-url" onClick="xajax_nextPage(4)">Structure Q.</a></span>
                    </li>
                    <?}?>
                            <?php
                    if(getProjectCurrent()!="NONE PROJECT")
                    {?>
                    <li >
                        <span><a href ="#asm-url" onClick="xajax_nextPage(5)">Instantiate Q.</a></span>
                    </li>
                    <?}?>
                    <?php
                    if(getProjectCurrent()!="NONE PROJECT")
                    {?>
                            <li >
                        <span><a href ="#asm-url" onClick="xajax_nextPage(6)">Questions</a></span>
                    </li>
<?}?>
                    
                </ul>
            </nav>
        </div>





    </body>
</html>