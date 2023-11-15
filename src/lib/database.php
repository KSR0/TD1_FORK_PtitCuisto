<?php

class DatabaseConnection
{
	public ?PDO $database = null;

	public function getConnection(): PDO {
        $db_host = parse_ini_file('bayon222_all_secret_variables.env')["DB_HOST"];
        $db_name = parse_ini_file('bayon222_all_secret_variables.env')["DB_NAME"];
        $db_encode = parse_ini_file('bayon222_all_secret_variables.env')["DB_ENCODE"];
        $db_username = parse_ini_file('bayon222_all_secret_variables.env')["DB_USERNAME"];
        $db_password = parse_ini_file('bayon222_all_secret_variables.env')["DB_PASSWORD"];
        
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);
    	}
    	return $this->database;
	}
}
