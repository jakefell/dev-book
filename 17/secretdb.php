<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 25/05/15
 * Time: 16:25
 */
// create short variable names
$name = isset($_POST['name']) ? $_POST['name'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if (!isset($name) || !isset($password)) {
    // visitor need to enter a name and password
    ?>

    <h1>Please Log In</h1>
    <p>This page is secret</p>
    <form method="post" action="secretdb.php">
        <p>Username: <input type="text" name="name"></p>

        <p>Password: <input type="password" name="password"></p>

        <p>Username: <input type="submit" name="submit" value="Log In"></p>
    </form>

<?php
} else {
    // connect to mysql
    $mysql = mysqli_connect('localhost', 'webauth', 'webauth');
    if (!$mysql) {
        echo 'Cannot connect to database';
        exit;
    }

    // select the appropriate database
    $selected = $mysql->select_db('auth');
    if (!$selected) {
        echo 'Cannot select database';
        exit;
    }

    $query = "
    SELECT COUNT(*) FROM authorised_users WHERE
    name = '" . $name . "' AND
    password = '" . sha1($password) . "'";

    $result = $mysql->query($query);
    if (!$result) {
        echo 'Cannot run query';
        exit;
    }

    $row = $result->fetch_row();
    $count = $row[0];

    if ($count > 0) {
        // visitors name and password combination are correct
        echo '
        <h1>Here it is!</h1>
        <p>I bet you are glad you can see this secret page.</p>';
    } else {
        echo '
        <h1>Go Away!</h1>
        <p>You are not authoised to use this resource.</p>';
    }
}
?>
