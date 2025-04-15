<?php

//if ($bMatch) $output_array[0] = mb_convert_encoding($output_array[2], 'UTF-8', mb_list_encodings());

echo mb_convert_kana('11：バックアップチェック', 'rnak') . "\n" ;
$ary = mb_split('：', '11：バックアップチェック');
var_export($ary);

?>