<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Colors</title>
    <style>
        .color-div {
            width: 100px;
            height: 100px;
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php
        $colors = ['red', 'green', 'blue', 'yellow', 'orange', 'purple', 'pink', 'brown'];
        shuffle($colors);
        for ($i = 0; $i < 4; $i++) {
            echo '<div class="color-div" style="background-color: ' . $colors[$i] . ';"></div>';
        }
    ?>
</body>
</html>
<?php
function generateCalendar($month) {
    if ($month < 1 || $month > 12) {
        echo "Invalid month. Please enter a month value between 1 and 12.";
        return;
    }
    $year = date('Y');
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    echo '<table border="1">';
    echo '<tr><th colspan="7">Calendar for ' . date('F Y', $firstDayOfMonth) . '</th></tr>';
    echo '<tr><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>';
    $daysInMonth = date('t', $firstDayOfMonth);
    $firstDayOfWeek = date('N', $firstDayOfMonth);
    $day = 1;
    $currentDayOfWeek = 1;
    while ($day <= $daysInMonth) {
        echo '<tr>';
        for ($i = 1; $i <= 7; $i++) {
            if ($currentDayOfWeek < $firstDayOfWeek && $day == 1) {
                echo '<td></td>';
            } else {
                if ($day <= $daysInMonth) {
                    echo '<td>' . $day . '</td>';
                    $day++;
                } else {
                    echo '<td></td>';
                }
            }

            $currentDayOfWeek++;
        }
        echo '</tr>';
    }
    echo '</table>';
}
generateCalendar(11);
?>