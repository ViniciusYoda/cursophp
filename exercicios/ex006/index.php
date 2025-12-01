<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Globais</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>

    <?php 
        if (isset($_GET['v1']) && isset($_GET['v2'])) {
            $valor1 = $_GET['v1'];
            $valor2 = $_GET['v2'];
            $soma = $valor1 + $valor2;
        }
    ?>
    </p>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <label for="v1">Valor 1:</label>
            <input type="number" name="v1" id="v1" value="<?=$valor1?>">
            <label for="v2">Valor 2:</label>
            <input type="number" name="v2" id="v2" value="<?=$valor2?>">
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado da Soma</h2>
        <?php 
            if (isset($soma)) {
                echo "<p>A soma de $valor1 + $valor2 = <strong>$soma</strong></p>";
            } else {
                echo "<p>Preencha os valores acima e clique em Calcular para ver o resultado.</p>";
            }
        ?>
    </section>
</body>
</html>