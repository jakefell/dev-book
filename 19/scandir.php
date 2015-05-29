<html>
<head>
    <title>Browse Directories</title>
</head>
<body>
<h1>Browsing</h1>

<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 29/05/15
 * Time: 19:12
 */
$dir = '/home/vagrant/uploads/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

echo '<p>Upload directory is ' . $dir . '</p>';
echo '<p>Directory Listing in Alphabetical Order, Ascending:</p>';
echo '<ul>';

foreach ($files1 as $file) {
    if ($file != '.' && $file != '..') {
        echo '<li>' . $file . '</li>';
    }
}

echo '</ul>';

echo '<p>Upload directory is ' . $dir . '</p>';
echo '<p>Directory Listing in Alphabetical Order, Descending:</p>';
echo '<ul>';

foreach ($files2 as $file) {
    if ($file != '.' && $file != '..') {
        echo '<li>' . $file . '</li>';
    }
}

echo '</ul>';
?>

</body>
</html>