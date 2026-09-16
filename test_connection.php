<?php //temporary file ko po 'to sir di ko na po dinelete para makita nyo rin po code hehe

require_once "db.php";
require_once "functions.php";

echo "Database connection successful.<br>";

$testValue = "  Test Student  ";

echo "Cleaned value: " . cleanInput($testValue);
?>