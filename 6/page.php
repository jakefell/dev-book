<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 13/05/15
 * Time: 22:40
 */
    class page
    {
        public $title = 'TLA Consulting Pty Ltd';
        public $content;
        public $keywords = 'TLA Consulting, Three Letter Abbreviation,
                          some of tmy best friends are search engines';
        public $buttons = array('Home' => 'home.php',
                                'Contact' => 'contact.php',
                                'Services' => 'services.php',
                                'Site Map' => 'sitemap.php');


        public function __set($name, $value) {
            $this->$name = $value;
        }

        public function display() {
            echo '<html><head>';
            $this->displayTitle();
            $this->displayKeywords();
            $this->displayStyles();
            echo '</head><body>';

            $this->displayHeader();
            $this->displayMenu($this->buttons);

            echo $this->content;

            $this->displayFooter();
            echo '</body></html>';
        }

        public function displayTitle() {
            echo '<title>' . $this->title . '</title>';
        }

        public function displayKeywords() {
            echo '<meta name=\"keywords\" content=\"' . $this->keywords . '\">';
        }

        public function displayStyles() {
?>
<style>
    h1 {
        color: white;
        font-size: 24pt;
        text-align: center;
        font-family: arial, sans-serif;
    }
    .menu {
        color: white;
        font-size: 12pt;
        text-align: center;
        font-family: arial, sans-serif;
        font-weight: bold;
    }
    td {
        background: black;
    }
    p {
        color: black;
        font-size: 12pt;
        text-align: justify;
        font-family: arial, sans-serif;
        font-weight: bold;
    }
    p.foot {
        color: white;
        font-size: 9pt;
        text-align: center;
        font-family: arial, sans-serif;
        font-weight: bold;
    }
    a:link, a:visited, a:active {
        color: white;
    }
</style>
<?php
        }

        public function displayHeader() {
?>
<table width="100%" cellpadding="12" cellspacing="0"
       border="0">
    <tr bgcolor ="black">
        <td align ="left">
            <img src = "images/logo.gif" />
        </td>
        <td>
            <h1>TLA Consulting Pty Ltd</h1>
        </td>
        <td align ="right">
            <img src = "images/logo.gif" />
        </td>
    </tr>
</table>
<?php
        }

        public function displayMenu($buttons) {
            echo "<table width=\"100%\" bgcolor=\"white\" cellpadding=\"4\" cellspacing=\"4\">\n"; echo "<tr>" ;
            //calculate button size
            $width = 100/count($buttons);
            while (list($name, $url) = each($buttons)) {
                $this->DisplayButton($width, $name, $url, !$this->IsURLCurrentPage($url));
            }
            echo "</tr>";
            echo "</table>";
        }

        public function displayFooter() {

        }

        public function isURLCurrentPage($url) {
            return strpos($_SERVER['PHP_SELF'], $url) > 0 ? true : false;
        }

        public function displayButton($width, $name, $url, $active = true) {
            if ($active) {
                echo "
                <td width = \"".$width."%\">
                <a href=\"".$url."\">
                <img src=\"images/s-logo.gif\" alt=\"".$name."\" border=\"0\" /></a>
                <a href=\"".$url."\"><span class=\"menu\">".$name."</span></a>
                </td>";
            } else {
                echo "
                <td width=\"".$width."%\">
                <img src=\"images/side-logo.gif\">
                <span class=\"menu\">".$name."</span>
                </td>";
            }

        }
    }