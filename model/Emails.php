<?php
    namespace OsirNet\model;

    use PDO;

    final class Emails
    {
        private int $id, $id_colaborador;
        private string $email;

        public function setID(int $val)
        {
            $this->id = $val;
        }

        public function setEmail(string $val)
        {
            $this->email = $val;
        }

        public function setIDColaborador(int $val)
        {
            $this->id_colaborador = $val;
        }

        public function getID()
        {
            return $this->id;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getIDColaborador()
        {
            return $this->id_colaborador;
        }
    };

    final class EmailsDAO
    {
        private $conn;

        public function __construct(PDO $connection){
            $this->conn = $connection;
        }

        public function addEmail(Emails $e)
        {
            $sql = 'insert into emails(email, id_colaborador) values(:e, :id)';
            $insert = $this->conn->prepare($sql);
            $insert->bindValue(':id', $e->getIDColaborador());
            $insert->bindValue(':e', $e->getEmail());
            $insert->execute();
        }

        public function getEmailColaborador(Emails $e)
        {
            $sql = 'select id, email, id_colaborador from emails where id_colaborador = :idc';
            $select = $this->conn->prepare($sql);
            $select->bindValue(':idc', $e->getIDColaborador());
            $select->execute();
            $result = $select->fetch(PDO::FETCH_ASSOC);

            $email = new Emails;
            $email->setID($result['id']);
            $email->setEmail($result['email']);
            $email->setIDColaborador($result['id_colaborador']);

            return $email;
        }
    };
    
?>