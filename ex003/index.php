<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos primitivos em PHP</title>
</head>
<body>
    <h1>Teste de tipos primitivos</h1>
    <?php 
        $num = 0x1A;
        echo "O valor da variável é $num";

        $v = 300;
        var_dump($v);

        $vet = [6, 2, 9, 3, 5];
        var_dump($vet);

        class Pessoa {
            private string $nome;
        };

        $p = new Pessoa();
        var_dump($p);
    ?> 
</body>
</html>