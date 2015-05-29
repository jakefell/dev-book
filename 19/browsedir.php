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
$current_dir = '/home/vagrant/uploads/';
$dir = opendir($current_dir);

echo '<p>Upload directory is ' . $current_dir . '</p>';
echo '<p>Directory Listing:</p>';
echo '<ul>';

while (($file = readdir($dir)) !== false) {
    // Strip out the two entries of . and ..
    if ($file != "." && $file != "..") {
        echo '<li>' . $file . '</li>';
    }
}

echo '</ul>';
closedir($dir);
?>

</body>
</html>