<?php
ob_start();
session_start();

$total = 0;
$total_last_week = 0;

/* #region Array per data range */
$week = [30, 31, 01, 02, 03, 04, 05];

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
$p_total_daily = [-6.85, 3.57, 5.21, -32.31, -57.58];
$p_paid_search = [12.73, -4.08, 21.62, 166.67, 0];
$p_direct = [-29.31, -22.5, -20, -81.82, -100];
$p_organic_search = [7.69, 106.67, 84.62, 66.67, -33.33];
$p_organic_social = [0, -50, -33.33, -33.33, -80];
$p_referral = [-100, 200, -100, 0, -100];
/* #endregion */

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
    <p style="font-size: 1.5rem; text-align: center;"><b>08/16/2022</b> - <b>08/22/2023</b></p>
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
                <p> <strong>Total Daily </strong></p>
                <!-- <small><?= $actual_date ?></small> -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>08/<?= $day ?>/2023</th>
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
                <p> <strong> Paid Search </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>08/<?= $day ?>/2023</th>
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
                <p> <strong> Direct </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>08/<?= $day ?>/2023</th>
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
                <p> <strong> Organic Search </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>08/<?= $day ?>/2023</th>
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
                <p> <strong> Organic Social </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>08/<?= $day ?>/2023</th>
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
                <p> <strong> Referral </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th>08/<?= $day ?>/2023</th>
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