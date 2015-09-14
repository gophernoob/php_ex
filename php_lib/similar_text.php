#!/usr/bin/php
<?php

class StringSimilarity {
	public static function check($s1, $s2) {
		similar_text($s1, $s2, $p);
		echo "Similarity of " . $s1 . " and " . $s2 . " is " . $p . "%\n";
	}
}

$s1 = "Hello, World!";
$s2 = "Hello, world!";
$s3 = "hello, World!";
$s4 = "hello, world!";
$s5 = "hello world";
$s6 = "Do'h!";

StringSimilarity::check($s1, $s2);
StringSimilarity::check($s1, $s3);
StringSimilarity::check($s1, $s4);
StringSimilarity::check($s1, $s5);
StringSimilarity::check($s1, $s6);
?>
