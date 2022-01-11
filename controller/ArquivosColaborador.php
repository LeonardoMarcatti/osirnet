<?php
    namespace OsirNet\Controller;

    require_once 'DetalhesController.php';

    use OsirNet\model\Documentos;
    use OsirNet\model\DocumentosDAO;

    $doc = new Documentos;
    $doc_dao = new DocumentosDAO($connection);
    $doc->setIDColab($id);

    $lista_docs = $doc_dao->getDocumentos($doc);

    if (!empty($_FILES['doc']['name'])) {
        Submit($_FILES['doc']);

       $doc->setNome($_FILES['doc']['name']);
       $doc->setIDColab($id);

       $doc_dao->addDocumento($doc);

       header('location: detalhes.php?id=' . $id);
       exit;
    };

    
    function Submit($file){
        $tmp = $file['tmp_name'];
        $nome = $file['name'];
        $local = '../docs/' . $nome;
        move_uploaded_file($tmp, $local);
    };
    
?>