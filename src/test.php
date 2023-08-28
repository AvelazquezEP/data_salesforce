<?php

function get_min($data_array)
{
    $min_array = array();
    for ($i = 0; $i < count($data_array); $i++) {
        if ($data_array[$i] < 0) {
            array_push($min_array, $data_array[$i]);
        }
    }

    return $min_array;
}

function get_max_min($acquisition_data_array)
{
    $new_data_array = array();
    for ($i = 0; $i < count($acquisition_data_array); $i++) {
        if ($acquisition_data_array[$i] < 0) {
            array_push($new_data_array, $acquisition_data_array[$i]);
        } elseif ($acquisition_data_array[$i] > 50) {
            array_push($new_data_array, $acquisition_data_array[$i]);
        }
    }

    return $new_data_array;
}



function get_total_acquisition_min()
{
}

/* #region Percent of each user acquisition per day */
$p_total_daily = [-0.73, 58.42, 15.66, -7.06, -15.63, 60.13, -18.44];
$p_paid_search = [0, 47.83, 12.77, -23.08, 50, -1.1, -43.24];
$p_direct = [-2.08, 46.43, 66.67, 15, -62.5, 43.9, -65.15];
$p_organic_search = [-3.85, 48, -29.41, 20, 400, 2366.67, -48.48];
$p_organic_social = [50, 1100, 66.67, 100, -33.33, 12.5, 660];
$p_referral = [-100, 100, 0, -100, -100, 200, -50];
/* #endregion */

var_dump(
    count(get_min(get_max_min($p_total_daily)))
);
echo "<br />";
var_dump(
    get_min(get_max_min($p_total_daily))
);
