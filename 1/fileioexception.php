<?php
/**
 * Created by PhpStorm.
 * User: jakefell
 * Date: 16/05/15
 * Time: 21:46
 */
    class FileIOException extends Exception
    {
        private $type;

        public function __construct($type = "", $message = "", $code = 0, Exception $previous = null) {
            parent::__construct($message, $code, $previous);
            $this->type = $type;
        }

        function __toString() {
            $result = "
            {$this->getCode()}
            : {$this->getMessage()}<br /> in {$this->getFile()} on line {$this->getLine()}
            <br />";

            switch ($this->type) {
                case 'open':
                    $result = 'FileIOException - Open' . $result;
                    break;
                case 'write':
                    $result = 'FileIOException - Write' . $result;
                    break;
                case 'lock':
                    $result = 'FileIOException - Lock' . $result;
                    break;
                default:
                    $result = 'FileIOException - Unknown' . $result;
                    break;
            }

            return $result;
        }
    }