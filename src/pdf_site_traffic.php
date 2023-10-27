<?php
ob_start();
session_start();

$total = 0;
$total_last_week = 0;

/* #region Array per data range */
// 18-23 // 1-6 
// 24-30 // 7-13
$week = [24, 25, 26, 27, 28, 29, 30];

/* #region OLD DATE */

/* #region Percent 16-22 August */
// $p_total_daily = [-0.73, 58.42, 15.66, -7.06, -15.63, 60.13, -18.44];
// $p_paid_search = [0, 47.83, 12.77, -23.08, 50, -1.1, -43.24];
// $p_direct = [-2.08, 46.43, 66.67, 15, -62.5, 43.9, -65.15];
// $p_organic_search = [-3.85, 48, -29.41, 20, 400, 2366.67, -48.48];
// $p_organic_social = [50, 1100, 66.67, 100, -33.33, 12.5, 660];
// $p_referral = [-100, 100, 0, -100, -100, 200, -50];
/* #endregion */

/* #region Percent 23-29 August */
// $p_total_daily = [-4.58, -34.5, -10.28, -26.97, -37.93, -68.38, -55.74];
// $p_paid_search = [-8.33, -30.99, -33.98, -76, -60, -65.56, -12.12];
// $p_direct = [5.45, -14.89, 20.69, 0, 0, -71.19, -46.58];
// $p_organic_search = [-13.33, -62.5, -18.75, -43.75, -58.33, -51.85, -3.85];
// $p_organic_social = [0, -27.27, 20, 50, -60, -98.65, -96.88];
// $p_referral = [0, -50, 400, -100, 0, -100, 50];
/* #endregion */

/* #region Percent 30-05 August */
// $p_total_daily = [-6.85, 3.57, 5.21, -32.31, -57.58, -44.52, -15.82];
// $p_paid_search = [12.73, -4.08, 21.62, 166.67, 0, -24.36, -37.93];
// $p_direct = [-29.31, -22.5, -20, -81.82, -100, -72.5, 23.08];
// $p_organic_search = [7.69, 106.67, 84.62, 66.67, -33.33, -59.09, 8];
// $p_organic_social = [0, -50, -33.33, -33.33, -80, -50, -40];
// $p_referral = [-100, 200, -100, 0, -100, 0, -66.67];
/* #endregion */

/* #region Percent 06-12 August */
// $p_total_daily = [91.52, 27.66];
// $p_paid_search = [31.58, 27.49];
// $p_direct = [111.57, 52.94];
// $p_organic_search = [22.11, 6.48];
// $p_organic_social = [769.43, 30];
// $p_referral = [133.33, 200];
/* #endregion */

/* #region 13-19 September */
// $p_total_daily = [-56.52, 2.27, 6.54, -10.42, -34.29, -48.09, -52.14];
// $p_paid_search = [-70.59, 1.43, 29.79, 24.14, -45.45, -73.53, -67.19];
// $p_direct = [-44.83, 0, -34.38, -38.78, -50, -51.85, -54.29];
// $p_organic_search = [-66.67, 18.18, 5, -31.25, -50, -57.14, -48.48];
// $p_organic_social = [-85.71, -28.57, 12.5, 150, -100, -83.33, -75];
// $p_referral = [-80, 100, 0, 300, 0, 50, -100];
/* #endregion */

/* #region 20-26 September */
// $p_total_daily = [11.27, -50.37, -11.4, 2.33, -71.43, -27.82, -28.3];
// $p_paid_search = [-8.96, -69.01, -21.31, -47.22, -100, -56.52, -66.67];
// $p_direct = [45.24, -46.88, 28.57, 60, -68.75, -32.35, -33.33];
// $p_organic_search = [34.78, -46.15, 0, -47.22, -28.57, -40.91, -26.09];
// $p_organic_social = [-12.5, -80, -55.56, -40, -100, 0, -60];
// $p_referral = [-100, -100, 0, -100, -100, -66.67, 0];
/* #endregion */

