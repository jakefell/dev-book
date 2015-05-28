<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 16/05/15
 * Time: 21:16
 */
    try {
        throw new Exception('A terrible error has occurred', 42);
    }
    catch (Exception $ex) {
        echo 'Exception ' . $ex->getCode() . ': ' . $ex->getMessage() . '<br />' .
            ' in ' . $ex->getFile() . ' on line ' . $ex->getLine() . '<br /><br />';
    }

    try {
        throw new Exception('Another error has occurred!', 100);
    }
    catch (Exception $ex) {
        echo $ex;
    }
