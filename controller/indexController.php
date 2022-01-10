<?php
    namespace OsirNet\Controller;

    require_once '../config/Connection.php';
    require_once '../model/Departamentos.php';
    require_once '../model/Colaboradores.php';
    require_once '../model/Emails.php';

    use OsirNet\Config\Connection;
    use OsirNet\model\ColaboradoresDAO;
    use OsirNet\model\DepartamentosDAO;
    use OsirNet\model\Emails;
    use OsirNet\model\EmailsDAO;

    $connection = Connection::getConnection();

    $dpto_dao = new DepartamentosDAO($connection);
    $lista_dptos = $dpto_dao->getDepartamentos();

    $colaboradoresDAO = new ColaboradoresDAO($connection);
    $lista_colaboradores = $colaboradoresDAO->getColaboradores();

?>