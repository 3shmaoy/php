<?php

echo "...\n";
mb_ereg('^(?<sMonth>\d+)\/(?<sDay>\d+)\D*', '1/30 以上', $aryMatches);
var_export($aryMatches);

?>