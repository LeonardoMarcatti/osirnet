<?php
    namespace OsirNet\Controller;

    require_once '../model/Colaboradores.php';
    require_once '../model/Departamentos.php';
    require_once '../model/Emails.php';
    require_once '../config/Connection.php';

    use OsirNet\Config\Connection;
    use OsirNet\model\Colaboradores;
    use OsirNet\model\ColaboradoresDAO;
    use OsirNet\model\Emails;
    use OsirNet\model\EmailsDAO;

    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['dpto'])) {
        $nome = \filter_input(\INPUT_POST, 'nome', \FILTER_SANITIZE_STRING);
        $endereco_email = \filter_input(\INPUT_POST, 'email', \FILTER_SANITIZE_EMAIL);
        $dpto = \filter_input(\INPUT_POST, 'dpto', \FILTER_SANITIZE_NUMBER_INT);

        $connection = Connection::getConnection();

        $colaborador = new Colaboradores;
        $colaborador->setNome($nome);
        $colaborador->setIDDpto($dpto);

        $colaboradorDAO = new ColaboradoresDAO($connection);
        $colaboradorDAO->addColaborador($colaborador);
        $id_colaborador_adicionado = $colaboradorDAO->getIDColaboradorAdicionado();
        $colaborador->setID($id_colaborador_adicionado);

        $email = new Emails;
        $email->setEmail($endereco_email);
        $email->setIDColaborador($id_colaborador_adicionado);

        $emailDAO = new EmailsDAO($connection);
        $emailDAO->addEmail($email);

        echo $nome . $endereco_email . $dpto;
    };


?>