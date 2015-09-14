#!/usr/bin/php
<?php
function longestCommonSubsequence($s1, $s2) {
	$s1_l = strlen($s1);
	$s2_l = strlen($s2);
	$ret = '';

	if ($s1_l === 0 || $s2_l === 0) {
		return $ret;
	}

	$lcs = array();

	// Initialize and assume there are no similarities.
	$lcs = array_fill(0, $s1_l, array_fill(0, $s2_l, 0));

	$largest = 0;

	for ($i = 0; $i < $s1_l; $i++) {
		for ($j = 0; $j < $s2_l; $j++) {
			// Check every combination of characters.
			if ($s1[$i] === $s2[$j]) {
				if ($i === 0 || $j === 0) {
					// First character so only 1 character long.
					$lcs[$i][$j] = 1;
				} else {
					// One character longer than string from previous character.
					$lcs[$i][$j] = $lcs[$i - 1][$j - 1] + 1;
				}

				if ($lcs[$i][$j] > $largest) {
					// Remember as the largest.
					$largest = $lcs[$i][$j];
					// Wipe previous results.
					$ret = '';
					// Then fall through to remember this new value.
				}

				if ($lcs[$i][$j] === $largest) {
					// Remember the largest string(s)
					$ret = substr($s1, $i - $largest + 1, $largest);
				}
			}
			// Else $lcs is 0.
		}
	}
	// Return the list of matches.
	return $ret;
}

echo "Longest common subsequence (LCS)\n";
echo "LCS of the strings \"string\" and \"astringinsideastring\": " . longestCommonSubsequence("string", "astringinsideastring") . "\n";
echo "LCS of the strings \"Inside this hidden something is.\" and \"something\": " . longestCommonSubsequence("Inside this hidden something is.", "something") . "\n";
?>
