<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Resultado final</h1>
        <p>
            <?php 
                $num = $_GET["num"] ?? 0;
                $ant = $num - 1;
                $suc = $num + 1;
                echo "Analisando o número <strong>$num</strong>, o seu antecessor é <strong>$ant</strong> e o seu sucessor é <strong>$suc</strong>.";
            ?>
        </p>
        <button onclick="javascript:window.location.href='index.html'">&#x2B05; Voltar</button>
    </main>
</body>
</html>