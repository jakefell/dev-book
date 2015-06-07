<?php
/**
 * Class: ${NAME}
 * Created: 07/06/15 17:48
 * Author: Jake Fell <jake@jakefell.com>
 */

// set date for calculation
$day = 9;
$month = 9;
$year = 1989;

// remember you need bday as day month and year
$bdayUnix = mktime(0, 0, 0, $month, $day, $year); // get timestamp for then
$nowUnix = time(); // get unix timestamp for now
$ageUnix = $nowUnix - $bdayUnix; // work out the difference
$age = floor($ageUnix / (365 * 24 * 60 * 60)); // convert from seconds to years. (365 * 24 * 60 * 60) works out the number of seconds in a year

echo 'Age is ' . $age;