<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";
for ($a = $jml; $a > 0; $a--)
{
    echo "<tr><td colspan='$jml'>\n";
    $total = 0;
    for ($b = $a; $b > 0; $b--)
    {
        $total += $b;
    }
    echo "total : $total";
    echo "</td></tr>\n";
    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--)
    {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}
echo "</table>";

?>