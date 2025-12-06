<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média Aritmética</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valor1 = $_GET['valor1'] ?? 0;
        $peso1 = $_GET['peso1'] ?? 1;
        $valor2 = $_GET['valor2'] ?? 0;
        $peso2 = $_GET['peso2'] ?? 1;
    ?>
    <main>
        <h1>Média Aritmética</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="valor1">1º Valor</label>
            <input type="number" name="valor1" id="valor1" step="0.01" value="<?=$valor1?>">
            
            <label for="peso1">1º Peso</label>
            <input type="number" name="peso1" id="peso1" step="0.01" value="<?=$peso1?>">
            
            <label for="valor2">2º Valor</label>
            <input type="number" name="valor2" id="valor2" step="0.01" value="<?=$valor2?>">
            
            <label for="peso2">2º Peso</label>
            <input type="number" name="peso2" id="peso2" step="0.01" value="<?=$peso2?>">
            
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            if ($valor1 > 0 || $valor2 > 0) {
                $mediaSimples = ($valor1 + $valor2) / 2;
                $mediaPonderada = ($valor1 * $peso1 + $valor2 * $peso2) / ($peso1 + $peso2);

                echo "<p>Média Simples: <strong>".number_format($mediaSimples, 2, ",", ".")."</strong></p>";
                echo "<p>Média Ponderada: <strong>".number_format($mediaPonderada, 2, ",", ".")."</strong></p>";
            }
        ?>
    </section>
</body>
</html>