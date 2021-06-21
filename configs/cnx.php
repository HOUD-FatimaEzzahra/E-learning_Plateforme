<?php
//GoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooD
    class Connection{
        private $serv= 'localhost';
        private $user= 'root' ;
        private $pass='' ;
        private $bd='bts' ;

        private function pdoConnection(){
            $con = new PDO('mysql:host='.$this->serv.';dbname='.$this->bd ,$this->user,$this->pass);
            try {
                return $con;
            } catch( PDOException $e) {
                echo 'Database Error: ' . $e->getMessage();
            }
        }  
        public function connect(){
            return $this->pdoConnection();
        } 
    }
?>