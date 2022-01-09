<?php
    namespace OsirNet\view;
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
        <title>PHP</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="float-start col-3">
                <form action="" method="post" id="addform">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Departamento:</label>
                        <select name="dpto" id="dpto" class="form-select">
                            <option value="0" selected>Selecione um departamento</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="float-end col-8">
                <table class="table table-stripped table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <th class="col-1">ID</th>
                        <th class="col-3">Nome</th>
                        <th class="col-3">Email</th>
                        <th class="col-2">Dpto</th>
                        <th class="col-2">Detalhes</th>
                        <th class="col-2">Deletar</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </body>
</html>