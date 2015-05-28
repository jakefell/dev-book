<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 09/05/15
 * Time: 19:44
 */

echo
'<html>
<body>';
echo
'<table border="0" cellpadding="3">
<tr>
    <td bgcolor="#cccccc" align="center">Distance</td>
    <td bgcolor="#cccccc" align="center">Cost</td>
</tr>';

$distance = 50;
while ($distance <= 250) {
    echo '<tr>';
    echo '<td align=\"right\">' . $distance . '</td>';
    echo '<td align=\"right\">' . $distance / 10 . '</td>';
    echo "</tr>\n";

    $distance += 50;
}

echo '</table>';
echo
'</body>
</html>';