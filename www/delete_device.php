<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: index.php");
    exit();
}

require 'database.php';

$sql = "DELETE FROM devices WHERE device_id = $id";

mysqli_query($conn, $sql);

header("Location: index.php");