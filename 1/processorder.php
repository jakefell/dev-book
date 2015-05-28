<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 09/05/15
 * Time: 16:58
 */

require('fileioexception.php');

$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$find = $_POST['find'];
$address = $_POST['address'];

$date = date('H:i, jS F Y');

$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$totalamount = 0.00;
$totalamount = $tireqty * TIREPRICE
             + $oilqty * OILPRICE
             + $sparkqty * SPARKPRICE;


?>

<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>

<p>Order Processed at <?php echo $date ?></p>

<p>Your order is as follows: </p>
<p>
<?php
    if ($tireqty > 0)
        echo $tireqty . ' tires<br />';
    if ($oilqty > 0)
        echo $oilqty . ' bottles of oil<br />';
    if ($sparkqty > 0)
        echo $sparkqty . ' spark plugs<br />';
?>
</p>
<?php
    echo '<p>Items ordered: ' . $totalqty . '<br />
          Subtotal: $' . number_format($totalamount, 2) . '<br />
          Address to ship to is: ' . $address . '</p>';

    $outputstring = $date . "\t" . $tireqty . " tires\t" . $oilqty . " oil\t"
                    . $sparkqty . " spark plugs\t$" . $totalamount . "\t"
                    . $address . "\n";

    // Open file for appending
    $fp = fopen("$DOCUMENT_ROOT/orders", 'ab');
    flock($fp, LOCK_EX);
    if (!$fp) {
        echo '<p><strong>Your order could not be processed at this time.
              Please try again later</strong></p></body></html>';
        exit;
    }

    fwrite($fp, $outputstring, strlen($outputstring));
    flock($fp, LOCK_UN);
    fclose($fp);

    echo '<p>Order written</p>';

    switch ($find) {
        case "a":
            echo '<p>Regular customer.</p>';
            break;
        case "b":
            echo '<p>Customer referred by TV advert.</p>';
            break;
        case "c":
            echo '<p>Customer referred by phone directory.</p>';
            break;
        case "d":
            echo '<p>Customer referred by word of mouth.</p>';
            break;
        default:
            echo '<p>We do not know how this customer found us.';
            break;
    }
?>
</body>
</html>