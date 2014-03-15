<?php
$typeMenu = $_SESSION["typeMenu"];
switch ($typeMenu) {

    case 0:
        ?>
        <!-- Main -->
        <div id="main">
            <!-- Intro -->
            <section id="top" class="one">
                <div class="container">
                    <br>
                    <header>
                        <?php
                        include_once 'Count/count.php';
                        ?>
                    </header>
                </div>
            </section>
            <!-- Portfolio -->
            <section id="portfolio" class="two">
                <div class="container">

                    <header>

                    </header>
            </section>
            <?php
            break;

        case 1:
            ?>
            <!-- Main -->
            <div id="main">
                <!-- Intro -->
                <section id="top" class="one">
                    <div class="container">
                        <br>
                        <header>
                            <?php
                            echo getTextListProjects()
                            ?>
                        </header>
                    </div>
                </section>
                <!-- Portfolio -->
                <section id="portfolio" class="two">
                    <div class="container">

                        <header>
                            <?php
                            echo getFormNewProjects(false);
                            ?>
                        </header>
                </section>
                <?php
                break;
            case 2:
                ?>
                <!-- Main -->
                <div id="main">
                    <!-- Intro -->
                    <section id="top" class="one">
                        <div class="container" id="list">
                            <br>
                            <header>
                                <?php
                                echo getFormSelectASM();
                                ?>
                            </header>
                        </div>
                    </section>
                    <!-- Portfolio -->
                    <section id="portfolio" class="two">
                        <div class="container" id="">

                            <header>
                                <?php
                                echo getFormNewASM();
                                ?>

                            </header>
                    </section>
                    <?php
                    break;
                case 3:
                    ?>
                    <!-- Main -->
                    <div id="main">
                        <!-- Intro -->
                        <section id="top" class="one">
                            <div class="container" id="list">
                                <br>
                                <header>
                                    <?php
                                    echo getSelectTaxonomy();
                                    ?>
                                </header>
                            </div>
                        </section>
                        <!-- Portfolio -->
                        <section id="portfolio" class="two">
                            <div class="container" id="">

                                <header>
                                    <?php
                                    include_once '../Taxonomies/FormCTaxonomia.html';
                                    ?>

                                </header>
                        </section>
                        <?
                        break;
                    case 4:
                        ?>
                        <!-- Main -->
                        <div id="main">
                            <!-- Intro -->
                            <section id="top" class="one">
                                <div class="container" id="list">
                                    <br>
                                    <header>
                                        <?php
                                        echo getFormUIquestionStructure();
                                        ?>
                                    </header>
                                </div>
                            </section>
                            <!-- Portfolio -->

                            <?php
                            break;
                        case 5:
                            ?>
                            <!-- Main -->
                            <div id="main">
                                <!-- Intro -->
                                <section id="top" class="one">
                                    <div class="container" id="list">
                                        <br>
                                        <header>
                                            <?php
                                            echo getFormInstantiateQuestions();
                                            ?>
                                        </header>
                                    </div>
                                </section>
                                <section id="portfolio" class="two">
                                    <div class="container" id="">

                                        <header>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div id=Structure> </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div id="SetOfQuestion" ></div>
                                                <center><div id="SetOfQuestion2" ></div> </center>
                                                </td>
                                                </tr>
                                            </table> 


                                        </header>
                                </section>

                                <!-- Portfolio -->

                                <?php
                                break;
                            case 6:
                                ?>
                                <!-- Main -->
                                <div id="main">
                                    <!-- Intro -->
                                    <section id="top" class="one">
                                        <div class="container" id="list">
                                            <br>
                                            <header>
                                                <?php
                                                getFormSETQuestions();
                                                ?>
                                            </header>
                                        </div>
                                    </section>
                                    <!-- Portfolio -->
                                    <section id="portfolio" class="two">
                                        <div class="container" id="">

                                            <header>
                                                <?php
                                                ?>

                                            </header>
                                    </section>
        <?php
        break;
}
?>
                        </div>

