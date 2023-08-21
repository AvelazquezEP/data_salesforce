<?php
ob_start();
session_start();

$total = 0;
$total_last_week = 0;

/* #region Function to get the data conversion of the days */

// function to daily record
function records_daily($main_array)
{
    $data_array = array();
    for ($i = 0; $i < count($main_array); $i++) {
        $i_plus = $i + 1;
        if ($i_plus < count($main_array)) {
            $day = $main_array[$i + 1] - $main_array[$i];
            array_push($data_array, $day);
        }
    }

    return $data_array;
}

// function to weekly record
function record_weekly($array_week, $array_lweek)
{
    $data_prom = array();
    for ($i=0; $i < count($array_week); $i++) { 
        for ($j=0; $j < count($array_lweek); $j++) { 
            if($i == $j) {
                $prom = $array_week[$i] - $array_lweek[$j];
                array_push($data_prom, $prom);
            }
        }
    }

    return $data_prom;
}

/* #endregion */

/* #region data list (weekly) */

$total_daily = [136, 160, 1];
$paid_search = [58, 68, 1];
$direct = [99, 146, 1];
$organic_search = [49, 74, 1];
$organic_social = [8, 14, 1];
$referral = [2, 2, 1];

/* #endregion */

/* #region data list (last week) */
$l_total_daily = [150, 180, 1];
$l_paid_search = [215, 630, 1];
$l_direct = [318, 488, 1];
$l_organic_search = [489, 560, 1];
$l_organic_social = [591, 684, 1];
$l_referral = [688, 733, 1];

/* #endregion */

/* #region invoke function to each User acquisition (weekly) */
echo " WEEKLY:<br />";
echo "Total daily:<br />";
var_dump(records_daily($total_daily));

echo "<br /><br /> Paid Search:<br />";
var_dump(records_daily($paid_search));

echo "<br /><br />Direct:<br />";
var_dump(records_daily($direct));

echo "<br /><br />Organic Search:<br />";
var_dump(records_daily($organic_search));

echo "<br /><br />Organic Social:<br />";
var_dump(records_daily($organic_social));

echo "<br /><br />Referral:<br />";
var_dump(records_daily($referral));

/* #endregion */

/* #region invoke function to each User acquisition (last week) */
echo "<br />";
echo "<br />";
echo "<br /><br /> LAST WEEK:<br />";

echo "Total daily:<br />";
var_dump(records_daily($l_total_daily));

echo "<br /><br /> Paid Search:<br />";
var_dump(records_daily($l_paid_search));

echo "<br /><br />Direct:<br />";
var_dump(records_daily($l_direct));

echo "<br /><br />Organic Search:<br />";
var_dump(records_daily($l_organic_search));

echo "<br /><br />Organic Social:<br />";
var_dump(records_daily($l_organic_social));

echo "<br /><br />Referral:<br />";
var_dump(records_daily($l_referral));

echo "<br /><br />two list:<br />";
var_dump(record_weekly($total_daily, $l_total_daily));
/* #endregion */