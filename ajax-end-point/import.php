<?php

namespace Phppot;

use Phppot\Model\CSV;

require_once("../Model/CSV.php");


if (!empty($_FILES["employee_file"]["name"]))
{
    $connect = mysqli_connect("localhost", "root", "", "tuto_toons");
    $output = '';
    $allowed_ext = array("csv");
    $array = explode(".", $_FILES["employee_file"]["name"]);
    $extension = end($array);

    if (in_array($extension, $allowed_ext))
    {
    $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');

    while($row = fgetcsv($file_data,  0, '|'))
    {
        // count($line) is the number of columns
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

    $faq = new CSV();
    $faqResult = $faq->getAll();
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
                <td align='left' id="delete-button">
                    <input id="<?php echo $faqResult[$k]["id"]; ?>" type="button" value="Delete" class="remove" name="remove">
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
<?php
    }

    else
    {
        die('The imported file is not the CSV type.');
    }
}
else
{
    die('Failed to upload the file.');
}
