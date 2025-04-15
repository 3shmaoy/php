<?php

// change encoding
echo mb_convert_encoding('11：バックアップチェック', 'UTF-8', mb_list_encodings());
echo PHP_EOL;

// convert to half width kana
echo mb_convert_kana('11：バックアップチェック', 'rnak');
echo PHP_EOL;

// grep for multi-byte string
var_export(mb_ereg('【指導】', '【指導】バックアップチェック'));
echo PHP_EOL;

// explode
var_export(mb_split('：', '11：バックアップチェック'));
echo PHP_EOL;

?>
