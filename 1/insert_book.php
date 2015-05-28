<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 18/05/15
 * Time: 23:10
 */
?>

<html>
<head>
    <title>Book-O-Rama - Book Entry Results</title>
</head>
<body>
<h1>Book-O-Rama - Book Entry Results</h1>
<?php
    // Create short variable names
    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : null;
    $author = isset($_POST['author']) ? $_POST['author'] : null;
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;

    if (!$isbn || !$author || !$title || !$price) {
        echo 'You have not entered all the required details.<br/>' .
             'Please go back and try again';
        exit;
    }

    if (!get_magic_quotes_gpc()) {
        $isbn = addslashes($isbn);
        $author = addslashes($author);
        $title = addslashes($title);
        $price = doubleval($price);
    }

    @ $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database, Please try again later';
        exit;
    }

    $query = "INSERT INTO books VALUES
              ('{$isbn}', '{$author}', '{$title}', {$price})";
    $result = $db->query($query);

    if ($result) {
        echo $db->affected_rows . ' book inserted into database.';
    } else {
        echo 'An error has occurred. The item was not added.';
    }

    $db->close();
?>
</body>
</html>
