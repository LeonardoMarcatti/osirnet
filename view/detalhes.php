<?php
    namespace OsirNet\view;

    require_once '../controller/ArquivosColaborador.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="https://image.flaticon.com/icons/png/512/1216/1216733.png" type="image/png" sizes="16x16">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
        <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/script.js" defer></script>
        <title>PHP</title>
    </head>
    <body>
        <div class="container-fluid">
            <div id="barra">
                <a href="index.php">Voltar</a>
            </div>
            <div class="float-start col-3 form">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?=$colab_detalhes['nome']?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?=$colab_detalhes['email']?>">
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Departamento:</label>
                        <select name="dpto" id="dpto" class="form-select">
                            <?php
                                foreach ($lista_dptos as $key => $dpto) {
                                    if ($dpto->getNome() == $colab_detalhes['dpto']) { ?>
                                        <option value="<?=$dpto->getID()?>" selected><?=$dpto->getNome()?></option>
                                    <?php } else { ?>
                                        <option value="<?=$dpto->getID()?>"><?=$dpto->getNome()?></option>
                                    <?php } 
                                }; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button id="btn-cadastro" type="submit" class="btn btn-outline-success">Atualizar Cadastro</button>
                    </div>
                </form>
                <form action="" method="post" id="adddoc" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="doc" class="form-label">Documento:</label>
                        <input type="file" name="doc" id="doc" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button id="btn-doc" type="submit" class="btn btn-outline-success">Enviar Arquivo</button>
                    </div>
                </form>   
            </div>
            <div class="col-9 float-end" id="table">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center col-1">ID</th>
                            <th class="text-center">Documento</th>
                            <th class="text-center col-2">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($lista_docs) {
                                foreach ($lista_docs as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><a href="../docs/<?=$value->getNome()?>"><?=$value->getID()?></a></td>
                                        <td><a href="../docs/<?=$value->getNome()?>"><?=$value->getNome()?></a></td>
                                        <td class="text-center"><a href="../controller/deletedoc.php?iddoc=<?=$value->getID()?>&id=<?=$value->getIDColab()?>" class="del"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                        <?php  };
                            }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>