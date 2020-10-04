<?php

use Phppot\DataSource;

require_once("../lib/DataSource.php");
$db = new DataSource();

$id = $_POST['id'];

$query = "DELETE FROM tuto_import_csv WHERE id =".$id;
$db->execute($query);
