<?php
    $array1 = [1,2,3,4,5,6,7,8,9]; //Usado apenas no exercício 1
    $array2 = [1,2,3,4,5,6,7,8,9]; //Usado apenas no exercício 2

    function rotacionarArray($val)
    {
        global $array1;
        for ($i=0; $i < $val; $i++) { 
            $currentValue = array_slice($array1, 0, 1);
            array_shift($array1);
            array_push($array1, $currentValue[0]);
        };

        return $array1;
    };

    function retornarImpares($val)
    {
        if ($val%2 != 0) {
            return $val;
        };
    };

    function retornarPares($val)
    {
        if ($val%2 == 0) {
            return $val;
        };
    };

    function organizaArray()
    {
        global $array2;
        $a3 = [];
        /*
        array_push($a3, array_filter($array2, "retornarPares"));
        $array2 = array_reverse($array2);
        array_push($a3, array_filter($array2, "retornarImpares"));
        return $a3;*/
        for ($i=0; $i < count($array2); $i++) {
            if (retornarPares($array2[$i])) {
                array_push($a3, retornarPares($array2[$i]));
            };
        };

        for ($i=count($array2)-1; $i >= 0; $i--) {
            if (retornarImpares($array2[$i])) {
                array_push($a3, retornarImpares($array2[$i]));
            };
        };
        return $a3;
    };
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
        <style>
            #ex1{
                float: left;
            }
            #ex2{
                float: right;
            }
        </style>
        <title>OsirNet</title>
    </head>
    <body class="container-fluid">
        <h1>Exercícios</h1>
        <div id="ex1">
            <h2>Exercício 1 - Rotacionar Array</h2>
            <p>Array original: </p>
            <pre>
                <?php
                    print_r($array1);
                ?>
            </pre>
            <p>Array Rotacionado 3 posições:</p>
            <pre>
                <?php
                    print_r(rotacionarArray(3));
                ?>
            </pre>
        </div>
        <div id="ex2">
            <h2>Exercício 2 -  Pares e Ímpares</h2>
            <p>Array original:</p> 
            <pre>
                <?php
                    print_r($array2);
                ?>
            </pre>
            <p>Array Reorganizado</p>
            <pre>
                <?php
                    print_r(organizaArray());
                ?>
            </pre>
        </div>
    </body>
</html>