/* #region 26 September - 02 October*/
// $p_total_daily = [9.43, -18.99, -40.16, -6.3, 6.82, 36.84, -53.02];
// $p_paid_search = [-28.57, -26.23, -61.67, -14.58, 94.74, 100, -100];
// $p_direct = [58.33, -21.31, -36.67, -33.33, -16.66, 0, -63.27];
// $p_organic_search = [-8.7, -22.58, -29.17, 23.81, -16.67, 11.11, 50];
// $p_organic_social = [40, 14.29, -85.71, 50, -33.33, 200, -83.33];
// $p_referral = [0, 0, 0, 200, 0, 0, -66.67];
/* #endregion */

/* #region 26 September - 02 October*/
// $p_total_daily = [18.97, -42.19, -34.68, 39.36, -8.51, 42.11, 8.11];
// $p_paid_search = [133.33, -95.56, -98.18, 70.73, -21.62, -100, -96.49];
// $p_direct = [-28.07, -54.17, -53.66, 72.22, -2.5, -28.57, -38.89];
// $p_organic_search = [4.76, 45.83, 91.3, -15.38, 13.33, 77.78, 300];
// $p_organic_social = [-28.57, -100, 150, -33.33, -50, 100, -50];
// $p_referral = [-100, -100, -50, 0, 0, 0, -100];
/* #endregion */

/* #region 10 October - 16 October*/
// $p_total_daily = [-21.01, -21.17, -17.69, 17.56, 24.42, -43.48, -31.31];
// $p_paid_search = [-98.57, -98.44, -98.36, 15.71, 48.28, -96.55, -100];
// $p_direct = [-53.66, 2.33, 26.32, 35.48, 15.38, 22.22, 78.38];
// $p_organic_search = [154.55, 39.29, 47.62, 18.18, 5.88, 40, 52];
// $p_organic_social = [-100, -100, -100, -25, 100, -66.67, 0];
// $p_referral = [0, 0, 0, -33, -100, 0, 0];
/* #endregion */

/* #region 17 October - 23 October*/
// $p_total_daily = [-32.56, -23.53, -14.12, 43.51, 22.43, -45.65, -38.2];
// $p_paid_search = [-81.13, -83.18, -78.64, 122.22, 44.19, -71.43, -64.33];
// $p_direct = [-14.29, 21.95, 30, -35.71, 17.78, 0, 19.3];
// $p_organic_search = [21.05, 21.05, 48, -42.31, -27.78, -20, -74.19];
// $p_organic_social = [-100, -50, 0, -66.67, 50, -100, -87.5];
// $p_referral = [0, 0, 0, -100, 0, 0, -100];
/* #endregion */
/* #endregion */

/* #region 24 October - 30 October*/
$p_total_daily = [-35.68, -45.33, -65.56];
$p_paid_search = [-66.05, -81.05, -90.61];
$p_direct = [6.67, -12.77, -46.97];
$p_organic_search = [-50, -23.53, -33.33];
$p_organic_social = [-33.33, -100, 0];
$p_referral = [-100, 0, 0];
/* #endregion */

/* #region FUNCTIONS */

/* #region function to daily record */
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
/* #endregion */

/* #region function to weekly record */
function record_weekly($array_week, $array_lweek)
{
    $data_prom = array();
    for ($i = 0; $i < count($array_week); $i++) {
        for ($j = 0; $j < count($array_lweek); $j++) {
            if ($i == $j) {
                $prom = $array_week[$i] - $array_lweek[$j];
                array_push($data_prom, $prom);
            }
        }
    }

    return $data_prom;
}
/* #endregion */

/* #region function to get the max and min total of records */
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
/* #endregion */

/* #endregion */

/* #region DATA LIST */

/* #region data list (weekly) - 8/16/2023 */

// $week = [16, 17, 18, 19, 20, 21, 22];
$total_week = 498;

