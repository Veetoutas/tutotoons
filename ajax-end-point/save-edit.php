<?php
namespace Phppot;

use Phppot\Model\CSV;

$columnName = $_POST["column"];
$columnValue = $_POST["editval"];
$questionId = $_POST["id"];

require_once (__DIR__ . "./../Model/CSV.php");
$csv = new CSV();
$result = $csv->editRecord($columnName, $columnValue, $questionId);
