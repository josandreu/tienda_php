<?php


class Bd {
    private $conexion;

    public function __construct() {
        try {
            // conexión al docker mysql
            $dsn = 'mysql:host=172.17.0.2;dbname=dwes;charset=utf8';
            $user = 'root';
            $pass = 'root';
            $this->conexion = new PDO($dsn, $user, $pass);
        } catch (Exception $ex) {
            die('Error conectando con la bd');
        }
    }

    /**
     * @param $user nombre
     * @param $pass password
     * @return bool true si el usuario y password existe en la tabla usuarios
     */
    public function verifica_usuario(string $user, string $pass) :bool {
        $consulta = 'SELECT * FROM usuarios where nombre = :nom and pass = :pass';
        $pass = md5($pass);
        /*
         *          OTRA FORMA, EN LUGAR DE PONER NOMBRE A LOS PARÁMETROS, SI FUERA CON ?
         *
         *          $sentencia = 'SELECT * FROM usuarios where nombre = ? and pass = ?';
         *          $stmt = $this->conexion->prepare($sentencia);
         *          $stmt->bindParam(1, $nom);
         *          $stmt->bindParam(2, $pass);
         *          $stmt->execute();
         */
        $datos = [':nom'=>$user, ':pass'=>$pass];
        $rtdo = $this->ejecuta_consulta($consulta, $datos);
        if ($rtdo->fetch()) return true;
        else return false;
    }

    public function listarProductos(): array {
        /*
        $consulta = $this->conexion->prepare('Select * from producto');
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        */
        $consulta = 'Select * from producto';
        $rtdo = $this->ejecuta_consulta($consulta, null);
        $productos = [];
        try {
            while ($fila = $rtdo->fetch(PDO::FETCH_ASSOC)) {
                $productos[] = $fila;
            }
        } catch (PDOException $ex) {
            die('Error obteniendo los productos'.$ex->getMessage());
        }
        /*
         * productos[] = $rtdo->fetchAll(PDO::FETCH_ASSOC);
         */
        return $productos;
    }

    private function ejecuta_consulta($sentencia, $valores) {
        try {
            $stmt = $this->conexion->prepare($sentencia);
            $stmt->execute($valores);
        } catch (Exception $exception) {
            die('Error ejecutando consulta'.$exception->getMessage());
        }
        return $stmt;
    }

    public function obtenerProducto($cod_producto) {
        $consulta = 'Select * from producto where cod = :cod';
        $datos = [':cod'=>$cod_producto];
        $rtdo = $this->ejecuta_consulta($consulta, $datos);
        try {
            $productos = $rtdo->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            die('Error obteniendo el producto'.$ex->getMessage());
        }
        /*
         * productos[] = $rtdo->fetchAll(PDO::FETCH_ASSOC);
         */
        return $productos;
    }


}