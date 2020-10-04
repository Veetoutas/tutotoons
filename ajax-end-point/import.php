<?php

namespace Phppot;

use Phppot\Model\CSV;

require_once("../Model/CSV.php");

// Check if the file is not empty
if (!empty($_FILES["employee_file"]["name"])) {

    $connect = mysqli_connect("localhost", "root", "", "tuto_toons");
    $allowed_ext = array("csv");
    $array = explode(".", $_FILES["employee_file"]["name"]);
    $extension = end($array);

    // Check if the file is the CSV type
    if (in_array($extension, $allowed_ext)) {
        $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');

        // Get the first line of the CSV and skip it
        fgetcsv($file_data,  0, '|');

        // Insert CSV files rows into DB
        while($row = fgetcsv($file_data,  0, '|')) {

            // Check the number of columns
            $numcols = count($row);
            // Bail out of the loop if columns are incorrect
            if ($numcols !== 4 || $numcols == 0) {
                die('Incorrect number of columns in a CSV file');
            }

            $first = mysqli_real_escape_string($connect, $row[0]);
            $second = mysqli_real_escape_string($connect, $row[1]);
            $third = mysqli_real_escape_string($connect, $row[2]);
            $fourth = mysqli_real_escape_string($connect, $row[3]);
            $query = "INSERT INTO tuto_import_csv (first, second, third, fourth) VALUES ('$first', '$second', '$third', '$fourth')";
            mysqli_query($connect, $query);
        }

        // Get data from DB and show it in a table
        $csv = new CSV();
        $csvResult = $csv->getAll();
        ?>
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
            ?>
            </tbody>
        </table>
        <?php
    }

    else {
        die('The imported file is not the CSV type.');
    }
}
else {
    die('Failed to upload the file.');
}
