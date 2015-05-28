<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 12/05/15
 * Time: 20:08
 */

function create_table($data) {
    echo '<table border=\"1\">';

    reset($data);

    $value = current($data);
    while ($value) {
        echo '<tr><td>' . $value . '</td></tr>';
        $value = next($data);
    }
    echo '</table>';
}

function create_table2($data, $border = 1, $cellpadding = 4, $cellspacing = 4) {
    echo "<table border=\"$border\" cellpadding=\"$cellpadding\" cellspacing=\"$cellspacing\">";

    reset($data);

    $value = current($data);
    while ($value) {
        echo '<tr><td>' . $value . '</td></tr>';
        $value = next($data);
    }
    echo '</table>';
}

function var_args() {
    echo 'Number of parameters: ' . func_num_args();

    echo '<br />';

    foreach (func_get_args() as $argument) {
        echo $argument . '<br />';
    }
}

function global_vars() {
    global $myvar;
    echo '<p>' . $myvar . '</p>';
}

function increment_by_ref(&$value, $amount = 1) {
    $value = $value + $amount;
}

$array = array('Line One.', 'Line Two.', 'Line Three.');
create_table($array);

echo '<br /><br />';

create_table2($array, 3, 7, 7);

echo '<br /><br />';

var_args(1, 2, 3, 4, 5, 'hello', 'world', 6, 7, 8, 9, '10!');

$myvar = '5';
echo '<p>' . $myvar . '</p>';
global_vars();

$myval = 5;
increment_by_ref($myval, 4);
echo '<p>' . $myval . '</p>';