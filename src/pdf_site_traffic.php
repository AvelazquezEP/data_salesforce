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

/* #region data list (weekly) - 8/16/2023 */

$week = [16, 17, 18, 19, 20, 21];
$total_week = 498;

$total_daily = [136, 160, 96, 79, 11];
$paid_search = [58, 68, 53, 23, 2];
$direct = [47, 41, 25, 40];
$organic_search = [25, 37, 12, 12, 6];
$organic_social = [6, 12, 5, 4, 3];
$referral = [0, 2, 1, 0, 0];

/* #endregion */

/* #region data list (last week) */
$last_week = [9, 10, 11, 12, 13, 14];
$total_lastWeek = 588;

$l_total_daily = [0];
$l_paid_search = [0];
$l_direct = [0];
$l_organic_search = [0];
$l_organic_social = [0];
$l_referral = [0];

/* #endregion */

/* #region invoke function to each User acquisition (weekly) */
echo " WEEKLY:<br />";
echo "Total daily:<br />";

var_dump(records_daily($total_daily));
$daily_record = records_daily($total_daily);

// echo "<br /><br /> Paid Search:<br />";
// var_dump(records_daily($paid_search));

// echo "<br /><br />Direct:<br />";
// var_dump(records_daily($direct));

// echo "<br /><br />Organic Search:<br />";
// var_dump(records_daily($organic_search));

// echo "<br /><br />Organic Social:<br />";
// var_dump(records_daily($organic_social));

// echo "<br /><br />Referral:<br />";
// var_dump(records_daily($referral));

/* #endregion */

/* #region invoke function to each User acquisition (last week) */

// echo "<br />";
// echo "<br />";
// echo "<br /><br /> LAST WEEK:<br />";

// echo "Total daily:<br />";
// var_dump(records_daily($l_total_daily));

// echo "<br /><br /> Paid Search:<br />";
// var_dump(records_daily($l_paid_search));

// echo "<br /><br />Direct:<br />";
// var_dump(records_daily($l_direct));

// echo "<br /><br />Organic Search:<br />";
// var_dump(records_daily($l_organic_search));

// echo "<br /><br />Organic Social:<br />";
// var_dump(records_daily($l_organic_social));

// echo "<br /><br />Referral:<br />";
// var_dump(records_daily($l_referral));

// echo "<br /><br />two list:<br />";
// var_dump(record_weekly($total_daily, $l_total_daily));

/* #endregion */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>User acquisition - Report</title>
</head>

<body style="font-size: 1.5rem;">

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">User acquisition</h1>
    <p style="font-size: 1.5rem; text-align: center;"><b>08/16/2022</b> - <b>08/23/2033</b></p>
    <br>

    <p style="font-size: 1.5rem;"><b>users: <?= $total_week ?></b></p>
    <p style="font-size: 1.5rem;"><b> users(last week): <?= $total_lastWeek ?></b></p>
    <section style="margin-top: 2rem;">

        <br>

        <section>
            <!-- User acquisition - Total users -->
            <p> <strong> Daily </strong></p>
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
                        <?php foreach ($daily_record as $record) : ?>
                            <th><?= $record ?></th>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>

            <!-- User acquisition - Paid Search -->
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
                        <?php foreach ($organic_search as $record) : ?>
                            <th><?= $record ?></th>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
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
$dompdf->stream('leads_report.pdf', [
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