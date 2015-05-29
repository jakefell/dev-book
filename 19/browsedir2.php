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
$dir = dir('/home/vagrant/uploads/');

echo '<p>Handle is ' . $dir->handle . '</p>';
echo '<p>Upload directory is ' . $dir->path . '</p>';
echo '<p>Directory Listing:</p>';
echo '<ul>';

while (($file = $dir->read()) !== false) {
    // Strip out the two entries of . and ..
    if ($file != "." && $file != "..") {
        echo '<li><a href="filedetails.php?file=' . $file . '">' . $file . '</a></li>';
    }
}

echo '</ul>';
$dir->close();
?>

</body>
</html>