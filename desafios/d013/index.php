<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valor = $_GET['valor'] ?? 0;
        $notas = [100, 50, 20, 10, 5, 2, 1];
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="valor">Valor a Sacar (R$)</label>
            <input type="number" name="valor" id="valor" value="<?=$valor?>" min="1">
            
            <input type="submit" value="Sacar">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            if ($valor > 0) {
                $resto = $valor;
                echo "<p>Valor sacado: <strong>R$ $valor</strong></p>";
                echo "<div class='notas'>";
                
                foreach ($notas as $nota) {
                    $quantidade = floor($resto / $nota);
                    if ($quantidade > 0) {
                        $resto = $resto % $nota;
                        echo "<div class='nota-item'>";
                        echo "<img src='images/$nota-reais.jpg' alt='Nota de $nota'>";
                        echo "<p>$quantidade x R$ $nota</p>";
                        echo "</div>";
                    }
                }
                
                echo "</div>";
            }
        ?>
    </section>
</body>
</html>
