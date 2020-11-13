<?php
$nums = array();

echo "<table border='2px'>";
for ($x = 0; $x < 5; $x++) {
    echo "<tr style=''>";
    for ($y = 0; $y < 10; $y++) {
        $nums[$y] = rand(1, 10);
        echo "<td style='padding: 10px; text-align: center'>$nums[$y]</td>";
    }
    echo "</tr>";

}
echo "</table>";







