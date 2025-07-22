<?php
    require_once "Conexao.php";

    class Chamada{
        private $conn;

        public function __construct(){
            $c = new Caminho;
            $this->conn = $c->getConn();
        }

        public function cadastrarChamada($nome_cliente, $descricao, $id_cliente){
            $query = "INSERT INTO chamadas (nome_cliente, descricao, id_cliente) VALUES (:nome, :descricao, :id)";
            $inserir = $this->conn->prepare($query);

            $inserir->bindParam(':nome', $nome_cliente);
            $inserir->bindParam(':descricao', $descricao);
            $inserir->bindParam(':id', $id_cliente);

            return $inserir->execute();
        }

        public function buscarChamadas($id_cliente) {
            $query = "SELECT * FROM chamadas WHERE id_cliente = :id_cliente ORDER BY id DESC";
            $chamadas = $this->conn->prepare($query);
            $chamadas->bindParam(':id_cliente', $id_cliente);
            $chamadas->execute();
        
            return $chamadas->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarChamadasPorId($id, $id_cliente) {
            $query = "SELECT * FROM chamadas WHERE id = :id AND id_cliente = :id_cliente";
            $busca = $this->conn->prepare($query);
            $busca->bindParam(':id', $id, PDO::PARAM_INT);
            $busca->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $busca->execute();
        
            return $busca->fetch(PDO::FETCH_ASSOC);
        }

        public function buscarChamadasPorIdAdmin($id) {
            $query = "SELECT * FROM chamadas WHERE id = :id";
            $chamadas = $this->conn->prepare($query);
            $chamadas->bindParam(':id', $id);
            $chamadas->execute();
        
            return $chamadas->fetch(PDO::FETCH_ASSOC);

        }
        public function buscarChamadasAdmin($stat) {
            $query = "SELECT * FROM chamadas WHERE estado = :stat";
            $chamadas = $this->conn->prepare($query);
            $chamadas->bindParam(':stat', $stat);
            $chamadas->execute();
        
            return $chamadas->fetchAll(PDO::FETCH_ASSOC);
        }


        public function alterarChamada($id, $descricao, $nome_cliente){
            $query = "UPDATE chamadas SET descricao = :descricao, nome_cliente = :nome_cliente WHERE id = :id";
            $alterar = $this->conn->prepare($query);
            $alterar->bindParam(':descricao', $descricao);
            $alterar->bindParam(':nome_cliente', $nome_cliente);
            $alterar->bindParam(':id', $id);
            return $alterar->execute();
        }
        public function deletarChamada($id){
            $query = "DELETE FROM chamadas WHERE id = :id";
            $deletar = $this->conn->prepare($query);
            $deletar->bindParam(':id', $id);
            return $deletar->execute();
        }
        public function concluirChamada($id){
            $query = "UPDATE chamadas SET estado = :estado WHERE id = :id";
            $concluir = $this->conn->prepare($query);
            $estado = "concluido";
            $concluir->bindParam(':estado', $estado);
            $concluir->bindParam(':id', $id);
            return $concluir->execute();
        }
    }
?>