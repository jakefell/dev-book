<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 09/05/15
 * Time: 23:51
 */

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
    <title>Bob's Auto Parts - Customer Orders</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php
    @ $fp = fopen("$DOCUMENT_ROOT/orders", 'rb');
    flock($fp, LOCK_SH);
    if (!$fp) {
        echo '<p><strong>No orders pending.
              Please try again later.</strong></p>';
        exit;
    }

    echo '<p>';
    while (!feof($fp)) {
        $order = fgets($fp, 999);
        echo $order . '<br />';
    }
    echo '</p>';

    echo '<p>Final position in file pointer is: ' . ftell($fp) . '<br />';
    rewind($fp);
    echo 'After rewind, the position is: ' . ftell($fp) . '</p>';

    flock($fp, LOCK_UN);
    fclose($fp);
?>
</body>
</html>