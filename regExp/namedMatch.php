<?php

var_export(mb_ereg('【指導】', '【指導】バックアップチェック'));
echo PHP_EOL;

var_export(mb_ereg('^(?<sMonth>\d+)\/(?<sDay>\d+)\D*', '1/30 以上', $aryMatches));
echo PHP_EOL;

var_export($aryMatches);
echo PHP_EOL;

?>