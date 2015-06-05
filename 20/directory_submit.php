<html>
<head>
    <title>Site submission results</title>
</head>
<body>
<h1>Site submission results</h1>

<?php
/**
 * Class: ${NAME}
 * Created: 02/06/15 20:49
 * Author: Jake Fell <jake@jakefell.com>
 */

// extract form fields
$url = $_REQUEST['url'];
$email = $_REQUEST['email'];

// check the url
$url = parse_url($url);
$host = $url['host'];
if (!($ip = gethostbyname($host))) {
    echo 'Host for URL does have a valid IP';
    exit;
}

echo 'Host is at IP ' . $ip . '<br/>';

// check the email address
$email = explode('@', $email);
$emailhost = $email[1];

// note that the dns_get_mx() function is *not implelemted* in
// Windows versions of PHP
if (!dns_get_mx($emailhost, $mxhostsarr)) {
    echo 'Email address is not at valid host';
    exit;
}

echo 'Email is delivered via: ';
foreach ($mxhostsarr as $mx) {
    echo $mx;
}

// if reached here, all ok

echo '<br/>All submitted details are ok.<br/>';

echo 'Thank you for submitting your site.<br/>
      It will be visited by one of our staff members soon.';

// in real case, add to db waiting sites

?>

</body>
</html>