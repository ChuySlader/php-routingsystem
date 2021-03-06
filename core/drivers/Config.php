<?php
class Config extends Driver\Base {
	static private $instance = null;
	static private $dbtype = "mysql";
    static private $controller = "test";
	static private $content = "main.default";
	static private $database = array(
		"mysql" => array(
			"host" => "localhost",
			"username" => "root",
			"password" => "",
			"database" => ""
		)
	);
	
	static private $mail = array("method" => "mail", "data" => array());

	public static function getDBConfig() {
		$dbObj = new \stdClass();
		$dbObj->type = self::$dbtype;

		foreach (self::$database[self::$dbtype] as $key => $value) {
			$dbObj->$key = $value;
		}
		
		return $dbObj;
	}
	
	public static function getAutoloaders() {
		return self::$autoloaders;
	}
	
	public static function getMailConfig() {
		return self::$mail;
	}
	
	public function __clone() {
		trigger_error('Clone no se permite.', E_USER_ERROR);
	}

    public static function defaultController() {
		return self::$controller;
	}
        
	public static function defaultContent() {
		return self::$content;
	}
        
    public static function setDefaultView($view = null) {
                if( !$view ) return false;
		self::$view = $view;
	}
	
}
