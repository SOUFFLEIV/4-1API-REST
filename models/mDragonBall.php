<?php 

    class DragonBallZ extends Conectar{
        public function get_personaje(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM personajes";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_personaje_id($idPersonaje){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM personajes WHERE idPersonaje = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idPersonaje);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function get_personaje_nombre($personaje){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM personajes WHERE personaje = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $personaje);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_personaje($personaje,$raza,$poderes,$categoria){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO `personajes` (`idPersonaje`, `personaje`, `raza`, `poderes`, `categoria`) VALUES (NULL, ?, ?, ?, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $personaje);
            $sql->bindValue(2, $raza);
            $sql->bindValue(3, $poderes);
            $sql->bindValue(4, $categoria);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_personaje($idPersonaje,$personaje,$raza,$poderes,$categoria){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE `personajes` SET 
            personaje = ?, 
            raza = ?, 
            poderes = ?, 
            categoria = ? 
            WHERE `idPersonaje` = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $personaje);
            $sql->bindValue(2, $raza);
            $sql->bindValue(3, $poderes);
            $sql->bindValue(4, $categoria);
            $sql->bindValue(5, $idPersonaje);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_personaje($idPersonaje){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM personajes WHERE idPersonaje = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idPersonaje);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }





?>