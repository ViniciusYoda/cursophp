<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Preço com Porcentagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valorProduto = $_GET['valorProduto'] ?? '';
        $porcentagem = $_GET['porcentagem'] ?? 0;
    ?>
    <main>
        <h1>Calcular Preço com Porcentagem</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="valorProduto">Valor do Produto (R$)</label>
            <input type="number" name="valorProduto" id="valorProduto" value="<?=$valorProduto?>" step="0.01" required>
            
            <label for="porcentagem">Porcentagem <span id="porcentagemValor"><?=$porcentagem?></span>%</label>
            <input type="range" name="porcentagem" id="porcentagem" min="0" max="100" value="<?=$porcentagem?>" oninput="document.getElementById('porcentagemValor').textContent = this.value">
            
            
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            if ($valorProduto && $valorProduto > 0) {
                $valorFinal = $valorProduto + ($valorProduto * $porcentagem / 100);
                echo "<p>Valor do Produto: <strong>R$ " . number_format($valorProduto, 2, ',', '.') . "</strong></p>";
                echo "<p>Porcentagem: <strong>{$porcentagem}%</strong></p>";
                echo "<p>Valor Final: <strong>R$ " . number_format($valorFinal, 2, ',', '.') . "</strong></p>";
            }
        ?>
    </section>
</body>
</html>
