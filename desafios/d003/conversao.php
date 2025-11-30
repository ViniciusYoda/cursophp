<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversao PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Convertendo Tipos de Dados em PHP</h1>
        <?php
            $valor = $_GET['valor'] ?? 0;
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            echo "<p>Seus " . numfmt_format_currency($padrao, $valor, "BRL") . " equivalem a:</p>" . numfmt_format_currency($padrao, $valor * 0.19, "USD") . " Dólares<br>";

        ?>
    </main>
</body>
</html>