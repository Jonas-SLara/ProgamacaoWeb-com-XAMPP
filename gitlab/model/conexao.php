<?php
    abstract class Conexao{
        private static $host="localhost";
        private static $user="root";
        private static $senha="";
        private static $db="gitlab";
        private static $con;

        public static function connect(){
            self::$con=mysqli_connect(self::$host, self::$user, self::$senha, self::$db)
                or die("erro ao se conectar" . mysqli_connect_error());
        }

        public static function query($command){
            $result = mysqli_query(self::$con, $command)
                or die("erro na consulta" . mysqli_error(self::$con));
            return $result;
        }

        public static function close(){
            mysqli_close(self::$con);
        }
    }
?>