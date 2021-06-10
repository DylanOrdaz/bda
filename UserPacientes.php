<?php
    require_once("../Database.php");
    require_once("../IUserPaciente.php");

    class User implements IUser {
    	private $con;
        private $id;
        private $consultorio;
        private $paciente;
        private $telefono;
        private $fecha;

    	public function __construct(Database $db){
    		$this->con = new $db;
    	}

        public function setId($id){
            $this->id = $id;
        }

        public function setConsultorio($consultorio){
            $this->consultorio = $consultorio;
        }

        public function setNomPaciente($nompaciente){
            $this->paciente = $paciente;
        }
        public function setApePaciente($apepaciente){
            $this->paciente = $paciente;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

    	//obtenemos usuarios de una tabla con postgreSql
    	public function get(){
    		try{
                if(is_int($this->id)){
                    
                    $query = $this->con->prepare('SELECT paciente_id, consultorio_nombre, CONCAT(paciente_nombre,' ',paciente_apellido) AS Nombre,paciente_telefono,paciente_fecha_nacimiento from pacientes p INNER JOIN consultorios c ON p.consultorio_id = c.consultorio_id;');
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{
                    
                    $query = $this->con->prepare('SELECT * FROM pacientes');
        			$query->execute();
        			$this->con->close();
                    
        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
    	}

        public static function baseurl() {
             return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/crudpgsql/";
        }

        public function checkUser($user) {
            if( ! $user ) {
                header("Location:" . User::baseurl() . "app/list.php");
            }
        }
    }
?>