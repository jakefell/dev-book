<?php
/**
 * Class: ${NAME}
 * Created: 07/06/15 17:53
 * Author: Jake Fell <jake@jakefell.com>
 */

// set date for calculation
$day = 9;
$month = 9;
$year = 1989;

// format birthday as an ISO 8601 date
$bdayISO = date('c', mktime(0, 0, 0, $month, $day, $year));

// use mysql query to calculate an age in days
$db = mysqli_connect('localhost', 'homestead', 'secret');
$result = $db->query("SELECT DATEDIFF(now(), '$bdayISO')");
$age = $result->fetch_array()[0];

// convert age in days to years (approximately)
echo 'Age is ' . floor($age / 365.25);