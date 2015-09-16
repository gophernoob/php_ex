#!/usr/bin/php
<?php
$a = 5;

echo $a . "\n";

function foo(&$param) {
	$param++;
}

foo($a);

echo $a . "\n";

foo($a);

echo $a . "\n";
?>
