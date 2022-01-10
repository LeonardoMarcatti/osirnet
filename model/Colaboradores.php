<?php
    namespace OsirNet\model;

    use PDO;

    final class Colaboradores
    {
        private int $id, $id_dpto;
        private string $nome;

        public function setID(int $val)
        {
            $this->id = $val;
        }

        public function setIDDpto(int $val)
        {
            $this->id_dpto = $val;
        }

        public function setNome(string $val)
        {
            $this->nome = $val;
        }

        public function getID()
        {
            return $this->id;
        }

        public function getIDDpto()
        {
            return $this->id_dpto;
        }

        public function getNome()
        {
            return $this->nome;
        }
    };

    final class ColaboradoresDAO
    {
        private $conn;

        public function __construct(PDO $connection){
            $this->conn = $connection;
        }

        public function getColaboradores()
        {
            $sql = 'select c.id, c.nome, d.nome as dpto, e.email from colaboradores c join departamentos d on c.id_dpto = d.id left join emails e on e.id_colaborador = c.id order by c.id asc';
            $select = $this->conn->prepare($sql);
            $select->execute();
            $result = $select->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function addColaborador(Colaboradores $c)
        {
            $sql = 'insert into colaboradores(nome, id_dpto) values(:n, :id)';
            $insert = $this->conn->prepare($sql);
            $insert->bindValue(':n', $c->getNome());
            $insert->bindValue(':id', $c->getIDDpto());
            $insert->execute();
        }

        public function getIDColaboradorAdicionado()
        {
            $sql = 'select max(id) as id from colaboradores';
            $select = $this->conn->prepare($sql);
            $select->execute();
            $result = $select->fetch(PDO::FETCH_ASSOC)['id'];
            return $result;
        }

        public function getColaborador(Colaboradores $c)
        {
            $sql = 'call detalhes(:id)';
            $select = $this->conn->prepare($sql);
            $select->bindValue(':id', $c->getID());
            $select->execute();
            $result = $select->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function atualizaColaborador(Colaboradores $c)
        {
            $sql = 'update colaboradores set nome = :n, id_dpto = :dpto where id = :id';
            $update = $this->conn->prepare($sql);
            $update->bindValue(':n', $c->getNome());
            $update->bindValue(':dpto', $c->getIDDpto());
            $update->bindValue(':id', $c->getID());
            $update->execute();
        }

        public function deleteColaborador(Colaboradores $c)
        {
            $sql = 'call deleteColab(:id)';
            $delete = $this->conn->prepare($sql);
            $delete->bindValue(':id', $c->getID());
            $delete->execute();
        }
    }
    
    


?>