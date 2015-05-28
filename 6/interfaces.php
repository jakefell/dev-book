<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 13/05/15
 * Time: 22:33
 */
    interface Displayable {
        function display();
    }

    class webPage implements Displayable {
        public function display() {
            echo 'Display something!';
        }
    }

$page = new webPage();
$page->display();