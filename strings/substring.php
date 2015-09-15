#!/usr/bin/php
<?php
$s = "imthedude@example.com";
$p = strpos($s, '@');
if ($p !== false) {
	echo substr($s, $p + 1, strlen($s) - 1) . "\n";
} else {
	echo "Not a valid string.\n";
}
?>
