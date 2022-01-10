<?php
    namespace OsirNet\Controller;

    require_once '../model/Colaboradores.php';
    require_once '../model/Departamentos.php';
    require_once '../model/Emails.php';
    require_once '../model/Documentos.php';
    require_once '../config/Connection.php';

    use OsirNet\Config\Connection;
    use OsirNet\model\Colaboradores;
    use OsirNet\model\ColaboradoresDAO;
    use OsirNet\model\DepartamentosDAO;
    use OsirNet\model\Emails;
    use OsirNet\model\EmailsDAO;

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($id)) {
        $connection = Connection::getConnection();
        $colab_dao = new ColaboradoresDAO($connection);
        $email_dao = new EmailsDAO($connection);
        $dpto_dao = new DepartamentosDAO($connection);
        $lista_dptos = $dpto_dao->getDepartamentos();

        $colab = new Colaboradores;
        $colab->setID($id);
        $colab_detalhes = $colab_dao->getColaborador($colab);

        $email = new Emails;
        $email->setIDColaborador($id);

        $detalhes_email_colab = $email_dao->getEmailColaborador($email);
    } else {
        \header('location: ../view/index.php');
        exit;
    };

    if (!empty($_POST['nome']) && !empty($_POST['dpto'])) {
        $nome = \filter_input(\INPUT_POST, 'nome', \FILTER_SANITIZE_STRING);
        $dpto = \filter_input(\INPUT_POST, 'dpto', \FILTER_SANITIZE_NUMBER_INT);
        $endereco_email = \filter_input(\INPUT_POST, 'email', \FILTER_SANITIZE_EMAIL);

        $colab->setIDDpto($dpto);
        $colab->setNome($nome);
        $colab_dao->atualizaColaborador($colab);

        if ($endereco_email && $detalhes_email_colab) {
            $email->setEmail($endereco_email);
            $email->setIDColaborador($detalhes_email_colab->getIDColaborador());
            $email_dao->atualizaEmail($email);

        } elseif (!$endereco_email && $detalhes_email_colab) {
            $email_dao->deleteEmail($email);

        } else if($endereco_email && !$detalhes_email_colab){
            $email->setEmail($endereco_email);
            $email_dao->addEmail($email);
        };

        header('location: index.php');
        exit;
    };

?>