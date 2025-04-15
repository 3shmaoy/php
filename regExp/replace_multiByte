<?php

// full width digits will match
echo (mb_ereg_replace('\D', '', '2024/11/22 15:55:12  １２'));
echo PHP_EOL;

// only half width digits will match
echo (mb_ereg_replace('[^0-9]', '', '2024/11/22 15:55:12 １２'));
echo PHP_EOL;

?>
