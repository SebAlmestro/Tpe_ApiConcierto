<?php

class BandaModel
{
    private $PDO;

    public function __construct()
    {
        include_once 'config/conex.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getBandas()
    {
        $query = $this->PDO->prepare("SELECT * FROM banda");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getBanda($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM banda WHERE id_banda = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function crearBanda($nombre, $pais, $genero, $imagen){
        $query = $this->PDO->prepare("INSERT INTO banda (Nombre, Pais_origen, Genero, Imagen) VALUES (?,?,?,?)");
        $query->execute([$nombre, $pais,  $genero,  $imagen]);
        return $this->PDO->lastInsertId();
    }


}
