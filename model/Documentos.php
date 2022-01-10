<?php
    namespace OsirNet\model;

    use PDO;

    final class Documentos
    {
        private int $id, $id_colab;
        private string $nome;

        public function setID(int $val)
        {
           $this->id = $val;
        }

        public function getID()
        {
            return $this->id;
        }

        public function setIDColab(int $val)
        {
            $this->id_colab = $val;
        }

        public function getIDColab()
        {
            return $this->id_colab;
        }

        public function setNome(string $val)
        {
            $this->nome = $val;
        }

        public function getNome()
        {
            return $this->nome;
        }
    };

    final class DocumentosDAO
    {
        private $conn;

        public function __construct(PDO $connection){
            $this->conn = $connection;
        }

        public function addDocumento(Documentos $d)
        {
            $sql = 'insert into documentos(nome, id_colaborador) values(:n, :idc)';
            $insert = $this->conn->prepare($sql);
            $insert->bindValue(':n', $d->getNome());
            $insert->bindValue(':idc', $d->getIDColab());
            $insert->execute();
        }

        public function deleteDocumento(Documentos $d)
        {
            $sql = 'delete from documentos where id = :id';
            $delete = $this->conn->prepare($sql);
            $delete->bindValue(':id', $d->getID());
            $delete->execute();
        }

        public function getDocumentos(Documentos $d)
        {
            $sql = 'select id, nome, id_colaborador from documentos where id_colaborador = :idc';
            $select = $this->conn->prepare($sql);
            $select->bindValue(':idc', $d->getIDColab());
            $select->execute();
            if ($select->rowCount() > 0) {
                $result = $select->fetchAll(PDO::FETCH_ASSOC);
                $docs = [];
                foreach ($result as $key => $value) {
                    $doc = new Documentos;
                    $doc->setID($value['id']);
                    $doc->setNome($value['nome']);
                    $doc->setIDColab($value['id_colaborador']);

                    \array_push($docs, $doc);
                };

                return $docs;
            };

            return false;
        }

        public function updateDocumento(Documentos $d)
        {
            $sql = 'update documentos set nome = :n where id = :id';
            $update = $this->conn->prepare($sql);
            $update->bindValue(':n', $d->getNome());
            $update->bindValue(':id', $d->getID());
            $update->execute();
        }
    };

?>