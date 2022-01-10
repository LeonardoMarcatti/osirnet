<?php
    namespace OsirNet\Controller;

    require_once '../config/Connection.php';
    require_once '../model/Colaboradores.php';

    use OsirNet\Config\Connection;
    use OsirNet\model\Colaboradores;
    use OsirNet\model\ColaboradoresDAO;

    if ($_GET['id']) {
        $id = \filter_input(\INPUT_GET, 'id', \FILTER_SANITIZE_NUMBER_INT);

        $connection = Connection::getConnection();
        $colab = new Colaboradores;
        $colab->setID($id);

        $colab_dao = new ColaboradoresDAO($connection);
        $colab_dao->deleteColaborador($colab);
    };

    \header('location: ../view/index.php');
    exit;

?>