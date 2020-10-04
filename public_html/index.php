<?php

namespace Phppot;

use Phppot\Model\CSV;

require_once("Model/CSV.php");
$csv = new CSV();

?>

<html>
    <head>
        <!-- META -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><!-- Force IE to use the latest rendering engine -->
        <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Optimize mobile viewport -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- Title -->
        <title>tutoToons Task</title>

        <!-- Animation -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.jsdelivr.net/animatecss/2.1.0/animate.min.css">

        <!--  Styles  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link href="assets/CSS/style.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">

        <!--  Scripts  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="assets/js/inlineEdit.js"></script>
        <script src="assets/js/importCsv.js"></script>
        <script src="assets/js/removeRow.js"></script>
    </head>

    <body id="demo-one">
        <div class="container">
            <div id="header" class="row text-center">
            <?php
                include './assets/effects/logo.php';
            ?>
            </div>
            <div id="main" class="row">
                <div id="sidebar" class="col-sm-10">
                    <nav id="sidebar-nav">
                        <ul>
                            <li><a id="side-home" class="animated bounceInLeft" href="#">Hello there! I don't know how to use a mouse so could You upload that CSV file for me please?<br> Big thanks!</a>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-2">
                    <img class="img-responsive animated bounceInUp" id="img-responsive" src="images/tuto_owl.png">
                </div>
                <?php
                    include './assets/effects/leaf_html.php';
                ?>
            </div>
            <div class="row">
                <div class="div col-md-12" id="import-button-column">
                    <div class="row">
                        <div class="container">
                            <form id="upload_csv" method="post" enctype="multipart/form-data">
                                <div class="col-md-12" id="form-column">
                                    <input id="file-upload" type="file" name="employee_file"/>
                                    <input type="submit"  name="upload" id="upload" value="Import" class="btn btn-info" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <!-- TABLE START -->
                        <table id="csv_table" class="table tbl-qa table-responsive">
                            <thead>
                                <th>#</th>
                                <th>Pirmas</th>
                                <th>Antras</th>
                                <th>Trečias</th>
                                <th>Ketvirtas</th>
                                <th>Veiksmas</th>
                            </thead>
                            <tbody>
                            <?php
                                 // START foreach
                                if ($csvResult = $csv->getAll()) {
                                    foreach ($csvResult as $k => $v) {
                                ?>
                                    <tr class="table-row">
                                        <td><?php echo $k+1; ?></td>
                                        <td contenteditable="true"
                                            onBlur="saveToDatabase(this,'first','<?php echo $csvResult[$k]["id"]; ?>')"
                                            onClick="showEdit(this);"><?php echo $csvResult[$k]["first"]; ?></td>
                                        <td contenteditable="true"
                                            onBlur="saveToDatabase(this,'second','<?php echo $csvResult[$k]["id"]; ?>')"
                                            onClick="showEdit(this);"><?php echo $csvResult[$k]["second"]; ?></td>
                                        <td contenteditable="true"
                                            onBlur="saveToDatabase(this,'third','<?php echo $csvResult[$k]["id"]; ?>')"
                                            onClick="showEdit(this);"><?php echo $csvResult[$k]["third"]; ?></td>
                                        <td contenteditable="true"
                                            onBlur="saveToDatabase(this,'fourth','<?php echo $csvResult[$k]["id"]; ?>')"
                                            onClick="showEdit(this);"><?php echo $csvResult[$k]["fourth"]; ?></td>
                                        <td align='left' id="delete-button">
                                            <input id="<?php echo $csvResult[$k]["id"]; ?>" type="button" value="Delete" class="remove" name="remove">
                                        </td>
                                    </tr>
                                <?php
                                    // END foreach
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- TABLE END -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
