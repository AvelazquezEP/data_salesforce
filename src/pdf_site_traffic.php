<?php
ob_start();
session_start();

/* #region Week */

$total = 0;
$total_last_week = 0;

/* #endregion */

/* #region data list (weekly) */
$total_daily = [350, 450, 1];
$paid_search = [159, 217, 1];
$direct = [99, 146, 1];
$organic_search = [49, 74, 1];
$organic_social = [8, 14, 1];
$referral = [2, 2, 1];
/* #endregion */

/* #region Total users daily */

$total_prom = array();
for ($i = 0; $i < count($total_daily); $i++) {
    $i_plus = $i + 1;
    if ($i_plus < count($total_daily)) {
        $day = $total_daily[$i + 1] - $total_daily[$i];
        array_push($total_prom, $day);
    }
}

echo "Total Users: <br />";
var_dump($total_prom);

/* #endregion */

/* #region Paid Search daily */

$paid_prom = array();
for ($i = 0; $i < count($paid_search); $i++) {
    $i_plus = $i + 1;
    if ($i_plus < count($paid_search)) {
        $day = $paid_search[$i + 1] - $paid_search[$i];
        array_push($paid_prom, $day);
    }
}
echo "<br />";
echo "<br /> Paid search:<br />";
var_dump($paid_prom);

/* #endregion */

/* #region Direct Search daily */

$direct_prom = array();
for ($i = 0; $i < count($direct); $i++) {
    $i_plus = $i + 1;
    if ($i_plus < count($direct)) {
        $day = $direct[$i + 1] - $direct[$i];
        array_push($direct_prom, $day);
    }
}
echo "<br />";
echo "<br /> Direct prom:<br />";
var_dump($direct_prom);

/* #endregion */

/* #region Organic Search daily */

$organic_search_prom = array();
for ($i = 0; $i < count($organic_search); $i++) {
    $i_plus = $i + 1;
    if ($i_plus < count($organic_search)) {
        $day = $organic_search[$i + 1] - $organic_search[$i];
        array_push($organic_search_prom, $day);
    }
}
echo "<br />";
echo "<br /> Organic Search:<br />";
var_dump($organic_search_prom);

/* #endregion */

/* #region Organic Social daily */

$organic_social_prom = array();
for ($i = 0; $i < count($organic_social); $i++) {
    $i_plus = $i + 1;
    if ($i_plus < count($organic_social)) {
        $day = $organic_social[$i + 1] - $organic_social[$i];
        array_push($organic_social_prom, $day);
    }
}
echo "<br />";
echo "<br /> Organic Social:<br />";
var_dump($organic_social_prom);

/* #endregion */

/* #region Referral daily */