<?php

class BandaModel
{
    private $db;

    function __construct() {
     // 1. abro conexión con la DB
     $this->db = new PDO('mysql:host=localhost;dbname=conciertos;charset=utf8', 'root', '');
    }

    public function getBanda($id)
    {
        $query = $this->PDO->prepare('SELECT * FROM banda WHERE id_banda = ?');
        $query->execute([$id]);
        $banda = $query->fetch(PDO::FETCH_OBJ);

        return $banda;
    }

    public function getBandas()
    {

        $query = $this->PDO->prepare('SELECT * FROM banda');
        $query->execute();


        $bandas = $query->fetchAll(PDO::FETCH_OBJ);

        return $bandas;
    }
    public function addBanda($nombre, $pais, $genero, $imagen)
    {
        $query = $this->PDO->prepare('INSERT INTO `banda` (`id_banda`, `Nombre`, `Pais_origen`, `Genero`, `Imagen`) VALUES (null, ?, ?, ?, ?)');
        $query->execute([$nombre, $pais, $genero, $imagen]);

        header("Location: /bandas");
    }
    public function deleteBanda($id)
    {
        $query = $this->PDO->prepare('DELETE FROM banda WHERE `banda`.`id_banda` = ?');
        $query->execute([$id]);
        header("Location: /bandas");
    }

    public function editarBanda($id, $nombre, $pais, $genero, $imagen)
    {
        $query = $this->PDO->prepare('UPDATE banda SET Nombre = ?, Pais_origen = ?, Genero = ?, Imagen = ? WHERE id_banda = ?');
        $query->execute([$nombre, $pais, $genero, $imagen, $id]);
    }
}