<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Globais</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $numero = $_GET['num'] ?? 1;
    ?>
    <main>
        <h1>Raiz Quadrada e Cúbica</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="num">Número</label>
            <input type="number" name="num" id="num" min="0" step="0.01" value="<?=$numero?>">
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            // Corrigindo a verificação - usar !== para comparação exata
            if ($numero > 0) {
                $raizQuadrada = sqrt($numero);
                $raizCubica = $numero ** (1/3);

                echo "<p>O número <strong>".number_format($numero, 1, ",", ".")."</strong></p>";
                echo "<p>Raiz quadrada: <strong>".number_format($raizQuadrada, 1, ",", ".")."</strong></p>";
                echo "<p>Raiz cúbica: <strong>".number_format($raizCubica, 1, ",", ".")."</strong></p>";
            } else if ($numero == 0) {
                echo "<p>Digite um número maior que zero</p>";
            }
        ?>
    </section>
</body>
</html>