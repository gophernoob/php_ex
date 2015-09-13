#!/usr/bin/php

<?php
$f = fopen("./testfile.txt", "r");
$c = fread($f, filesize("./testfile.txt"));
fclose($f);
echo $c;
?>
