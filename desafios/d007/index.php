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
        $minimo = 1_360.60;
        $salario = (float)($_GET['sal'] ?? $minimo);
    ?>
    <main>
        <h1>Anatomia de uma divisão</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="sal">Salário</label>
            <input type="number" name="sal" id="sal" min="0" step="0.01" value="<?=$salario?>">
            <input type="submit" value="Calcular">
            <p>Considerando o salário mínimo de <strong>R$ <?=number_format($minimo, 2, ",", ".")?></strong></p>
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            $tot = intdiv((int)$salario, (int)$minimo);
            $dif = fmod($salario, $minimo);

            echo "<p>Quem recebe um salário de <strong>R$ ".number_format($salario, 2, ",", ".")."</strong> ganha <strong>$tot</strong> salário(s) mínimo(s) + <strong>R$ ".number_format($dif, 2, ",", ".")."</strong></p>";
        ?>
    </section>
</body>
</html>