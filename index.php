<?php

namespace Phppot;

use Phppot\Model\CSV;

require_once("Model/CSV.php");
$faq = new CSV();

?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP MySQL Inline Editing using jQuery Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link href="./assets/CSS/style.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/js/inlineEdit.js"></script>
    <script src="./assets/js/importCsv.js"></script>
    <script src="./assets/js/removeRow.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="div col-md-12">
            <h2 align="center">Import CSV File Data into MySQL Database using PHP & Ajax</h2>
            <h3 align="center">Employee Data</h3><br />

            <form id="upload_csv" method="post" enctype="multipart/form-data">
                <div class="col-md-3">
                    <br />
                    <label>Add More Data</label>
                </div>
                <div class="col-md-4">
                    <input type="file" name="employee_file" style="margin-top:15px;" />
                </div>
                <div class="col-md-5">
                    <input type="submit"  name="upload" id="upload" value="Upload" style="margin-top:10px;" class="float-right btn btn-info" />
                </div>
                <div style="clear:both"></div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="tbl-qa table-responsive"  id="employee_table">
                <thead>
                <tr>
                    <th class="table-header" width="10%">#</th>
                    <th class="table-header">Pirmas</th>
                    <th class="table-header">Antras</th>
                    <th class="table-header">Trečias</th>
                    <th class="table-header">Ketvirtas</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if ($faqResult = $faq->getAll()) {
                    foreach ($faqResult as $k => $v) {
                    ?>
                        <tr class="table-row">
                            <td><?php echo $k+1; ?></td>
                            <td contenteditable="true"
                                onBlur="saveToDatabase(this,'first','<?php echo $faqResult[$k]["id"]; ?>')"
                                onClick="showEdit(this);"><?php echo $faqResult[$k]["first"]; ?></td>
                            <td contenteditable="true"
                                onBlur="saveToDatabase(this,'second','<?php echo $faqResult[$k]["id"]; ?>')"
                                onClick="showEdit(this);"><?php echo $faqResult[$k]["second"]; ?></td>
                            <td contenteditable="true"
                                onBlur="saveToDatabase(this,'third','<?php echo $faqResult[$k]["id"]; ?>')"
                                onClick="showEdit(this);"><?php echo $faqResult[$k]["third"]; ?></td>
                            <td contenteditable="true"
                                onBlur="saveToDatabase(this,'fourth','<?php echo $faqResult[$k]["id"]; ?>')"
                                onClick="showEdit(this);"><?php echo $faqResult[$k]["fourth"]; ?></td>
                            <td align='center'>
                                <input id="<?php echo $faqResult[$k]["id"]; ?>" type="button" value="X" class="remove" name="remove">
<!--                                <span title="Delete" class='remove' id="--><?php //echo $faqResult[$k]["fourth"]; ?><!--">Delete</span>-->
                            </td>

                        </tr>
                    <?php
                    }
                }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
