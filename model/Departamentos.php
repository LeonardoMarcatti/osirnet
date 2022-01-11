<?php
    namespace OsirNet\model;

    use PDO;

    final class Departamentos
    {
        private int $id;
        private string $nome;
        
        public function setID(int $val)
        {
            $this->id = $val;
        }

        public function setNome(string $val)
        {
            $this->nome = $val;
        }

        public function getID()
        {
            return $this->id;
        }

        public function getNome()
        {
            return $this->nome;
        }
    };

    final class DepartamentosDAO
    {
        private $conn;

        public function __construct(PDO $connection){
            $this->conn = $connection;
        }

        public function getDepartamentos()
        {
            $sql = 'select id, nome from departamentos';
            $select = $this->conn->prepare($sql);
            $select->execute();

            if ($select->rowCount() >0) {
                $result = $select->fetchAll(PDO::FETCH_ASSOC);
                $dptos = [];

                foreach ($result as $key => $value) {
                    $dpto = new Departamentos;
                    $dpto->setID($value['id']);
                    $dpto->setNome($value['nome']);
                    \array_push($dptos, $dpto);
                };

                return $dptos;
            } else {
                return false;
            };
        }

        public function getDepartamento(Departamentos $d)
        {
            $sql = 'select * from departamentos where id = :id';
            $select = $this->conn->prepare($sql);
            $select->bindValue(':id', $d->getID());
            $select->execute();

            if ($select->rowCount() > 0) {
                $result = $select->fetch(PDO::FETCH_ASSOC);
            
                $dpto = new Departamentos;
                $dpto->setID($result['id']);
                $dpto->setNome($result['nome']);
                
                return $dpto;
            } else {
               return false;
            };
        }
    };
?>