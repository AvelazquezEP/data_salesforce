<?php


$item1 = '2';
$item2 = '1';
$item3 = '2';
$item4 = '2';

$total = $item1 + $item2 + $item3 + $item4;

$p_i1 = ($item1 * 100) / $total;
$p_i2 = ($item2 * 100) / $total;
$p_i3 = ($item3 * 100) / $total;
$p_i4 = ($item4 * 100) / $total;
$p_total = $p_i1 + $p_i2 + $p_i3 + $p_i4;

echo number_format($p_i1, 2);
echo '</br>';
echo number_format($p_i2, 2);
echo '</br>';
echo number_format($p_i3, 2);
echo '</br>';
echo number_format($p_i4, 2);
echo '</br>';
echo number_format($p_total, 2);