$total_daily = [136, 160, 96, 79, 11, 1, 1];
$paid_search = [58, 68, 53, 23, 2, 1, 1];
$direct = [47, 41, 25, 40, 6, 1, 1];
$organic_search = [25, 37, 12, 12, 6, 1, 1];
$organic_social = [6, 12, 5, 4, 3, 1, 1];
$referral = [0, 2, 1, 0, 0, 1, 1];

/* #endregion */

/* #region data list (last week) */
$last_week = [9, 10, 11, 12, 13, 14, 15];
$total_lastWeek = 588;

$l_total_daily = [137, 101, 83, 85, 32, 150, 167];
$l_paid_search = [58, 46, 47, 20, 6, 89, 70];
$l_direct = [48, 28, 15, 52, 16, 36, 63];
$l_organic_search = [26, 25, 17, 10, 8, 21, 28];
$l_organic_social = [4, 1, 3, 2, 1, 3, 5];
$l_referral = [1, 1, 1, 1, 1, 1, 1];

/* #endregion */

/* #region create the final array */
$daily_record = records_daily($total_daily);
$paid_search_data = records_daily($paid_search);
$direct_data = records_daily($direct);
$organic_search_data = records_daily($organic_search);
$organic_social_data = records_daily($organic_social);
$referral_data = records_daily($referral);

$l_daily_record = records_daily($l_total_daily);
$l_paid_search_data = records_daily($l_paid_search);
$l_direct_data = records_daily($l_direct);
$l_organic_search_data = records_daily($l_organic_search);
$l_organic_social_data = records_daily($l_organic_social);
$l_referral_data = records_daily($l_referral);
/* #endregion */

/* #endregion */

// $bg_color = '#e2e2e2';
$bg_color = '#fff';
$cell_red = "#ff8f8f";
$cell_green = "#beecb9";
$actual_date = "08/16/2023 - 08/22/2023";
$last_date = "08/09/2023 - 08/14/2023";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <title>User acquisition - Report</title>
</head>

<body style="font-size: 1.5rem;">

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">User acquisition</h1>
    <p style="font-size: 1.5rem; text-align: center;"><b>10/<?= $week[0] ?>/2023</b> - <b>10/<?= $week[6] ?>/2023</b></p>
    <div>
        <div style="width: 12px; height: 12px; background: <?= $cell_green ?>;"></div>
        <p>More than 50% (positive)</p>
    </div>
    <div>
        <div style="width: 12px; height: 12px; background: <?= $cell_red ?>;"></div>
        <p>less than -40% (negative)</p>
    </div>

    <section style="margin-top: 2rem;">

        <section>
            <!-- User acquisition - Total users -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong>Total Daily: </strong></p>
                <!-- <small><?= $actual_date ?></small> -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>10/<?= $day ?>/2023</th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_total_daily as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- User acquisition - Paid Search -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Paid Search: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>10/<?= $day ?>/2023</th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_paid_search as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Direct -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Direct: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>10/<?= $day ?>/2023</th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_direct as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Organic Search -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Organic Search: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>10/<?= $day ?>/2023</th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_organic_search as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Organic Social -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Organic Social: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>10/<?= $day ?>/2023</th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_organic_social as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Referral -->
            <div style="background-color: <?= $bg_color ?>">
                <p><strong> Referral: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>10/<?= $day ?>/2023</th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_referral as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>
        <br>

</body>

</html>
<?php
/* #region DOMPDF */
require 'vendor/autoload.php';

use \Dompdf\Dompdf;

$tmp = sys_get_temp_dir();

$dompdf = new Dompdf([
    'logOutputFile' => '',
    // authorize DomPdf to download fonts and other Internet assets
    'isRemoteEnabled' => true,
    // all directories must exist and not end with /
    'fontDir' => $tmp,
    'fontCache' => $tmp,
    'tempDir' => $tmp,
    'chroot' => $tmp,
    'enable_remote' => true
]);


$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream('user_acquisition.pdf', [
    'compress' => true,
    'Attachment' => false,
]);

// To render in Browser
$f;
$l;
if (headers_sent($f, $l)) {
    echo $f, '<br/>', $l, '<br/>';
    die('now detect line');
}
/* #endregion */
?>