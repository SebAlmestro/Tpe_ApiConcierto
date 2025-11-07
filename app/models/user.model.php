<?php
class UserModel{
    private $db;

    function __construct() {
     // 1. abro conexión con la DB
     $this->db = new PDO('mysql:host=localhost;dbname=conciertos;charset=utf8', 'root', '');
    }

    public function listarPorUsuario($usuario) {
        $query = $this->PDO->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
}