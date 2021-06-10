<?php

class Database extends PDO{
 
	//dbname
	private $dbname = "consultoriod";
	//host
	private $host 	= "localhost";
	//user database
	private $user 	= "Dental";
	//password user
	private $pass 	= 'Dental5512!';
	//port
	private $port 	= 5432;
    //instance
	private $dbh;
 
	//connect with postgresql and pdo
	public function __construct(){
	    try {
	        $this->dbh = parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");
			echo "Conexion exitosa <hr>";
	    }
        catch(PDOException $e){
	        echo  $e->getMessage();
			echo "Error de con";
	    } 
	}
 
	//función para cerrar una conexión pdo
	public function close(){
    	$this->dbh = null;
	} 
}

?>