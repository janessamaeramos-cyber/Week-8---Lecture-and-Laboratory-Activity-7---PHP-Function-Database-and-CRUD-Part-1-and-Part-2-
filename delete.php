<?php

require_once "db.php";
require_once "functions.php";

if (!isset($_GET["id"])) {
    die("Student ID is missing.");
}

$id = (int) $_GET["id"];

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
}

echo "Delete failed.";
?>