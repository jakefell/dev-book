<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 17/05/15
 * Time: 17:00
 */
?>

<html>
<head>
    <title>Book-O-Rama Search Results</title>
</head>
<body>
<h1>Book-O-Rama Search Results</h1>
<?php
    // Create short variable names
    $searchType = isset($_POST['searchType']) ? $_POST['searchType'] : null;
    $searchTerm = isset($_POST['searchTerm']) ? trim($_POST['searchTerm']) : null;
    if (!$searchType || !$searchTerm) {
        echo 'You have not entered search details. Please go back and try again.';
        exit;
    }

    if (!get_magic_quotes_gpc()) {
        $searchType = addslashes($searchType);
        $searchTerm = addslashes($searchTerm);
    }

    @ $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }

    $query = "SELECT * FROM books WHERE " . $searchType . " LIKE '%" . $searchTerm . "%'";
    $result = $db->query($query);

    $numResults = $result->num_rows;

    echo '<p>Number of books found: ' . $numResults . '</p>';

//    Associative array
//    for ($i = 0; $i < $numResults; $i++) {
//        $row = $result->fetch_assoc();
//
//        echo '<p><strong>' . ($i + 1) . '. Title: ';
//        echo htmlspecialchars(stripslashes($row['title']));
//        echo '</strong><br/>Author: ';
//        echo stripslashes($row['author']);
//        echo '<br/>ISBN: ';
//        echo stripslashes($row['isbn']);
//        echo '<br/>Price: ';
//        echo stripslashes($row['price']);
//        echo '</p>';
//    }

//  Object
    for ($i = 0; $i < $numResults; $i++) {
        $row = $result->fetch_object();

        echo '<p><strong>' . ($i + 1) . '. Title: ';
        echo htmlspecialchars(stripslashes($row->title));
        echo '</strong><br/>Author: ';
        echo stripslashes($row->author);
        echo '<br/>ISBN: ';
        echo stripslashes($row->isbn);
        echo '<br/>Price: ';
        echo stripslashes($row->price);
        echo '</p>';
    }

    $result->free();
    $db->close();
?>
</body>
</html>