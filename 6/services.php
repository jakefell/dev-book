<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 14/05/15
 * Time: 20:04
 */
    require('page.php');

    class ServicesPage extends Page
    {
        private $row2Buttons = array(
            'Re-engineering' => 'reengineering.php',
            'Standards Compliance' => 'standards.php',
            'Buzzword Compliance' => 'buzzword.php',
            'Mission Statements' => 'mission.php'
            );

        public function display() {
            echo '
            <html><head>';
            $this->displayTitle();
            $this->displayKeywords();
            $this->displayStyles();
            echo '
            </head>
            <body>';
            $this->displayHeader();
            $this->displayMenu($this->buttons);
            $this->displayMenu($this->row2Buttons);

            echo $this->content;

            $this->displayFooter();
            echo '
            </body>
            </html>';
        }
    }

    $services = new ServicesPage();

    $services->content = '
    <p>At TLA Consulting, we offer a number of services. Perhaps the productivity of your employees would improve
    if we re-engineered your business. Maybe all your business needs a fresh new mission statement, or a new batch of buzzwords.</p>';

    $services->display();