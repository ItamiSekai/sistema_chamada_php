<?php

    require_once "Conexao.php";

    class User{
        private $conn;

        public function __construct(){
            $c = new Caminho;
            $this->conn = $c->getConn();
        }

        public function cadastrar($nome, $email, $senha, $nivel){
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO usuarios (nome, email, senha, nivel_de_acesso) VALUES (:nome, :email, :senha, :nivel)";
            $inserir = $this->conn->prepare($query);

            $inserir->bindParam(':nome', $nome);
            $inserir->bindParam(':email', $email);
            $inserir->bindParam(':senha', $senhaHash);
            $inserir->bindParam(':nivel', $nivel);

            return $inserir->execute();
        }

        public function buscaUsandoEmail($email) {
            $query = "SELECT * FROM usuarios WHERE email = :email";
            $verificar = $this->conn->prepare($query);
            $verificar->bindParam(':email', $email);
            $verificar->execute();
    
            return $verificar->fetch(PDO::FETCH_ASSOC);
        }

        public function verificaLogin($email, $senha){
            $usuario = $this->buscaUsandoEmail($email);
            if (password_verify($senha, $usuario['senha'])) {
                return true;
            }
            return false;
        }

        public function consultaPorId($id){
            $query = "SELECT * FROM usuarios WHERE id = :id";
            $verificar = $this->conn->prepare($query);
            $verificar->bindParam(':id', $id, PDO::PARAM_INT);
            $verificar->execute();

            return $verificar->fetch(PDO::FETCH_ASSOC);
        }

    }

?>