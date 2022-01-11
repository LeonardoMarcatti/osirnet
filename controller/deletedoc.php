<?php
    namespace OsirNet\Controller;

    require_once '../config/Connection.php';
    require_once '../model/Documentos.php';

    use OsirNet\Config\Connection;
    use OsirNet\model\Documentos;
    use OsirNet\model\DocumentosDAO;

    if ($_GET['iddoc'] && $_GET['id']) {
        $iddoc = \filter_input(\INPUT_GET, 'iddoc', \FILTER_SANITIZE_NUMBER_INT);
        $id = \filter_input(\INPUT_GET, 'id', \FILTER_SANITIZE_NUMBER_INT);

        $connection = Connection::getConnection();
        $doc = new Documentos;
        $doc->setID($iddoc);

        $doc_dao = new DocumentosDAO($connection);
        $doc_dao->deleteDocumento($doc);

        \header('location: ../view/detalhes.php?id=' . $id);
        exit;        
    } else {
       \header('location: ../view/index.php');
       exit;
    };

?>