<?php
namespace Phppot;

use Phppot\Model\CSV;

$columnName = $_POST["column"];
$columnValue = $_POST["editval"];
$questionId = $_POST["id"];

require_once (__DIR__ . "./../Model/CSV.php");
$faq = new CSV();
$result = $faq->editRecord($columnName, $columnValue, $questionId);
?>