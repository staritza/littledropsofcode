<?php
class Database {
    private static $instance;
    private $dbh;

    private function __construct() {
	$type = '@DB_TYPE@';
	$host = '@DB_HOST@';
	$name = '@DB_NAME@';
	$user = '@DB_USER@';
	$pass = '@DB_PASS@';

	$this->dbh = new PDO("$type:host=$host;dbname=$name", $user, $pass);
    }

    public static function instance() {
	if (!isset(self::$instance)) {
	    $class = __CLASS__;
	    self::$instance = new $class;
	}

	return self::$instance;
    }

    public function connection() {
	return $this->dbh;
    }
}
?>
