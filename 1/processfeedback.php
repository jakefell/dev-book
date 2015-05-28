<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 11/05/15
 * Time: 10:19
 */

// Create short variable names
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

// Set up some static information
$toAddress = 'pantera_a7x@hotmail.com';

$subject = 'Feedback from website';

$mailContent = 'Customer name: ' . $name . "\n" .
               'Customer email: ' . $email . "\n" .
                "Customer comments:\n" . $feedback . "\n";

$fromAddress = 'From: webserver@example.com';

// Invoke mail() function to send mail
mail($toAddress, $subject, $mailContent, $fromAddress);
?>

<html>
<head>
    <title>Bob's Auto Parts - Feedback Submitted</title>
</head>
<body>
<h1>Feedback Submitted</h1>
<?php
    echo '
    <p>Your feedback has been sent. See below</p>';
    echo '<p>' . nl2br($mailContent) . '</p>';
?>
</body>
</html>