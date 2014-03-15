<?php
$typeMenu = $_SESSION["typeMenu"];
switch ($typeMenu) {
    case 0:
        ?>
        <ul>
            <li><a href="#top" onClick="" ><h2>Account Settings</h2></a></li>
            <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="">profile</span></a></li>

        </ul>
        <?php
        break;
    
    
    
    case 1:
        ?>
        <ul>
            <li><a href="#top"  ><h2>Project</h2></a></li>
            <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="">Select</span></a></li>
            <li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="">New</span></a></li>
            <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="">Group Projects</span></a></li>
            <li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="">Eliminated</span></a></li>
        </ul>
        <?php
        break;
    case 2:
        ?>
        <ul>
            <li><a href="#top"  ><h2>ASM</h2></a></li>
            <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="">Select</span></a></li>
            <li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="">New</span></a></li>
            <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="">Eliminated</span></a></li>
        </ul>
        <?php
        break;
    case 3:
        ?>
        <ul>
            <li><a href="#top"  ><h2>Taxonomy</h2></a></li>
            <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="">Select</span></a></li>
            <li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="">New</span></a></li>
            <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="">Eliminated</span></a></li>
        </ul>
        <?
        break;
    case 4:
        ?>
        <ul>
            <li><a href="#top"  ><h3>Structure Questions</h3></a></li>
            <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="">Manager</span></a></li>
            <li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="">Prototype </span></a></li>
            <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="">Eliminated</span></a></li>
        </ul>
        <?php
        break;
     case 5:
        ?>
        <ul>
            <li><a href="#top"  ><h3>Instantiate Questions</h3></a></li>
            <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="">Select</span></a></li>
            <li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="">New</span></a></li>
            <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="">Eliminated</span></a></li>
        </ul>
        <?php
        break;
}


